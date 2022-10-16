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
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i data-feather="home"></i></a></li>
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
        <form name="checkOutFrom" action="{{ route('cash.submit') }}" method="post">
          @csrf

          <div class="row">
            <div class="col-xl-6 col-sm-12">
                <div class="row">
                  <div class="mb-3 col-sm-6">
                    <input class="form-control" hidden name="user_id" value="{{ Auth::user()->id }}" type="text">
                    <input class="form-control" hidden name="vendor_shipping_id" value="{{ $vendor_shipping_id }}" type="text">
                    <label for="firstname">First Name <span class="text-danger">*</span></label>
                    <input class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ Auth::user()->firstname }} " id="firstname" type="text">

                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mb-3 col-sm-6">
                    <label for="lastname">Last Name <span class="text-danger">*</span></label>
                    <input class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname }} " id="lastname" type="text">

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-sm-6">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" type="text">

                    @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                  <div class="mb-3 col-sm-6">
                    <label for="inputPassword7">Email Address <span class="text-danger">*</span></label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }} " id="inputPassword7" type="email">

                    @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                </div>
                <div class="mb-3">
                  <label for="customer_country">Country <span class="text-danger">*</span></label>
                  <select class="form-control @error('customer_country') is-invalid @enderror" name="customer_country" id="customer_country">
                    <option value="">Choose...</option>
                    @foreach($countries as $cn)
                    <option value="{{ $cn->country_code }}">{{ $cn->country_name }}</option>
                    @endforeach
                  </select>

                  @error('customer_country')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="mb-3">
                  <label for="address">Address <span class="text-danger">*</span></label>
                  <input class="form-control @error('address') is-invalid @enderror" name="address" id="address" type="text">

                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="mb-3">
                  <label for="city">City <span class="text-danger">*</span></label>
                  <input class="form-control @error('city') is-invalid @enderror" name="city" id="city" type="text">

                  @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="mb-3">
                  <label for="state">State <span class="text-danger">*</span></label>
                  <input class="form-control @error('state') is-invalid @enderror" name="state" id="state" type="text">

                  @error('state')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="mb-3">
                  <label for="pickup_location">Pickup in State <span class="text-danger">*</span></label>
                  <select class="form-control @error('pickup_location') is-invalid @enderror" name="pickup_location" id="pickup_location">
                    <option value="">Choose...</option>
                    @foreach($pickups as $pic)
                    <option value="{{ $pic->location }}">{{ $pic->location }}, {{ $pic->state }}</option>
                    @endforeach
                  </select>

                  @error('pickup_location')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="mb-3">
                  <label for="zip">Postal Code <span class="text-danger">*</span></label>
                  <input class="form-control @error('zip') is-invalid @enderror" name="zip" id="zip" type="text">

                  @error('zip')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
                        <input type="hidden" name="walletBalance" value="{{ Auth::user()->wallet['balance'] }}">
                        <input type="hidden" name="totalPrice" value="{{round($totalPrice * $curr->value,2)}}">
                        <input type="hidden" name="payment_status" value="Pending">
                        <label class="d-block" for="wallet">
                          <input class="radio_animated" id="wallet" value="wallet" type="radio" name="method"  data-original-title="" title="">Pay with wallet
                        </label>
                        <label class="d-block" for="cash">
                          <input class="radio_animated" id="cash" value="cash" type="radio" name="method" checked="" data-original-title="" title="">Cash On Delivery
                        </label>
                        <label class="d-block" for="paystack">
                          <input class="radio_animated" id="paystack" value="paystack" type="radio" name="method"  data-original-title="" title="">PayStack<img class="img-paypal" src="./assets/images/checkout/paypal.png" alt="">
                        </label>
                      </div>
                    </div>
                  </div>
                  <p id="alertMessage" class="text-center"></p>
                  <div class="order-place">
                    <button id="placeOrderButton" class="btn btn-info">Place Order  </button>
                  </div>
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
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script src="{{ asset('./assets/js/dashboard/checkout.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function () {

    });  
  </script>

@endsection