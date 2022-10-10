@extends('layouts.app')

@section('title')
{{mb_strlen($productt['name'],'utf-8')
> 35 ? mb_substr($productt['name'] ,0,35,'utf-8').'...' : $productt['name']}}
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endsection

@section('content')
 
@php
     
      $attrPrice = 0;

      if($productt->user_id != 0){
        $attrPrice = $productt->price + $gs->fixed_commission + ($productt->price/100) * $gs->percentage_commission ;
        }

    if(!empty($productt->size) && !empty($productt->size_price)){
          $attrPrice += $productt->size_price[0];
      }

      if(!empty($productt->attributes)){
        $attrArr = json_decode($productt->attributes, true);
      }
@endphp

<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Product Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div>
        <div class="row product-page-main p-0">
          <div class="col-xl-4 xl-cs-65 box-col-12">
            <div class="card">
              <div class="card-body">
                  @if (count($productt->galleries))
                      
                  <div class="product-slider owl-carousel owl-theme" id="sync1">
                    <div class="item"><img src="{{ $productt->image ? asset('assets/uploads/products/'.$productt->image):asset('assets/uploads/noimage.png') }}" alt=""></div>

                      @foreach($productt->galleries as $gal)
                    <div class="item"><img src="{{ asset('assets/uploads/products/gal').'/'.$gal->photo }}" alt=""></div>
                     @endforeach

                  </div>
                  <div class="owl-carousel owl-theme" id="sync2">
                    <div class="item"><img src="{{ $productt->image ? asset('assets/uploads/products/'.$productt->image):asset('assets/uploads/noimage.png') }}" alt=""></div>

                    @foreach($productt->galleries as $gal)
                    <div class="item"><img src="{{ asset('assets/uploads/products/gal').'/'.$gal->photo }}" alt=""></div>
                    @endforeach
                  </div>
                  @else
                  <div class="product-slider owl-carousel owl-theme" id="sync1">
                    <div class="item"><img src="{{ $productt->image ? asset('assets/uploads/products/'.$productt->image):asset('assets/uploads/noimage.png') }}" alt=""></div>
                  </div>
                  <div class="owl-carousel owl-theme" id="sync2">
                    <div class="item"><img src="{{ $productt->image ? asset('assets/uploads/products/'.$productt->image):asset('assets/uploads/noimage.png') }}" alt=""></div>
                  </div>
                      
                  @endif

              </div>
            </div>
          </div>
          <div class="col-xl-5 xl-100 box-col-6">
            <div class="card">
              <div class="card-body">
                <div class="product-page-details">
                  <h3>{{ $productt->name }} </h3>
                </div>
                <div class="product-price">{{ $productt->showPrice() }}
                  <del>{{ $productt->showPreviousPrice() }} </del>
                </div>
                <ul class="product-color">

                  @if ($productt->color)
                      
                      @foreach( $productt->color as $color)
                      
                      <li class="" style="background-color: {{ $color }}"></li>
                      @endforeach
                  @endif

                  
                </ul>
                <hr>

                <p class="mb-0 m-t-20">Product Sku : <b>{{ $productt->sku }}</b></p>
                <p>{{ $productt->details }}</p>
                <hr>
                <div>
                  <table class="product-page-width">
                    <tbody>
                      <tr>
                        <td> <b>Brand Store &nbsp;&nbsp;&nbsp;:</b></td>
                        <td>{{ !($productt->shop->shopName) ? 'CloudBay World' : $productt->shop->shopName }}</td>

                      </tr>
                      <tr>
                        <td> <b>Availability &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                        @if (!$productt->emptyStock())
                            
                        <td class="txt-success">In stock ({{ $productt->stock }})</td>
                        @else
                            
                        <td class="txt-danger">Out of stock</td>
                        @endif
                      </tr>
                      <tr>
                        <td> <b>Seller &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                        <td>{{ ($productt->user->username == 'Deleted') ? 'CloudBay World' : $productt->user->username }}</td>
                      </tr>
                      <tr>
                        <td><b>Estimated Shipping &nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                        <td>{{ $productt->ship }}</td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="product-title">share it</h6>
                  </div>
                  <div class="col-md-6">
                    <div class="product-icon">
                      <ul class="product-social f-right">
                        <li class="d-inline-block"><a href="http://facebook.com"><i class="fa fa-facebook"></i></a></li>
                        <li class="d-inline-block"><a href="http://twitter.com"><i class="fa fa-twitter"></i></a></li>
                        <li class="d-inline-block"><a href="http://instagram.com"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                      
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="product-title">Rate Now</h6>
                  </div>
                  <div class="col-md-6">
                          
                        <div class="d-flex f-right">
                          
                          <div class="rating">
                            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 1) ? ' fa-star' : 'fa-star-o'}}"></i>
                            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 2) ? ' fa-star' : 'fa-star-o'}}"></i>
                            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 3) ? ' fa-star' : 'fa-star-o'}}"></i>
                            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 4) ? ' fa-star' : 'fa-star-o'}}"></i>
                            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 5) ? ' fa-star' : 'fa-star-o'}}"></i>
                           
                          </div>
                          <a href="#review-top-tab"><span>({{ count($productt->ratings) }} reviews)</span></a>
                        </div>
                  </div>
                </div>
                <hr>
                <div class="m-t-15">
                  <button  class="btn btn-info m-r-10 addtocart" data-href="{{ route('product.cart.quickadd',$productt->id) }}" type="button" title=""> <i class="fa fa-shopping-basket me-1"></i>Add To Cart</button>
                  {{-- <button  class="btn btn-success m-r-10" type="button" title=""> <i class="fa fa-shopping-cart me-1"></i>Buy Now</button> --}}
                  <button  class="btn btn-secondary m-r-10 addwish" data-href="{{ route('product-wishlist-add',$productt->id) }}" type="button" title=""> <i class="fa fa-heart me-1"></i>Add To WishList</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 xl-cs-35 box-col-6">
            <div class="card">
              <div class="card-body">
                <!-- side-bar colleps block stat-->
                <div class="filter-block">
                  <h4>Brand</h4>
                  <ul>
                    <li>Clothing</li>
                    <li>Bags</li>
                    <li>Footwear</li>
                    <li>Watches</li>
                    <li>ACCESSORIES</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="collection-filter-block">
                  <ul class="pro-services">
                    <li>
                      <div class="media"><i data-feather="truck"></i>
                        <div class="media-body">
                          <h5>Free Shipping                                    </h5>
                          <p>Free Shipping World Wide</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media"><i data-feather="clock"></i>
                        <div class="media-body">
                          <h5>24 X 7 Service                                    </h5>
                          <p>Online Service For New Customer</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media"><i data-feather="gift"></i>
                        <div class="media-body">
                          <h5>Festival Offer                                 </h5>
                          <p>New Online Special Festival</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media"><i data-feather="credit-card"></i>
                        <div class="media-body">
                          <h5>Online Payment                                  </h5>
                          <p>Contrary To Popular Belief.                                   </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- silde-bar colleps block end here-->
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="row product-page-main">
          <div class="col-sm-12">
            <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
              <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">Details</a>
                <div class="material-border"></div>
              </li>
              @if($productt->youtube != null)

                <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Video</a>
                  <div class="material-border"></div>
                </li>
              @endif
              @if($productt->policy != null)
                
              <li class="nav-item"><a class="nav-link " id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="true">Policy</a>
                <div class="material-border"></div>
              </li>
              @endif

              <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review" role="tab" aria-controls="top-review" aria-selected="true">Reviews</a>
                <div class="material-border"></div>
              </li>
            </ul>
            <div class="tab-content" id="top-tabContent">
              <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                @if ($productt->product_condition == 1)
                    
                <p class="mb-0 m-t-20">Product Condition : <b>Used</b></p>
                @elseif($productt->product_condition == 2)
                <p class="mb-0 m-t-20">Product Condition : <b>New</b> </p>
                
                @endif

                <p class="mb-0 ">Product Type : <b>{{ $productt->type }}</b> </p>
                <p class="mb-0 m-t-20">{{ $productt->details }}</p>

              </div>

              @if($productt->youtube != null)
                <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                  <center class="mt-5"><a target="_blank" href="{{ $productt->youtube }}" class="video-play-btn mfp-iframe">
                    <i class="fa fa-play"></i>
                        </a></center>
                </div>
              @endif

              <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                <p class="mb-0 m-t-20">{{ $productt->policy }}</p>
              </div>
              <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="brand-top-tab">
                <p class="mb-0 m-t-20">Give your review for this product</p>
                <div>

                  <hr>

                  <div class="row mt-3">
                    <form action="{{ route('product.review.submit') }}" id="reviewform" method="post" data-href="{{ route('product.reviews',$productt->id) }}" class="d-inline-block">
                      @csrf
                      
                      <div class="d-flex">
                            <h6 class="product-title mr-5">Rate Now</h6>
                            <select id="u-rating-fontawesome" name="rating" autocomplete="off">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            <span class="select-star ml-2">1 star</span>
                          </div>
                          <input type="hidden" name="product_id" value="{{ $productt->id }}">
                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                          <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="row">
                                  
                                
                                <div class="mb-3">
                                  <label for="zip">Review (optional)</label>
                                  <textarea class="form-control" name="review" id="" cols="20" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                  <div class="order-place review-btn"><button class="btn btn-info">Review </button></div>

                                </div>
                               
                            </div>
                            
                          </div>


                      </form>
                      <hr>
                      
                      <div id="reviews-section">
                        @include('product.load.reviews')
                      </div>
                  </div>
                 
                  
                </div>
              </div>
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
<script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    

<script type="text/javascript">

$(document).ready(function () {








    });


  







  
    
  
</script>

@endsection