@extends('Admin.layout.master');


@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow"">
                    <div class=" row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>سبک 3</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table id="style-3" class="table style-3  table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">تصویر</th>
                                        <th class="text-center">عمل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($ProductImages as $ProductImage)
                                        @if ($ProductImage->id_product ==$id){
                                        <tr>
                                            <td class="text-center">
                                                <span><img src="{{ asset('AdminAssets/product-image/' . $ProductImage->images) }}"
                                                        class="profile-img" alt="avatar" style="width: 60px"></span>
                                            </td>
                                            <td class="text-center">
                                                <ul class="table-controls" style="list-style-type: none;">
                                                    <li><a href="" class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="حذف"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash p-1 br-6 mb-1">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                            </svg></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        }

                                        @endif
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
