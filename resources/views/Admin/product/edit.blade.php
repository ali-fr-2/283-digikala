@extends("Admin.layout.master");


@section("content")

    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow"">
                             <form action=" {{ route('account.product.Update', $product->id) }}" method="POST"
            enctype="multipart/form-data" id=" edit-product">

            @csrf
            @method('PUT')
            <div class=" form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">نام محصول</label>
                    <input type="text" name="name" class="form-control" id="inputname4" placeholder="نام محصول"
                        value="{{ $product->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4">قیمت محصول </label>
                    <input type="text" name="price" class="form-control" id="inputprice4" placeholder="قیمت محصول "
                        value="{{ $product->price }}">
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inventory"> تعداد موجودی</label>
                    <input type="number" name="inventory" class="form-control" id="inventory" placeholder=" تعداد موجودی"
                        value="{{ $product->inventory }}">
                </div>
                <div class="form-group col-md-6">

                    <label for="category">دسته بندی محصولات </label>
                    <select class="selectpicker form-control p-2" name="id_category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->id_category == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-row mb-4">
                <label for="inputState">توضیحات محصول</label>

                <textarea type="text" name="description" class="form-control"
                    id="inputCity">{{ $product->description }}</textarea>


            </div>

            <div class="form-row mb-4">
                <label for="image_id" class="d-block">بارگذاری تصویر </label>

                <input name="image" type="file" class="form-control" id="image_id" placeholder="">
                <img src="{{ asset('adminassets/product-image/' . $product->image) }}" width="65px" alt="">

            </div>

            <button type="submit" class="btn btn-primary mt-3">ویرایش محصول</button>

            </form>
        </div>
    </div>

@endsection


@section("jsvalidation")
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ProductRequest', '#edit-product') !!}

@endsection
