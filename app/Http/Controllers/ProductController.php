<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class ProductController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('user')->only(['create']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            if ($user->type) {

                return view('admin.index', compact('products'));
            } else {
                $order = Order::where(['user_id' => Auth::user()->id, 'status' => 0])->first();

                // $search = $request->search;
                // if (isset($search) && $search != '') {
                //     $products = Product::where('product_name', 'like', '%' . $search . '%')->orWhere('product_price', 'like', '%' . $search . '%')->get();
                // } else {
                //     $products = Product::all();
                // }

                return view('welcome', compact('products', 'order'));
            }
        }
    }
    // search AJAX

    public function search(Request $request)
    {
        $search = $request->search;
        if (isset($search) && $search != '') {
            $products = Product::where('product_name', 'like', '%' . $search . '%')->orWhere('product_price', 'like', '%' . $search . '%')->get();
        } else {
            $products = Product::all();
        }
        return response()->json($products);
    }



    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { {
            $products = Product::all();
            return view('admin.create', compact('products'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = Storage::disk('public')->put('image', $request->image);
        // dd($file);
        // $prepareProduct =[
        //     'name' => $request->product_name,
        //     'price' => $request->product_price,
        //     'file' => $request->product_file,
        // ];
        // $product = Product::create($prepareProduct);
        $product_img = $request->file('product_img');
        $name_gen =  hexdec(uniqid()); // genarate ชื่อ
        $img_ext = strtolower($product_img->getClientOriginalExtension()); // ดึงนามสกุล File Image
        $img_name = $name_gen . '.' . $img_ext;
        //อัพโหลดภาพ
        $upload_location = 'image/products/';
        $full_path = $upload_location . $img_name;
        $product_img->move($upload_location, $img_name);


        // Save service Eloquent (Model)
        Product::insert([
            'product_name' => $request->product_name,
            'product_img' => $full_path,
            'product_price' => $request->product_price,
            'product_stock' => $request -> product_stock,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('Success', 'บันทึกข้อมูลสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = Product::find($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'product_name' => 'required|max:255',
                'product_img' => 'mimes:png,jpg,jpeg',
                // 'product_price' => 'required|>0',

            ],
            [
                'product_name.required' => 'กรุณาป้อนชื่อบริการด้วยครับ',
                'product_name.max' => 'ชื่อบริการยาวเกินไป (255 ตัวอักษร)',
                'product_img.mimes' => 'กรุณาเลือกรูปภาพใหม่ (png,jpg,jpeg)',
                // 'product_price.required' => 'กรุณาป้อนชื่อบริการด้วยครับ',

            ]
        );
        $product = Product::find($id);

        // $product_img = $request->file('product_img');
        // $name_gen =  hexdec(uniqid()); // genarate ชื่อ
        // $img_ext = strtolower($product_img->getClientOriginalExtension()); // ดึงนามสกุล File Image
        // $img_name = $name_gen . '.' . $img_ext;
        // //อัพโหลดภาพ
        // $upload_location = 'image/products/';
        // $full_path = $upload_location . $img_name;
        // $product_img->move($upload_location, $img_name);

        // $product->product_img = $full_path;
        // $product->product_name = $request['product_name'];

        // $product->product_price = $request['product_price'];

        // $product->save();
        // return redirect()->route('products')->with('Success', 'แก้ไขข้อมูลสำเร็จ');

        $product_img = $request->file('product_img');

        if ($product_img) {
            // $product_img = $request->file('product_img');
            $name_gen =  hexdec(uniqid()); // genarate ชื่อ
            $img_ext = strtolower($product_img->getClientOriginalExtension()); // ดึงนามสกุล File Image
            $img_name = $name_gen . '.' . $img_ext;
            //อัพโหลดภาพ
            $upload_location = 'image/products/';
            $full_path = $upload_location . $img_name;
            $product_img->move($upload_location, $img_name);
            // Save service Eloquent (Model)
            Product::find($id)->update([
                'product_name' => $request->product_name,
                'product_img' => $full_path,
                'product_price' => $request->product_price,
                'created_at' => Carbon::now(),
            ]);

            $old_img = $request->old_img;
            unlink($old_img);
        } else {
            Product::find($id)->update([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_stock' => $request->product_stock,

                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('products')->with('Success', 'แก้ไขข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $product = Product::find($id);
            if ($product) {
                unlink($product->product_img);
                $destroy = $product->delete();
            }


            return redirect()->back()->with('Success', 'ลบข้อมูลสำเร็จ');
        }
    }
}
