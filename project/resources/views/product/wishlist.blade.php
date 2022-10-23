@extends('layouts.app')

@section('title')
WishList
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
              <li class="breadcrumb-item active">Wishlist</li>
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
            <div class="card-header">
              <h5>Wishlist</h5>
            </div>
            <div class="card-body">
              <div class="row wishlist">
                @if(count($wishlists))
                
                  @foreach($wishlists as $wish)
                    <div class="col-xl-4 col-md-6">
                        <div class="prooduct-details-box">         
                                                    
                            <div class="media"><img class="align-self-center pl-2 img-fluid img-60" src="{{ $wish->product->image ? asset('assets/uploads/products/'.$wish->product->image):asset('assets/uploads/noimage.png') }}" alt="#">
                            <div class="media-body ms-3">
                                <div class="product-name">
                                <h6><a href="{{ route('product.details', $wish->product->slug) }}">{{ $wish->product->name }}</a></h6>
                                </div>
                                <div class="rating">
                                  <i class="fa {{ (App\Models\Rating::rating($wish->product->id) >= 1) ? ' fa-star' : 'fa-star-o'}}"></i>
                                  <i class="fa {{ (App\Models\Rating::rating($wish->product->id) >= 2) ? ' fa-star' : 'fa-star-o'}}"></i>
                                  <i class="fa {{ (App\Models\Rating::rating($wish->product->id) >= 3) ? ' fa-star' : 'fa-star-o'}}"></i>
                                  <i class="fa {{ (App\Models\Rating::rating($wish->product->id) >= 4) ? ' fa-star' : 'fa-star-o'}}"></i>
                                  <i class="fa {{ (App\Models\Rating::rating($wish->product->id) >= 5) ? ' fa-star' : 'fa-star-o'}}"></i>
                                </div>
                                <div class="price d-flex"> 
                                <div class="text-muted me-2">Price</div>: {{ $wish->product->showPrice() }}
                                </div>
                                <div class="avaiabilty">
                                    @if (!$wish->product->emptyStock())
                                    <div class="text-success">In stock ({{ $wish->product->stock }}) </div>
                                    @else
                                        
                                    <div class="txt-danger">Out of stock</div>
                                    @endif
                                
                                </div>
                                <a class="btn btn-primary btn-xs  move-cart" data-href="{{ route('product-wishlist-remove',$wish->id) }}" data-href2="{{ route('product.cart.add',$wish->product->id) }}" href="#">Move to Cart</a>
                                <i class="close wishlist-remove" data-href="{{ route('product-wishlist-remove',$wish->id) }}" data-feather="x"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                @else
                                
                        <center class="">Your WishList is Empty</center>
                @endif

                
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid Ends-->
    </div>
  </div>
@endsection

@section('script')
 
<script type="text/javascript">

$(document).ready(function () {








    });


  







  
    
  
</script>

@endsection