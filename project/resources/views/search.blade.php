@extends('layouts.app')

@section('title')
Search 
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/search-page.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/search-autocomplete.css') }}"> -->
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
                  <li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Search</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid search-page">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <form name="searchFrom" autocomplete="off" class="theme-form" action="{{ route('general-search') }}">
                     <div class="input-group m-0 autocomplete">
                        <input id="search-input" class="form-control-plaintext" type="search" name="q" placeholder="Cloudbay...">
                        <span class="btn btn-primary input-group-text d-none d-md-block">Search</span>
                     </div>
                  </form>
               </div>
               <div class="card-body">
                  <div class="text-center">
                     <ul class="nav nav-tabs search-list" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="product-link" data-bs-toggle="tab" href="#product-links" role="tab" aria-selected="true"><i class="icon-target"></i>Products</a></li>
                        <li class="nav-item"><a class="nav-link" id="shop-link" data-bs-toggle="tab" href="#shop-links" role="tab" aria-selected="false"><i class="icon-image"></i>Shops</a></li>
                        <li class="nav-item"><a class="nav-link" id="feed-link" data-bs-toggle="tab" href="#feed-links" role="tab" aria-selected="false"><i class="icon-video-clapper"></i>Feeds</a></li>
                        <li class="nav-item"><a class="nav-link" id="people-link" data-bs-toggle="tab" href="#people-links" role="tab" aria-selected="false"><i class="icon-video-clapper"></i>People</a></li>
                    </ul>
                  </div>
                  <div class="tab-content" id="top-tabContent">
                     <div class="search-links tab-pane fade show active" id="product-links" role="tabpanel" aria-labelledby="product-link">
                        <div class="row">
                           <div class="col-xl-12 col-md-12 box-col-12">
                              <div class="container-fluid product-wrapper">
                                 <div class="product-grid">
                                 
                                    <div class="product-wrapper-grid mx-auto">
                                    <div class="row">
                                       @if(count($products))   
                                       @foreach ($products as $product)
                                          
                                       <div class="col-xl-3 col-sm-6 xl-3">
                                          <div class="card">
                                          <div class="product-box">
                                             <div class="product-img">
                                                <img class="img-fluid" src="{{ asset('assets/uploads/products').'/'.$product->image }}" alt="">
                                             </div>
                                             <div class="modal fade" id="exampleModalCenter-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter-{{ $product->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <div class="product-box row">
                                                      <div class="product-img col-lg-6"><img class="img-fluid" src="{{ asset('assets/uploads/products').'/'.$product->image }}" alt=""></div>
                                                      <div class="product-details col-lg-6 text-start">
                                                         <div class="d-flex justify-content-between mr-5">
                                                            <a href="{{ route('product.details', $product->slug) }}"><h4>{{mb_strlen($product->name,'utf-8')
                                                            > 35 ? mb_substr($product->name ,0,35,'utf-8').'...' : $product->name}}</h4></a>
                  
                                                            <i class="icofont icofont-heart wishcart addwish {{ count(App\Models\Wishlist::where('user_id', Auth::user()->id)->where('product_id', $product->id)->get()) ? 'font-info': '' }}" data-href="{{ route('product-wishlist-add',$product->id) }}"></i>
                                                         </div>

                                                         <div class="product-price">{{ $product->showPrice() }}
                                                            <del>{{ $product->showPreviousPrice() }}    </del>
                                                         </div>
                                                         <div class="product-view">
                                                            <h6 class="f-w-600">Product Details</h6>
                                                            <p class="mb-0">{{ $product->details }}</p>
                                                         </div>
                                                         <div class="product-size">
                                                            <ul>
                                                            
                                                            @foreach( $product->size as $size)
                                                            <li> 
                                                               <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">{{ $size }}</button>
                                                            </li>
                                                            @endforeach

                                                            </ul>
                                                         </div>
                                                         <div class="product-qnty">
                                                         
                                                            <div class="addcart-btn">
                                                            <button id="{{ $product->id }}" data-href="{{ route('product.cart.quickadd',$product->id) }}" class="btn btn-info addtocart" type="button">Add to Cart</button>
                                                            <a href="{{ route('product.details',$product->slug) }}" class="btn btn-info" type="button">View Details</a>

                                                            </div>
                                                         </div>
                                                      </div>
                                                      </div>
                                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                                                   </div>
                                                </div>
                                                </div>
                                             </div>
                                             <div class="product-details">
                                                <div class="rating">
                                                <i class="fa {{ (App\Models\Rating::rating($product->id) >= 1) ? ' fa-star' : 'fa-star-o'}}"></i>
                                                <i class="fa {{ (App\Models\Rating::rating($product->id) >= 2) ? ' fa-star' : 'fa-star-o'}}"></i>
                                                <i class="fa {{ (App\Models\Rating::rating($product->id) >= 3) ? ' fa-star' : 'fa-star-o'}}"></i>
                                                <i class="fa {{ (App\Models\Rating::rating($product->id) >= 4) ? ' fa-star' : 'fa-star-o'}}"></i>
                                                <i class="fa {{ (App\Models\Rating::rating($product->id) >= 5) ? ' fa-star' : 'fa-star-o'}}"></i>
                                                </div>

                                                <a href="{{ route('product.details', $product->slug) }}"><h4>{{mb_strlen($product->name,'utf-8')
                                                > 35 ? mb_substr($product->name ,0,35,'utf-8').'...' : $product->name}}</h4></a>

                                                {{-- <p>{{mb_strlen($product->details,'utf-8')
                                                > 55 ? mb_substr($product->details ,0,55,'utf-8').'...' : $product->details}}</p> --}}
                                                
                                                <div class="product-price">{{ $product->showPrice() }}
                                                <del>{{ $product->showPreviousPrice() }}    </del>
                                                </div>
                                             </div>
                                          </div>
                                          </div>
                                       </div>
                                       @endforeach
                                       @else
                                       <div class="avatar d-flex justify-content-center mt-2">
                                          <img id="tempAvatar" height="200" width="200" alt="" src="./assets/images/dashboard/search_not_found.svg">
                                       </div>
                                       <p class="text-center text-dark">Your search - "{{$query}}" - did not match any product</p>
                                       @endif
                                       
                                    </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-12 m-t-30">
                              <div>
                                 @if(count($products))
                                    {!! $products->links() !!}
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="shop-links" role="tabpanel" aria-labelledby="shop-link">
                        <div>
                           <!-- <h6 class="mb-2">About 12,120 results (0.50 seconds)</h6> -->
                           <div class="col-sm-12 col-md-12">
                           @if(count($shops))
                              @foreach($shops as $shop)
                              <div class="prooduct-details-box">
                                 <div class="media">
                                    <div class="row">
                                       <div class="col-md-4">
                                          <a href="market/{{ $shop->slug }}">
                                             <img class="align-self-center img-fluid img-60"
                                             src="assets/uploads/{{ $shop->attachments['path'] }}" alt="#"
                                             style="width:100%!important; max-height:200px;"></a>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="product-name">
                                             <h5><a href="market/{{ $shop->slug }}"><b>{{ $shop->shopName }}</b></a></h5>
                                          </div>
                                          <div class="rating"><span><i class="fa fa-star font-warning"></i><i
                                             class="fa fa-star font-warning"></i><i
                                             class="fa fa-star font-warning"></i><i
                                             class="fa fa-star font-warning"></i><i
                                             class="fa fa-star font-dark"></i></span><span
                                             style="color:black">(206)</span></div>
                                          <div class="price d-flex">
                                             <div class="text-muted me-2">
                                             @if(((date('H') >= (int)explode(":",$shop->startTime)[0])) && ((date('H') <= (int)explode(":",$shop->closeTime)[0])))
                                             <span style="color:green"><b>Opened </b></span>{{ $shop->startTime }}am
                                             @else
                                             <span style="color:red"><b>Closed </b></span>{{ $shop->closeTime }}am
                                             @endif
                                             </div>
                                          </div>
                                          <div class="avaiabilty">
                                             <div>{{ $shop->description }}</div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="col-md-12">
                                             @if($shop->favorites()->where('user_id', auth()->user()->id)->count())
                                             <span class="fa fa-check-square font-warning"><span>
                                             @endif
                                          </div>
                                          <div class="col-md-12"><a class="btn btn-default text-primary" href="#"><span
                                             class="fa fa-paper-plane">DIRECTION<span> </a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              @else
                              <div class="avatar d-flex justify-content-center mt-2">
                                 <img id="tempAvatar" height="200" width="200" alt="" src="./assets/images/dashboard/search_not_found.svg">
                              </div>
                              <p class="text-center text-dark">Your search - "{{$query}}" - did not match any shop</p>
                              @endif
                           </div>

                        </div>
                        <div class="m-t-30">
                           @if(count($shops))
                              {!! $shops->links() !!}
                           @endif
                        </div>
                     </div>
                     <div class="tab-pane fade" id="feed-links" role="tabpanel" aria-labelledby="feed-link">
                        <div class="row">
                           <div class="col-md-8 mx-auto">
                              <div class="card">
                                 <!-- <h6 class="mb-2">About 6,000 results (0.60 seconds)</h6> -->
                                 <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
                                 <img class="d-none" id="realAvatar" alt="" src="{{ (auth()->user()->attachments) ? './assets/uploads/'.auth()->user()->attachments['path'] : './assets/images/avatar/default.jpg' }}">
                                 <div class="d-flex justify-content-center">
                                    <div id="waitSpinner" class="spinner-border" role="status">
                                          <span class="visually-hidden">Loading...</span>
                                    </div>
                                 </div> 
                                 <div id="feedContainer"></div>      
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="people-links" role="tabpanel" aria-labelledby="people-link">
                        <div class="row">
                           <div class="mx-auto">
                              <!-- <h6 class="mb-2">About 6,000 results (0.70 seconds)</h6> -->
                              
                              <div class="media info-block">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-8 mx-auto">
                                          <div class="people-nearby">
                                          @if(count($people))
                                             @foreach($people as $person)
                                             <div class="nearby-user">
                                                <div class="row">
                                                   <div class="col-md-2 col-sm-2">
                                                   <img style="width: 50px; height: auto;" src="{{ ($person->attachments) ? './assets/uploads/'.$person->attachments['path'] : './assets/images/avatar/default.jpg' }}" alt="person" class="profile-photo-lg">
                                                   </div>
                                                   <div class="col-md-7 col-sm-7">
                                                   <h5><a href="./profile/{{ $person->username }}" class="profile-link">{{ $person->firstname }} {{ $person->lastname }}</a></h5>
                                                   <p>{{ '@' }}{{ $person->username }}</p>
                                                   </div>
                                                   <div class="col-md-3 col-sm-3">
                                                      <button 
                                                         onclick="handleFollowUser(this, '{{ $person->username }}')" 
                                                         class="btn btn-primary pull-right">
                                                         {{ ($person->followers()->where('user_id', auth()->user()->id)->count()) ? "Following" : "Follow" }}
                                                      </button>
                                                   </div>
                                                </div>
                                             </div>
                                             @endforeach
                                             @else
                                             <div class="avatar d-flex justify-content-center mt-2">
                                                <img id="tempAvatar" height="200" width="200" alt="" src="./assets/images/dashboard/search_not_found.svg">
                                             </div>
                                             <p class="text-center text-dark">Your search - "{{$query}}" - did not match any user</p>
                                             @endif
                                          </div>
                                    </div>
                                 </div>
                              </div>
                              </div>
                           </div>
                           <div class="col-xl-12 m-t-30">
                              <div>
                                 @if(count($people))
                                    {!! $people->links() !!}
                                 @endif
                              </div>
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
@endsection

@section('script')
   <script src="{{ asset('./assets/js/dashboard/search.js') }}"></script>
   <script>
      /*initiate the autocomplete function on the "search-input" element*/
      autocomplete(document.getElementById("search-input"), document.forms.searchFrom);
   </script>
@endsection
