<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">ฟอร์มแก้ไขสินค้า"</div>
            <div class="card-body">
                <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf {{-- ป้องกันการ Hack  ด้วย การป้อน Script --}}
                    <div class="form-group">
                        <img src="{{ asset($product->product_img) }}" alt="" width="500px" height="300px">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="old_img" value="{{ $product->product_img }}">
                        <label for="product_img">ภาพประกอบ</label>
                        <input type="file" name="product_img" class="form-control" id="product_img"
                            value="{{ $product->product_img }}">
                    </div>
                    @error('product_img')
                        <div class="my-2">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="product_name">ชื่อสินค้า</label>
                        <input type="text" name="product_name" class="form-control" id="product_name"
                            value="{{ $product->product_name }}">
                    </div>
                    @error('product_name')
                        <div class="my-2">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="product_price">ราคาสินค้า</label>
                        <input type="text" name="product_price" class="form-control" id="product_price"
                            value="{{ $product->product_price }}">
                    </div>
                    @error('product_price')
                        <div class="my-2">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="product_price">สต็อคสินค้า</label>
                        <input type="text" name="product_stock" class="form-control" id="product_stock"
                            value="{{ $product->product_stock }}">
                    </div>
                    @error('product_price')
                        <div class="my-2">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                    <br>
                    <input type="submit" value="บันทึก" class="btn btn-primary">


                </form>
            </div>
        </div>
    </div>
</x-app-layout>
