@extends('Admin.layout.master');


@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class=" row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4> محصولات</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="style-3" class="table style-3  table-hover">
                                    <thead>
                                        <tr>

                                            <th> اسم محصول </th>
                                            <th> قیمت </th>
                                            <th class="text-center">تعداد موجودی</th>
                                            <th class="text-center">دسته بندی</th>
                                            <th class="text-center"> نوضیحات</th>
                                            <th class="text-center"> تصویر</th>
                                            <th> تاریخ ثبت</th>

                                            <th class="text-center">عمل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)

                                            <tr>

                                                <td>{{ Str::limit($product->name, $limit = 25, '...') }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->inventory }}</td>

                                                <td>{{ $product->category->name }}</td>

                                                <td>{{ Str::limit($product->description, $limit = 25, '...') }}</td>


                                                <td class="text-center">
                                                    <span><img src="{{ asset('AdminAssets/product-image/' . $product->image) }}"
                                                            class="profile-img" alt="avatar" style="width: 60px"></span>
                                                </td>
                                                <td>{{ $product->created_at }}</td>


                                                <td class="text-center"><span class="shadow-none badge badge-primary">تایید
                                                        شده</span></td>
                                                <td class="text-center">
                                                    <ul class="table-controls d-flex">
                                                        <li><a href="{{ route('account.product.Edit', $product->id) }}"
                                                                class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                                title="" data-original-title="ویرایش"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    class="feather feather-edit-2 p-1 br-6 mb-1">
                                                                    <path
                                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                    </path>
                                                                </svg></a></li>
                                                        <li>
                                                            <form action="{{ route('account.product.Delete', $product->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                        class="bs-tooltip"
                                                                        data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        title=""
                                                                        data-original-title="حذف"
                                                                        style="border: none; background: none; padding: 0;">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24"
                                                                        height="24"
                                                                        viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        stroke="currentColor"
                                                                        stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        class="feather feather-trash p-1 br-6 mb-1"
                                                                        style="color: white">

                                                                        <polyline points="3 6 5 6 21 6"></polyline>

                                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                        </path>

                                                                    </svg>

                                                                </button>
                                                            </form>
                                                        </li>
                                                            <li><a href="{{ route('account.product.CreateImage', $product->id) }}"
                                                                class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                                title="" data-original-title="افزودن تصویر"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                                <path fill-rule="evenodd" d="M1 5.25A2.25 2.25 0 0 1 3.25 3h13.5A2.25 2.25 0 0 1 19 5.25v9.5A2.25 2.25 0 0 1 16.75 17H3.25A2.25 2.25 0 0 1 1 14.75v-9.5Zm1.5 5.81v3.69c0 .414.336.75.75.75h13.5a.75.75 0 0 0 .75-.75v-2.69l-2.22-2.219a.75.75 0 0 0-1.06 0l-1.91 1.909.47.47a.75.75 0 1 1-1.06 1.06L6.53 8.091a.75.75 0 0 0-1.06 0l-2.97 2.97ZM12 7a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" clip-rule="evenodd" />
                                                                </svg>
                                                                </a></li>
                                                                <li><a href="{{ route('account.product.ShowImages', $product->id) }}"
                                                                class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                                title="" data-original-title="تصاویر "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                                <path fill-rule="evenodd" d="M1 5.25A2.25 2.25 0 0 1 3.25 3h13.5A2.25 2.25 0 0 1 19 5.25v9.5A2.25 2.25 0 0 1 16.75 17H3.25A2.25 2.25 0 0 1 1 14.75v-9.5Zm1.5 5.81v3.69c0 .414.336.75.75.75h13.5a.75.75 0 0 0 .75-.75v-2.69l-2.22-2.219a.75.75 0 0 0-1.06 0l-1.91 1.909.47.47a.75.75 0 1 1-1.06 1.06L6.53 8.091a.75.75 0 0 0-1.06 0l-2.97 2.97ZM12 7a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" clip-rule="evenodd" />
                                                                </svg>
                                                                </a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
