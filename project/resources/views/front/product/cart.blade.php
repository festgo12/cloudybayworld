@extends('layouts.app')

@section('title')
Cart
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
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Cart</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h5>Cart</h5>

                    @if (Session::has('success'))
                    <div class="text-danger">
                      <p>{{ Session::get('success') }}</p>
                    </div>
                        
                    @endif
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="order-history table-responsive wishlist cart-table">
                        @if(Session::has('cart'))
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Prdouct</th>
                              <th>Prdouct Name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Action</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($products as $product)
                                
                            <tr class="cremove{{ $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values']) }}">
                              {{-- <td><img class="img-fluid img-40" src="./assets/images/product/1.png" alt="#"></td> --}}
                              <td><img class="img-fluid img-40" src="{{ $product['item']['image'] ? asset('assets/uploads/products/'.$product['item']['image']):asset('assets/uploads/noimage.png') }}" alt="#"></td>
                              <td>
                                <div class="product-name"><a href="#">{{mb_strlen($product['item']['name'],'utf-8')
                                  > 35 ? mb_substr($product['item']['name'],0,35,'utf-8').'...' : $product['item']['name']}}</a></div>
                              </td>
                              <td>{{ App\Models\Product::convertPrice($product['item_price']) }}</td>
                              <td>
                                    <input type="hidden" class="prodid" value="{{$product['item']['id']}}">
                                      <input type="hidden" class="itemid"
                                        value="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">
                                      <input type="hidden" class="size_qty" value="{{$product['size_qty']}}">
                                      <input type="hidden" class="size_price" value="{{$product['size_price']}}">
                                <fieldset class="qty-box">
                                  <div class="input-group">
                                    <input  class="touchspin text-center cart-quantity qty{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" type="text" value="{{ $product['qty'] }}">
                                  </div>
                                </fieldset>

                                    {{-- <div class="qty-box d-flex">

                                      <input type="hidden" class="prodid" value="{{$product['item']['id']}}">
                                      <input type="hidden" class="itemid"
                                        value="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">
                                      <input type="hidden" class="size_qty" value="{{$product['size_qty']}}">
                                      <input type="hidden" class="size_price" value="{{$product['size_price']}}">
              
                                      <div class="input-group">
                                          <span class="input-group-prepend">
                                          <button class="btn quantity-left-minus reducing" type="button" data-type="minus" data-field=""><i data-feather="minus"></i></button></span>
                                          <input class="form-control input-number qty{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" 
                                          type="text" name="quantity" value="{{ $product['qty'] }}"><span class="input-group-prepend">
                                          <button class="btn quantity-right-plus adding" type="button" data-type="plus" data-field=""><i data-feather="plus"></i></button></span>
                                      </div>
                                  </div> --}}
                              </td>
                              <td><i class="removecart cart-remove text-danger" data-feather="x-circle" 
                                data-class="cremove{{ $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values']) }}"
                                data-href="{{ route('product.cart.remove',$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])) }}">
                              </i></td>

                              <td class="prc{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" >
                                {{ App\Models\Product::convertPrice($product['price']) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                              <td colspan="4">                                           
                                <div class="input-group">
                                </div>
                              </td>
                              <td class="total-amount">
                                <h6 class="m-0 text-end"><span class="f-w-600">Total Price :</span></h6>
                              </td>
                              <td><span class="cart-total">{{ App\Models\Product::convertPrice($totalPrice) }} </span></td>
                              {{-- <td><span>{{ Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00'
                              }} </span></td> --}}
                            </tr>
                            <tr>
                              <td colspan="4">                                           
                                <div class="input-group">
                                </div>
                              </td>
                              <td class="total-amount">
                                <h6 class="m-0 text-end"><span class="f-w-600">Tax :</span></h6>
                              </td>
                              <td><span>{{ App\Models\Product::convertPrice($tx) }}</span></td>
                            </tr>
                            <tr>
                              <td colspan="4">                                           
                                <div class="input-group">
                                  <input class="form-control me-2" type="text" placeholder="Enter coupan code"><a class="btn btn-info" href="#">Apply</a>
                                </div>
                              </td>
                              <td class="total-amount">
                                <h6 class="m-0 text-end"><span class="f-w-600">Main Price :</span></h6>
                              </td>
                              <td><span class="main-total">{{ App\Models\Product::convertPrice($mainTotal) }} </span></td>
                              {{-- <td><span>{{ Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00'
                              }} </span></td> --}}
                            </tr>
                            <tr>
                              
                              <td class="text-end" colspan="1"><a class="" href="{{ route('product-wishlists') }}"><div class="wish-box"><i class="font-info" data-feather="heart"></i><span id="wish-count" class="badge rounded-pill badge-primary">{{ $wishCount }}</span></div></a></td>
                              <td class="text-end" colspan="4"><a class="btn btn-secondary cart-btn-transform" href="{{ route('product.index') }}">continue shopping</a></td>
                              <td><a class="btn btn-success cart-btn-transform" href="{{ route('product.checkout') }}">check out</a></td>
                            </tr>
                            
                          </tbody>
                        </table>
                            @else
                            
                        <center class="">Your cart is Empty</center>
                        @if ($wishCount)
                        
                          <center class="mt-3"><a class="" href="{{ route('product-wishlists') }}"><div class="wish-box"><i class="font-info" data-feather="heart"></i><span id="wish-count" class="badge rounded-pill badge-primary">{{ $wishCount }}</span></div></a></center>
                          @endif
                          <center class="mt-3"><a class="btn btn-info cart-btn-transform" href="{{ route('product.index') }}">continue shopping</a></center>
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- Container-fluid Ends-->
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('script')
 
<script type="text/javascript">

$(document).ready(function () {








    });


  







  
    
  
</script>

@endsection