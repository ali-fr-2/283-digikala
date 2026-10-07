@extends('Home.layout.master')
@section('content')
    <!--start breadcrumb-->
    <div class="container-fluid">
        <div class="bg-transparent">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="margin-top: 1px"><a href="">فروشگاه اینترنتی دیجی کالا</a></li>
                    <li class="breadcrumb-item"><a href="">کالای دیجیتال</a></li>
                    <li class="breadcrumb-item"><a href="">کامپیوتر و تجهیزات جانبی</a></li>
                    <li class="breadcrumb-item"><a href="">هدفون , هدست , میکروفون</a></li>
                    <li class="breadcrumb-item active">هنذفری بلوتوث مدل HBQ-I7</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <!--start product -->
    <div class="container-fluid box_product">
        <div class="row bg-success">
            <div class="col-lg-4 bg-white">
                <div class="row">
                    <div class="col-lg-2 col-2 gallery_options">
                        <ul class="list-inline">
                            <li><a href="#"><i class="material-icons">favorite_border</i></a></li>
                            <li><a href="#"><i class="material-icons">share</i></a></li>
                            <li><a href="#"><i class="material-icons">hdr_strong</i></a></li>
                            <li><a href="#"><i class="material-icons">timeline</i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-10">
                        <div class="box_img border-bottom text-center pt-0 pt-md-4">
                            <img src="{{ asset('AdminAssets/product-image/' . $product->image) }}" class="img-fluid">
                        </div>
                        <div class="box_list_img mt-3 pt-0 pt-md-5 text-center">
                            <ul class="list-inline">
                                @foreach ($productimages as $productimage)
                                    @if ($product->id == $productimage->id_product)
                                        <li class="list-inline-item"><img
                                                src="{{ asset('AdminAssets/product-image/' . $productimage->images) }}"
                                                alt="product_images"></li>
                                    @endif
                                @endforeach
                                <li class="list-inline-item"><i class="material-icons">more_horiz</i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 product-info">
                <div class="row text-center text-md-left ">
                    <div class="col-md-9 pt-3">
                        <h1 class="product-title">
                            {{ $product->name }}
                            <span>HBQ-I7 Bluetooth Handsfree
                            </span>
                        </h1>
                    </div>
                    <div class="col-md-3 text-center box_beenhere">
                        <i class="material-icons beenhere">
                            beenhere
                        </i>
                        <p>بیش از ۲۰ نفر از خریداران این محصول را پیشنهاد داده اند</p>
                    </div>
                </div>
                <div class="border_bottom"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="product_directory pt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <span>برند</span>
                                    :
                                    <span>متفرقه</span>
                                </li>
                                <li class="list-inline-item pr-3">
                                    <span>دسته بندی</span>
                                    :
                                    <span><a href="#">هنذفری</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="box_color mt-1 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item title">انتخاب رنگ :</li>
                                @foreach ($productcolors as $productcolor)
                                @if ($product->id==$productcolor->id_product )
                                    <a href="">
                                        <li class="list-inline-item box_check1">
                                            <div  class="check1" style="background-color: {{ $productcolor->colors }}"><span>{{ $productcolor->name }}</span></div>
                                        </li>
                                    </a>
                                @endif

                                @endforeach
                            </ul>
                        </div>
                        <br>
                        <div class="product_guarantee mt-3 text-center text-md-left">
                            <i class="material-icons">offline_pin</i>
                            <span>سرویس ویژه دیجی کالا : ۷ روز تضمین تعویض کالا</span>
                        </div>
                        <div class="border_bottom mt-3"></div>
                        <div class="product_guarantee mt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item  mr-0"><i class="material-icons store">store</i></li>
                                <li class="list-inline-item">
                                    <span>فروشنده</span>
                                    :
                                    <span><a href="#">بوسمن</a></span>
                                </li>
                                <li class="seller_rate"><span>رضایت خرید :۵۳%</span></li>
                            </ul>
                        </div>
                        <div class="product_guarantee mt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item mr-0">
                                    <img src="img/1fb9a3a5.svg" alt="">
                                </li>
                                <li class="list-inline-item mr-2">
                                    <span>بسته بندی و ارسال توسط دیجی کالا</span>
                                </li>
                            </ul>
                        </div>
                        <div class="product_guarantee mt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item mr-0">
                                    <img src="img/warehouse.JPG" width="25" alt="">
                                </li>
                                <li class="list-inline-item mr-2">
                                    <span class="text-info">آماده ارسال</span>
                                </li>
                            </ul>
                        </div>
                        <div class="border_bottom mt-3"></div>
                        <div class="box_price mt-2 text-center text-md-left">
                            <p>66,000 تومان</p>
                            <a href="#" class="btn btn_custom2 shadow-sm"><i class="material-icons">shopping_cart</i>افزودن
                                به سبد خرید</a>
                        </div>
                    </div>
                    <div class="col-md-4 product_params bg-transparent mt-2 text-center text-md-left">
                        <div class="box1">
                            <a href="" class="btn btn-white"><i class="material-icons">store</i>فروشنده / گارانتی این کالا
                                ۷</a>
                        </div>
                        <div class="box2 mt-4">
                            <span>ویژگی های محصول</span>
                            <ul>
                                <li>قابلیت پخش موسیقی : دارد</li>
                                <li>قابلیت کنترل صدا و موزیک : ندارد</li>
                                <li>راهنمایی صوتی : ندارد</li>
                                <li><a href="">موارد بیشتر +</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 pb-4 text-center text-md-left">
                    <div class="col-md-6">
                        <ul class="list-inline">
                            <li class="list-inline-item unfair-price">ایا از قیمت راضی هستید ؟</li>
                            <li class="list-inline-item unfair-price"><a href="">بله</a></li>
                            <li class="list-inline-item "><a href="">|</a></li>
                            <li class="list-inline-item unfair-price"><a href="">خیر</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 box_offer text-right  text-md-right">
                        <span><i class="material-icons local_offer">local_offer</i><a href="#">کالای خود را در دیجی کالا
                                بفروشید</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end product -->
    <!--start product_feature-->
    <div class="container mt-3 product_feature">
        <div class="row">
            <div class="col box "><a href="#"><img src="img/c99c8b3d.svg" class="img-fluid" alt="">
                    <ul class="list-inline">
                        <li>امکان</li>
                        <li>تحویل اکسپرس</li>
                    </ul>

                </a></div>
            <div class="col box "><a href="#"><img src="img/28cf2088.svg" class="img-fluid pf_img" alt="">
                    <ul class="list-inline">
                        <li>امکان</li>
                        <li>تحویل اکسپرس</li>
                    </ul>

                </a></div>
            <div class="col box "><a href="#"><img src="img/4c9cdf1f.svg" class="img-fluid pf_img" alt="">
                    <ul class="list-inline">
                        <li>امکان</li>
                        <li>تحویل اکسپرس</li>
                    </ul>

                </a></div>
            <div class="col box "><a href="#"><img src="img/d9c5e979.svg" class="img-fluid pf_img" alt="">
                    <ul class="list-inline">
                        <li>امکان</li>
                        <li>تحویل اکسپرس</li>
                    </ul>

                </a></div>
            <div class="col box "><a href="#"><img src="img/9aec2c1d.svg" class="img-fluid pf_img" alt="">
                    <ul class="list-inline">
                        <li>امکان</li>
                        <li>تحویل اکسپرس</li>
                    </ul>

                </a></div>
        </div>
    </div>
    <!--end product_feature-->
    <!--start suppliers-->
    <div class="container mt-4">
        <div class="title_suppliers">
            <span><i class="material-icons">store</i>لیست فروشنده / گارانتی های این محصول</span>
        </div>
        <div class="table_suppliers pb-4 bg-white mt-4 shadow-sm ">
            <table class="table bg-white table-bordered table-responsive_custom">
                <thead>
                    <tr class="text-white">
                        <th>نام فروشنده</th>
                        <th>زمان ارسال</th>
                        <th>گارانتی</th>
                        <th>قیمت</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table_link"><a href="#">رهام</a><br><i class="material-icons">check</i>
                            <span class="span1">رضایت خرید :</span><span class="span2">۵۹ % از (۱۳۹۶) رای</span>
                        </td>

                        <td>
                            <img src="img/warehouse.JPG" width="25" alt="">
                            <span class="span2">آماده ارسال</span>
                            <br>
                            <span class="span1">بسته بندی و ارسال توسط دیجی کالا</span>
                        </td>


                        <td>
                            <i class="material-icons offline_pin">offline_pin</i>
                            <span class="title_g">گارانتی اصالت و سلامت فیزیکی کالا</span>
                        </td>

                        <td>
                            <span class="price pt-2">۶۵,۰۰۰ تومان
                            </span>
                        </td>
                        <td><a href="#" class="btn btn_custom2 shadow-sm">افزودن به سبد خرید</a></td>

                    </tr>
                    <tr>
                        <td class="table_link"><a href="#">رهام</a><br><i class="material-icons">check</i>
                            <span class="span1">رضایت خرید :</span><span class="span2">۵۹ % از (۱۳۹۶) رای</span>
                        </td>

                        <td>
                            <img src="img/warehouse.JPG" width="25" alt="">
                            <span class="span2">آماده ارسال</span>
                            <br>
                            <span class="span1">بسته بندی و ارسال توسط دیجی کالا</span>
                        </td>


                        <td>
                            <i class="material-icons offline_pin">offline_pin</i>
                            <span class="title_g">گارانتی اصالت و سلامت فیزیکی کالا</span>
                        </td>

                        <td>
                            <span class="price pt-2">۶۵,۰۰۰ تومان
                            </span>
                        </td>
                        <td><a href="#" class="btn btn_custom2 shadow-sm">افزودن به سبد خرید</a></td>

                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <p class="text-center"><a href="#">مشاهده (5) فروشنده / گارانتی بیشتر <i
                            class="material-icons">keyboard_arrow_down
                        </i></a></p>
            </div>
        </div>
    </div>

@endsection
