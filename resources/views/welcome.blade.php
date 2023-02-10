<x-app-layout>
    <!-- Navigation-->
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
    {{-- <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="btn btn-outline-dark" type="submit" href="{{ url('/order/index') }}">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    @if ($order)
                    {{$order -> totalOrders()}}
                    @else
                    0
                @endif
            </span>
            </a>
        </div>

    </nav> --}}

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
        <div class="container px-4 px-lg-5 my-2">
            <a class="btn btn-outline-dark p-2" type="submit" href="{{ route('login') }}">Admin</a>
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Nayoo Mart</h1>
                <p class="lead fw-normal text-white-50 mb-0">จ่ายตังค์ด้วยเนาะ</p>
            </div>
        </div>
    </header>

    <!-- Button trigger modal -->

    <body>

        <!-- Section-->


        <section class="pb-4">

            <div class="bg-white border rounded-5">
                <div class="d-flex justify-content-around bd-highlight mt-1">
                    <div class="p-2 bd-highlight"></div>
                    <div>
                        {{-- <form action="" method="GET">
                            <div class="input-group rounded">
                                <input id="product_search" type="search" class="form-control rounded"
                                    placeholder="ค้นหา" name="search" aria-label="Search"
                                    aria-describedby="search-addon">

                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </form> --}}

                    </div>
                    <a class="btn btn-outline-dark" type="submit" href="{{ url('/order/index') }}">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        @if ($order)
                            <span class="badge bg-danger text-white ms-1 rounded-pill">
                                {{ $order->totalOrders() }}
                            </span>
                        @else
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                0
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </section>
        <section class="py-1">
            <div class="container px-4 px-lg-5 mt-5 " id="product_container">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products as $product)
                        @csrf
                        <div class="col mb-5">
                            <div class="card h-100 rounded">
                                <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" placeholder="" value="{{ $product->id }}">
                                    <div class="card-body p-2">
                                        <img src="{{ asset($product->product_img) }}" width="" class="img-fluid rounded">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $product->product_name }}</h5>
                                            <!-- Product price-->
                                            <h5 class="fw-bolder">{{ $product->product_price }} บาท</h5>
                                        </div>
                                    </div>

                                    <!-- Product actions-->
                                    <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            {{-- <a class="far fa-edit" style="font-size:24px" href="#"></a> --}}
                                            <button class="btn btn-outline-success mt-auto" type="submit">+</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Footer-->
        {{-- <footer class="py-5 bg-dark fixed-bottom ">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
            </div>
        </footer> --}}
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        {{-- <script src="js/scripts.js"></script> --}}

    </body>
    {{-- AJAX Search script --}}
    <script>
        $('#product_search').on('keyup', function() {
            let search = $('#product_search').val();
            // console.log(search);

            axios.get(" {{ route('products.search') }}", {
                params: {
                    search: search
                }
            }).then(function(res) {
                if (res.data.length > 0) {
                    let elements = res.data.map(function(product) {
                        return `
                        @csrf
                        <div class="col mb-5">
                            <div class="card h-100 rounded">
                                <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" placeholder="" value="${product.id}">
                                    <div class="card-body p-2">

                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">${product.product_name}</h5>
                                            <!-- Product price-->
                                            <h5 class="fw-bolder">${product.product_price} บาท</h5>
                                        </div>
                                    </div>

                                    <!-- Product actions-->
                                    <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            {{-- <a class="far fa-edit" style="font-size:24px" href="#"></a> --}}
                                            <button class="btn btn-outline-success mt-auto" type="submit">+</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    `
                    })
                    $('#product_containner').html('')
                    console.log(elements);
                    $.each(elements, function(IndexInArray, valueOfElement) {
                        $('#product_container').append(valueOfElement)
                    });
                }else{
                    $('#product_containner').html('')
                    $('#product_container').append("<h1 class='text-center nt-2'>ไม่มีสินค้าที่ค้นหา</h1>")
                }
            })
        })
    </script>
</x-app-layout>
