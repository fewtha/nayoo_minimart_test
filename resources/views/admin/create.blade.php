<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-12">
                    <div class="container">
                        <div class="row">
                            {{-- Table --}}
                            <div class="col-md-8">
                                @if (session('Success'))
                                    <div class="alert-success">
                                        <b>{{ session('Success') }}</b>
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-header">สินค้า</div>
                                    <div class="card-body">


                                        {{-- ฟังก์ชันค้นหา --}}
                                        {{-- <div>
                                            <form action="" method="GET">
                                                <div class="input-group rounded">
                                                    <input id="product_search" type="search" class="form-control rounded" placeholder="ค้นหา" name="search"
                                                        aria-label="Search" aria-describedby="search-addon">

                                                    <span class="input-group-text border-0" id="search-addon">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                            </form>
                                        </div> --}}

                                        <div class="py-12">
                                            <div class="container">
                                                {{-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4"> --}}
                                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                                                    @foreach ($products as $product)
                                                        <div class="col mb-5">
                                                            <div class="card h-100">
                                                                <!-- Product image-->
                                                                {{-- <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                                                 alt="..." /> --}}
                                                                <img src="{{ asset($product->product_img) }}"
                                                                    class="img-fluid">
                                                                <div data-v-73f15721="" class="wishlist-icon">
                                                                    <a data-v-73f15721="" href="#" class="d-block">
                                                                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                                                                            {{$product->product_stock}}
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <!-- Product details-->
                                                                <div class="card-body p-2">
                                                                    <div class="text-center">
                                                                        <!-- Product name-->
                                                                        <h5 class="fw">
                                                                            {{ $product->product_name }}
                                                                        </h5>
                                                                        <!-- Product price-->
                                                                        {{ $product->product_price }}
                                                                    </div>
                                                                </div>
                                                                <!-- Product actions-->
                                                                <div
                                                                    class="card-footer d-flex p-2 pt-0 border-top-0 bg-transparent">
                                                                    &nbsp;
                                                                    <a class="far fa-edit  mt-auto"
                                                                        style="font-size:35px"
                                                                        href="{{ route('admin.edit', ['id' => $product->id]) }}"></a>
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    &nbsp;
                                                                    <a class="btn btn-danger mt-auto"
                                                                        href="#delete_{{ $product->id }}"
                                                                        data-bs-toggle="modal">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor" class="bi bi-trash"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                        </svg>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        {{-- modalll --}}
                                                        @if ($product != null)
                                                            <div class="modal fade" id="delete_{{ $product->id }}"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="testdropLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="testdropLabel">
                                                                                ยืนยันการลบสินค้า</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            ยืนยันการลบสินค้า
                                                                            {{ $product->product_name }}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">ปิด</button>
                                                                            <a class="btn btn-danger"
                                                                                href="{{ route('delete', ['id' => $product->id]) }}">ยืนยัน</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Form --}}
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">แบบฟอร์มเพิ่มสินค้า</div>
                                    <div class="card-body">
                                        <form action="{{ route('addProduct') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf {{-- ป้องกันการ Hack  ด้วย การป้อน Script --}}
                                            <div class="form-group">
                                                <label for="product_img">ภาพสินค้า</label>
                                                <input type="file" name="product_img" class="form-control"
                                                    id="product_img" required>
                                            </div>
                                            @error('service_img')
                                                <div class="my-2">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                            <br>
                                            <div class="form-group">
                                                <label for="product_name">ชื่อสินค้า</label>
                                                <input type="text" name="product_name" class="form-control"
                                                    id="product_name" required>
                                            </div>
                                            {{-- @error('service_name')
                                                <div class="my-2">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror --}}
                                            <br>
                                            <div class="form-group">
                                                <label for="product_price">ราคาสินค้า</label>
                                                <input type="text" name="product_price" class="form-control"
                                                    id="product_price" required>
                                            </div>
                                            {{-- @error('service_name')
                                                <div class="my-2">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror --}}
                                            <br>
                                            <input type="submit" value="บันทึก" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    return `
                    <div class="col mb-5">
                            <div class="card h-100 rounded">
                                <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" placeholder="" value="${product->id}">
                                    <div class="card-body p-2">
                                        <img src="${asset($product->product_img)}" class="img-fluid rounded">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">${product->product_name}</h5>
                                            <!-- Product price-->
                                            <h5 class="fw-bolder">${product->product_price} บาท</h5>
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
                }
                $('#product_container').html('')
            })
        })
    </script>
</x-app-layout>
