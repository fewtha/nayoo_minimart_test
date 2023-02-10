<x-app-layout>
    <!-- Header-->


    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: 'Varela Round', sans-serif;
            }
            .modal-confirm {
                color: #636363;
                width: 325px;
                font-size: 14px;
            }
            .modal-confirm .modal-content {
                padding: 20px;
                border-radius: 5px;
                border: none;
            }
            .modal-confirm .modal-header {
                border-bottom: none;
                position: relative;
            }
            .modal-confirm h4 {
                text-align: center;
                font-size: 26px;
                margin: 30px 0 -15px;
            }
            .modal-confirm .form-control, .modal-confirm .btn {
                min-height: 40px;
                border-radius: 3px;
            }
            .modal-confirm .close {
                position: absolute;
                top: -5px;
                right: -5px;
            }
            .modal-confirm .modal-footer {
                border: none;
                text-align: center;
                border-radius: 5px;
                font-size: 13px;
            }
            .modal-confirm .icon-box {
                color: #fff;
                position: absolute;
                margin: 0 auto;
                left: 0;
                right: 0;
                top: -70px;
                width: 95px;
                height: 95px;
                border-radius: 50%;
                z-index: 9;
                background: #82ce34;
                padding: 15px;
                text-align: center;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
            }
            .modal-confirm .icon-box i {
                font-size: 58px;
                position: relative;
                top: 3px;
            }
            .modal-confirm.modal-dialog {
                margin-top: 80px;
            }
            .modal-confirm .btn {
                color: #fff;
                border-radius: 4px;
                background: #82ce34;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                border: none;
            }
            .modal-confirm .btn:hover, .modal-confirm .btn:focus {
                background: #6fb32b;
                outline: none;
            }
            .trigger-btn {
                display: inline-block;
                margin: 100px auto;
            }
            </style>
    </head>

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">
            <a class="btn btn-outline-dark p-2" type="submit" href="{{ url('/') }}">Back</a>
        </div>
    </nav>

    <header class="bg-dark py-2">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>


        <div class="container px-4 px-lg-4 my-3">
            <a class="btn btn-outline-dark p-2" type="submit" href="{{ route('login') }}">Admin</a>
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Nayoo Mart</h1>
                <p class="lead fw-normal text-white-50 mb-0">จ่ายตังค์ด้วยเนาะ</p>
            </div>
        </div>
    </header>


    <body>
        <!-- Section-->
        <section class="py-1">
            <div class="container px-4 px-lg-5 mt-2">
                <div class="row">
                    <table class="table table-striped table-bodered">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('image/products/6303.jpg') }}" width="300" alt="">
                        </div>
                        <div class="container mt-3">
                            <thead>
                                <tr>
                                    <th>ชื่อ</th>
                                    <th>จำนวน</th>
                                    <th>ราคาต่อชิ้น</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                        </div>
                        <tbody>

                            @if ($order)
                                @foreach ($order->order_details as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>

                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->price }}</td>

                                        <td>
                                            <div class="row text-center">
                                                <div class="col-6">
                                                    <form action="{{ route('orders.update', $order->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="value" value="decrease">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $item->product_id }}">
                                                        <input type="hidden" name="order_id"
                                                            value="{{ $item->order_id }}">
                                                        <button class="btn btn-outline-danger" type="submit">-</button>
                                                    </form>
                                                </div>
                                                <div class="col-6">
                                                    <form action="{{ route('orders.update', $order->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="value" value="increase">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $item->product_id }}">
                                                        <input type="hidden" name="order_id"
                                                            value="{{ $item->order_id }}">
                                                        <button class="btn btn-outline-success"
                                                            type="submit">+</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- @else
                                        "กรุณาเพิ่มสินค้า"
                                    @endif --}}
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>รวมราคา</td>
                                    <td> = </td>
                                    <td>{{ $order->total }}</td>
                                    <td class="text-center">
                                        {{-- ##อันเดิม --}}
                                        {{-- <form action="{{ route('orders.update', $order->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="value" value="checkout">
                                            <button class="btn btn-outline-success" type="submit">ชำระเงิน</button>
                                            <button class="btn btn-outline-success" style="font-size:24px"
                                                data-bs-toggle="modal" data-bs-target="#checkout" href="#">ชำระเงิน</button>
                                        </form> --}}
                                        <input type="hidden" name="value" value="checkout">

                                        {{-- <button class="btn btn-outline-success" style="font-size:24px"
                                            data-bs-toggle="modal" data-bs-target="#checkout"
                                            href="#">ชำระเงิน</button> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <form action="{{ route('orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                        <td>สลิปการโอน</td>
                                        <td></td>
                                        <td>
                                            @csrf {{-- ป้องกันการ Hack  ด้วย การป้อน Script --}}
                                            <div class="form-group">
                                                <input type="file" name="slip_img" class="form-control"
                                                    id="slip_img" required>
                                            </div>
                                        </td>
                                        <td>
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="value" value="checkout">
                                            <button class="btn btn-outline-success" type="submit">ชำระเงิน</button>

                                            {{-- <button class="btn btn-outline-success"  data-bs-toggle="modal"
                                                data-bs-target="#checkout" href="#checkout">ชำระเงิน</button> --}}
                                        </td>

                                        {{-- Modal --}}
                                        <div id="checkout" class="modal fade">
                                            <div class="modal-dialog modal-confirm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="icon-box">
                                                            <i class="material-icons">&#xE876;</i>
                                                        </div>
                                                        <h4 class="modal-title w-100">ชำระเงินสำเร็จ!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center">ขอบคุณที่ใช้บริการนะคะ</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-success btn-block" href="{{route('login')}}" data-dismiss="modal">OK</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </section>


        <!-- Footer-->
        {{-- <footer class="py-5  bg-dark fixed-bottom ">
            <div class="container ">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
            </div>
        </footer> --}}

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</x-app-layout>
