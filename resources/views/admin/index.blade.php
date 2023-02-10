<x-app-layout>
    <!-- Navigation-->
    <!-- Header-->



    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Nayoo Mart</h1>
                <p class="lead fw-normal text-white-50 mb-0">จ่ายตังค์ด้วยเนาะ</p>
            </div>
        </div>
    </header>

    <!-- Button trigger modal -->

    <body>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5 ">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @if ($products)
                        @foreach ($products as $product)
                            <div class="col mb-5">
                                <div class="card h-100 rounded">
                                    <!-- Product image-->
                                    {{-- <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="..." /> --}}
                                    <img src="{{ asset($product->product_img) }}" class="img-fluid rounded">
                                    <!-- Product details-->
                                    <div class="card-body p-2">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $product->product_name }}</h5>
                                            <!-- Product price-->
                                            {{ $product->product_price }}
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">

                                        <div class="d-flex justify-content-center">
                                            <a class="far fa-edit" style="font-size:24px"
                                                href="{{ route('admin.edit', ['id' => $product->id]) }}"></a>
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            <button class="text-danger fa-solid fa-trash-can" style="font-size:24px"
                                                data-bs-toggle="modal" data-bs-target="#test" href="{{ route('delete', ['id' => $product->id]) }}"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($product != null)
                                {{-- modalll --}}
                                <div class="modal fade" id="test" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="testdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="testdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ยืนยันการลบสินค้า
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ปิด</button>
                                                <a class="btn btn-danger"
                                                    href="{{ route('delete', ['id' => $product->id]) }}">ยืนยัน</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </section>

        <!-- Button trigger modal -->

        <!-- Modal -->

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</x-app-layout>
