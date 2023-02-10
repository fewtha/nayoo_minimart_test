<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use BaconQrCode\Renderer\Path\Line;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('user_id', Auth::id())->where('status', 0)->first();
        return view('orders.index')->with('order', $order);
    }
    public function image()
    {
        $products = Product::all();
        return view('orders.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // ถ้าออเดอร์ยังไม่มี
        $product = Product::find($request->product_id);
        $order = Order::where('user_id', Auth::id())->where('status', 0)->first();
        if ($order) {
            $orderDetail = $order->order_details()->where('product_id', $product->id)->first();

            if ($orderDetail) {
                $amountNew = $orderDetail->amount + 1;
                $orderDetail->update([
                    'amount' => $amountNew
                ]);
            } else {
                $prepareCartDetail = [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'amount' => 1,
                    'price' => $product->product_price,
                ];

                $orderDetail = OrderDetail::create($prepareCartDetail);
            }
        } else {

            // Save service Eloquent (Model)
            $prepareCart = [
                'status' => 0,
                'user_id' => Auth::id(),
            ];

            $order = Order::create($prepareCart);

            $prepareCartDetail = [
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'amount' => 1,
                'price' => $product->product_price,
            ];

            $orderDetail = OrderDetail::create($prepareCartDetail);
        }

        $totalRaw = 0;
        $total = $order->order_details->map(function ($orderDetail) use ($totalRaw) {

            $totalRaw += $orderDetail->amount * $orderDetail->price;
            return $totalRaw;
        })->toarray();

        $order->update([
            'total' => array_sum($total)
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        $orderDetail = $order->order_details()->where('product_id', $request->product_id)->first();
        //อัพภาพ
        $slip_img = $request->file('slip_img');
        if ($slip_img) {
            $name_gen =  hexdec(uniqid()); // genarate ชื่อ
            $img_ext = strtolower($slip_img->getClientOriginalExtension()); // ดึงนามสกุล File Image
            $img_name = $name_gen . '.' . $img_ext;
            //อัพโหลดภาพ
            $upload_location = 'image/slips/';
            $full_path = $upload_location . $img_name;
            $slip_img->move($upload_location, $img_name);
            // dd($full_path);
            $order->slip_img = $full_path;
            // Save data to the database

            // Send notification to Line Notify
            $username = Auth::user()->name;
            $amount = $order->totalOrders();
            $total = $order->total;
            if (!empty($order) && isset($order->create_at) && $order->create_at !== null) {
                $time = $order->create_at->format('H:i');
                $date = $order->create_at->format('d-m-y');
            } else {
                $current_date_time = new DateTime();
                $time = $current_date_time->format('H:i');
                $date = $current_date_time->format('d-m-y');
            }

            // Line::imagePath('$order->slip_img');
            $client = new Client();
            $response = $client->post('https://notify-api.line.me/api/notify', [
                'headers' => [
                    'Authorization' => 'Bearer LwEB6Oe9XnwSJMakZOfYZEXoWZMMQqN3k22dMZeK6qX',
                ],
                'multipart' => [
                    [
                        'name' => 'message',
                        'contents' => "\nคุณ ". $username ." ได้ซื้อสินค้า ". $amount ." ชิ้น "."\nรวมเป็นราคา : ". $total ." บาท". "\nวันที่ : ". $date ." เวลา : ".$time.$request->input('created_at'),
                    ],
                    [
                        'name' => 'imageFile',
                        'contents' => fopen($order->slip_img, 'r')
                    ]
                ],
            ]);
            $order->save();
        }
        if ($request->value == "checkout") {
            $order->update([
                'status' => 1
            ]);
        } else {
            if ($orderDetail) {
                if ($request->value == "increase") {
                    $amountNew = $orderDetail->amount + 1;
                    $orderDetail->update([
                        'amount' => $amountNew
                    ]);

                } else {
                    if ($orderDetail->amount <= 1) {
                        $orderDetail->delete();
                    } else {
                        $amountNew = $orderDetail->amount - 1;
                        $orderDetail->update([
                            'amount' => $amountNew
                        ]);
                    }
                }
            }


            $totalRaw = 0;
            $total = $order->order_details->map(function ($orderDetail) use ($totalRaw) {
                // totalRaw = totalRaw +  $orderDetail->amount * $orderDetail->price;
                $totalRaw += $orderDetail->amount * $orderDetail->price;
                return $totalRaw;
            })->toarray();

            // $file = Storage::disk('public')->put('images', $request->qr_img);
            $order->update([
                'total' => array_sum($total)
            ]);

            return redirect()->back();
        }

        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
