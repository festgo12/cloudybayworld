@extends('layouts.app')

@section('title')
My Orders
@endsection

@section('style')

@endsection

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active"> New Orders</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
            @if (count($orders))
             
          <div class="card">
            <div class="card-header">
              <h5>My Orders</h5>
            </div>
            <div class="card-body">
                
                @foreach($orders as $order)
                <div class="row ">
                        @php
                                $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
                                
                              
                        @endphp


                    @foreach($cart->items as $product)

                    <div class="col-xxl-4 col-md-6">
                      <div class="prooduct-details-box">                                 
                        <div class="media"><img class="align-self-center img-fluid img-60" src="{{ $product['item']['image'] ? asset('assets/uploads/products/'.$product['item']['image']):asset('assets/uploads/noimage.png') }}" alt="#">
                          <div class="media-body ms-3">
                            <div class="product-name">
                              <h6><a href="{{ route('product.details', $product['item']['slug']) }}">{{mb_strlen($product['item']['name'],'utf-8')
                                > 35 ? mb_substr($product['item']['name'],0,35,'utf-8').'...' : $product['item']['name']}} x {{ $product['qty'] }}</a></h6>
                            </div>
                            <div class="rating">
                                <i class="fa {{ (App\Models\Rating::rating($product['item']['id']) >= 1) ? ' fa-star' : 'fa-star-o'}}"></i>
                                <i class="fa {{ (App\Models\Rating::rating($product['item']['id']) >= 2) ? ' fa-star' : 'fa-star-o'}}"></i>
                                <i class="fa {{ (App\Models\Rating::rating($product['item']['id']) >= 3) ? ' fa-star' : 'fa-star-o'}}"></i>
                                <i class="fa {{ (App\Models\Rating::rating($product['item']['id']) >= 4) ? ' fa-star' : 'fa-star-o'}}"></i>
                                <i class="fa {{ (App\Models\Rating::rating($product['item']['id']) >= 5) ? ' fa-star' : 'fa-star-o'}}"></i>
                              </div>
                            <div class="price d-flex"> 
                              <div class="text-muted me-2">Price</div>: {{ App\Models\Product::convertPrice($product['price']) }}
                            </div>
                            
                            <div class="avaiabilty">
                              <div class="text-success">Order No : {{$order->order_number}}</div>
                              <div class="price d-flex"> 
                                <div class="text-muted me-2">Order Date</div>: {{date('d-M-Y',strtotime($order->created_at))}}
                              </div>
                              <div class="price d-flex"> 
                                <div class="text-muted me-2">TotalOrder Price</div>: {{ App\Models\Product::convertPrice($order->pay_amount) }}
                              </div>
                            </div>
                            @switch($order->status)
                                    @case('pending')
                                    <button class="btn btn-warning btn-xs" >{{$order->status}}</button>

                                    @break
                                    @case('processing')
                                    <button class="btn btn-primary btn-xs" >{{$order->status}}</button>
                                    
                                    @break
                                    @case('completed')
                                    <button class="btn btn-success btn-xs" >{{$order->status}}</button>
                                    
                                    @break
                                    @case('declined')
                                    <button class="btn btn-danger btn-xs" >{{$order->status}}</button>
                                    
                                    @break
                                    @case('on delivery')
                                    <button class="btn btn-primary btn-xs" >{{$order->status}}</button>
                                    
                                    @break
                                @default
                                <button class="btn btn-warning btn-xs" >{{$order->status}}</button>

                                    
                            @endswitch
                            {{-- <i class="close" data-feather="x"></i> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach


                                
                    <hr>
                </div>
                    @endforeach
                   



               
            </div>
          </div>

          
          @else     

          <div class="card">
            <div class="card-header">
              <h5>My Orders</h5>
            </div>
            <div class="card-body">
              <div class="row">
                   
                    <center class="">No Orders yet </center>
               
              </div>
            </div>
          </div>

          @endif

          
        </div>
        
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection

@section('script')
 
<script type="text/javascript">

$(document).ready(function () {








    });


  







  
    
  
</script>

@endsection