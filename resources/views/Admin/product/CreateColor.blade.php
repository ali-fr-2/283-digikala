@extends('Admin.layout.master');


@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow"">
            <form action="{{ route('account.product.StoreColor', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <label for="name_id" class="d-block">نام رنگ  </label>
                        <input name="name" id="name_id" type="text" class="form-control"
                            placeholder="نام رنگ  ">
                    </div>
                    <div class="col">
                        <label for="image_id" class="d-block">بارگذاری رنگ </label>

                        <input name="colors" type="color" class="form-control">
                    </div>
                </div>
                <button type="submit" name="sub" class="btn btn-primary">ثبت رنگ </button>
                {{-- <input type="submit" name="sub" class="btn btn-primary" value="ثبت دسته بندی"> --}}
            </form>
        </div>
    </div>
@endsection

