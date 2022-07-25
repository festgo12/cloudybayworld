@extends('layouts.app')

@section('title')
Checkout
@endsection

@section('style')

@endsection

@section('content')
<div class="page-body checkout">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Checkout</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5>Order Details</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('cash.submit') }}" method="post">
          @csrf

          <div class="row">
            <div class="col-xl-6 col-sm-12">
                <div class="row">
                  <div class="mb-3 col-sm-6">
                    <input class="form-control" hidden name="user_id" value="{{ Auth::user()->id }}" type="text">
                    <input class="form-control" hidden name="vendor_shipping_id" value="{{ $vendor_shipping_id }}" type="text">
                    <label for="firstname">First Name</label>
                    <input class="form-control" name="firstname" value="{{ Auth::user()->firstname }} " id="firstname" type="text">
                  </div>
                  <div class="mb-3 col-sm-6">
                    <label for="lastname">Last Name</label>
                    <input class="form-control" name="lastname" value="{{ Auth::user()->lastname }} " id="lastname" type="text">
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-sm-6">
                    <label for="phone">Phone</label>
                    <input class="form-control" name="phone" id="phone" type="text">
                  </div>
                  <div class="mb-3 col-sm-6">
                    <label for="inputPassword7">Email Address</label>
                    <input class="form-control" name="email" value="{{ Auth::user()->email }} " id="inputPassword7" type="email">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="customer_country">Country</label>
                  <select class="form-control" name="customer_country" id="customer_country">
                    <option value="">Choose...</option>
                    @foreach($countries as $cn)
                    <option value="{{ $cn->country_code }}">{{ $cn->country_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="address">Address</label>
                  <input class="form-control" name="address" id="address" type="text">
                </div>
                <div class="mb-3">
                  <label for="city">City</label>
                  <input class="form-control" name="city" id="city" type="text">
                </div>
                <div class="mb-3">
                  <label for="state">State</label>
                  <input class="form-control" name="state" id="state" type="text">
                </div>
                <div class="mb-3">
                  <label for="pickup_location">Pickup in State</label>
                  <select class="form-control" name="pickup_location" id="pickup_location">
                    <option value="">Choose...</option>
                    @foreach($pickups as $pic)
                    <option value="{{ $pic->location }}">{{ $pic->location }}, {{ $pic->state }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="zip">Postal Code</label>
                  <input class="form-control" name="zip" id="zip" type="text">
                </div>
                <div class="mb-3">
                  <label for="zip">Order Note (optional)</label>
                  <textarea class="form-control" name="order_notes" id="" cols="20" rows="3"></textarea>
                  {{-- <input class="form-control" name="zip" id="zip" type="text"> --}}
                </div>
                {{-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" id="gridCheck" type="checkbox">
                    <label class="form-check-label" for="gridCheck">Check me out</label>
                  </div>
                </div> --}}
            </div>
            <div class="col-xl-6 col-sm-12">
              <div class="checkout-details">
                <div class="order-box">
                  <div class="title-box">
                    <div class="checkbox-title">
                      <h4>Product </h4><span>Total</span>
                    </div>
                  </div>
                  <ul class="qty">
                    @foreach($products as $prod)
                    <li>{{ $prod['item']['name']. ' × '. $prod['qty']}}  <span>{{ App\Models\Product::convertPrice($prod['price']) }}</span></li>

                    @endforeach

                    <input class="form-control" hidden name="totalQty" value="{{ $totalQty }}" type="text">
                    <input class="form-control" hidden name="dp" value="{{ $digital }}" type="text">
                  </ul>
                  <ul class="sub-total">
                    <li>Subtotal <span class="count">{{ App\Models\Product::convertPrice($totalPrice) }}</span></li>
                    @if($digital == 0)
                    <li class="shipping-class">Shipping
                      <div class="shopping-checkout-option">
                        <input class="form-control" hidden name="shipping" value="ship 1" type="text">
                        <input class="form-control" hidden name="shipping_cost" value="{{ $shipping_cost }}" type="text">

                        @foreach($shipping_data as $ship)
                        <label class="d-block" for="chk-ani">
                          {{-- <input class="checkbox_animated" id="chk-ani" type="checkbox" checked="">{{ $ship->title }} x {{ App\Models\Product::convertPrice($ship->price) }} --}}
                          <input class="checkbox_animated" id="chk-ani" type="checkbox" >{{ $ship->title }} 
                        </label>
                        @endforeach
                        
                      </div>
                    </li>
                    @endif
                  </ul>
                  <ul class="sub-total total">
                    <li>Total <span class="count">{{ App\Models\Product::convertPrice($totalPrice) }}</span></li>
                    <input class="form-control" hidden name="total" value="{{round($totalPrice * $curr->value,2)}}" type="hidden">
                  </ul>
                  <div class="animate-chk">
                    <div class="row">
                      <div class="col">
                        <input class="form-control" hidden name="method" value="cash" type="text">
                        <label class="d-block" for="wallet">
                          <input class="radio_animated" id="wallet" type="radio" name="rdo-ani"  data-original-title="" title="">Pay with wallet
                        </label>
                        <label class="d-block" for="cash">
                          <input class="radio_animated" id="cash" type="radio" name="rdo-ani" checked="" data-original-title="" title="">Cash On Delivery
                        </label>
                        <label class="d-block" for="paypal">
                          <input class="radio_animated" id="paypal" type="radio" name="rdo-ani"  data-original-title="" title="">PayPal<img class="img-paypal" src="./assets/images/checkout/paypal.png" alt="">
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="order-place"><button class="btn btn-info">Place Order  </button></div>
                </div>
              </div>
            </div>
          </div>
        </form>
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