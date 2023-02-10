
<x-guest-layout>
    <!-- Header-->

    <style>
        footer {
            position: fixed;
            height: 100px;
            bottom: 0;
            width: 100%;
        }
    </style>

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


    </head>
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class="btn btn-outline-dark p-2" type="submit" href="{{ route('orders.index') }}">Admin</a>
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
            <div class="container px-4 px-lg-5 mt-5 ">
                <div class="row">
                    <table class="table table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>ภาพสินค้า</th>
                                <th>ชื่อ</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_details as $item)
                            <tr>
                                <td>
                                    {{-- <img src="{{ asset($product->product_img) }}" class="img-fluid rounded"> --}}
                                    {{ $item->product_name }}
                                </td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <form action="{{ route('orders.update', $order->id) }}"
                                                    method="post"
                                                    >
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="value" value="decrease">

                                                    <input type="hidden" name="product_id" value="{{$item->product_id }}">
                                                    <input type="hidden" name="order_id" value="{{ $item->order_id}}">
                                                    <button class="btn btn-outline-danger" type="submit">-</button>
                                                </form>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ route('orders.update', $order->id) }}"
                                                    method="post"
                                                    >
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="value" value="increase">
                                                    <input type="hidden" name="product_id" value="{{$item->product_id }}">
                                                    <input type="hidden" name="order_id" value="{{ $item->order_id}}">
                                                    <button class="btn btn-outline-success" type="submit">+</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>รวมราคา</td>
                                <td>s</td>
                                <td>s</td>
                                <td>s</td>

                                <td>{{ $order->total }}</td>
                            </tr>
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
</x-guest-layout>
