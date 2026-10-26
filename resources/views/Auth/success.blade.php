{{--
   @foreach ($CartItems as $CartItem)
   <p>1</p>
{{$CartItem->product->price ;}}



   @endforeach

   @php
   $fianlPrice=0;
         foreach ($CartItems as $CartItem ){
         $fianlPrice+=($CartItem->product->price);
        }
        dd("$fianlPrice");


   @endphp
 --}}

 @extends('admin.layout.master');


 @section('content')
     <div class="col-lg-12 col-12 layout-spacing">
         <div class="statbox widget box box-shadow"">

             <div class="row layout-spacing">
                 <div class="col-lg-12">
                     <div class="statbox widget box box-shadow">
                         <div class="widget-header">
                             <div class="row">
                                 <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                     <h4>پرداخت  </h4>
                                 </div>
                             </div>
                         </div>
                         <div class="widget-content widget-content-area">
                            <p>پرداخت با موفقیت انجام شد</p>
                            <p>{{ $order->price }}</p>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 @endsection
