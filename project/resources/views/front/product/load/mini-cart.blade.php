{{-- @php

    $items = Session::get('cart')->items;
    // dd($items);
@endphp --}}



@if(Session::has('cart'))
<li>
    <h6 class="mb-0 f-20">Shoping Bag </h6><i data-feather="shopping-cart"></i>
</li>

    @foreach(Session::get('cart')->items as $product)
      <li class="mt-0 cremove{{ $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values']) }}">
          
          <div class="media"><img class="img-fluid rounded-circle me-3 img-60" src="{{ $product['item']['image'] ? asset('assets/uploads/products/'.$product['item']['image']):asset('assets/uploads/noimage.png') }}" alt="">

            <a href="{{ route('product.details',$product['item']['slug']) }}">
                 <div class="media-body"><span>{{mb_strlen($product['item']['name'],'utf-8') > 45 ? mb_substr($product['item']['name'],0,45,'utf-8').'...' : $product['item']['name']}}
                    
                    </span>
            </a>

                    <p>Color(#{{ $product['color'] }}) </p>

                    <div class="qty-box">

                        <input type="hidden" class="prodid" value="{{$product['item']['id']}}">
                        <input type="hidden" class="itemid"
                          value="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">
                        <input type="hidden" class="size_qty" value="{{$product['size_qty']}}">
                        <input type="hidden" class="size_price" value="{{$product['size_price']}}">

                        <div class="input-group">
                            <span class="input-group-prepend">
                            <button class="btn quantity-left-minus bootstrap-touchspin-down" type="button" data-type="minus" data-field=""><i data-feather="minus"></i></button></span>
                            <input class="form-control input-number qty{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" 
                            type="text" name="quantity" value="{{ $product['qty'] }}"><span class="input-group-prepend">
                            <button class="btn quantity-right-plus bootstrap-touchspin-up" type="button" data-type="plus" data-field=""><i data-feather="plus"></i></button></span>
                        </div>
                    </div>
                    <h6  class="text-end text-muted prc{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">
                        {{ App\Models\Product::convertPrice($product['price']) }}</h6>
                </div>
          <div class="close-circle"><i class="cart-remove" data-feather="x"
            data-class="cremove{{ $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values']) }}"
            data-href="{{ route('product.cart.remove',$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])) }}">
              </i>
            </div>
        </div>
      </li>
    @endforeach



  <li>
    <div class="total">
      <h6 class="mb-2 mt-0 text-muted">Order Total : <span class="f-right f-20 mini-total">{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0.00' }}</span></h6>
    </div>
  </li>
  <li>
      <a class="btn btn-block w-100 mb-2 btn-info view-cart" href="{{ route('product.cart') }}">Go to shoping bag</a>
      <a class="btn btn-block w-100 btn-secondary view-cart" href="{{ route('product.checkout') }}">Checkout</a>
    </li>


  @else 
    {{-- <p class="mt-1 pl-3 text-left">Cart is Empty</p> --}}
    <center class="mt-5">Your cart is Empty</center>
    @endif

    {{-- <script>
        var cartItems = document.getElementById('cart-items');
new SimpleBar(cartItems, { autoHide: true });

    </script> --}}