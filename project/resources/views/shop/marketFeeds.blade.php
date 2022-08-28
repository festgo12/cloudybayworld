<base href="../../">

@extends('layouts.app')

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
                  <li class="breadcrumb-item active"> Market</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="user-profile">
         <div class="row">
            <!-- user profile first-style start-->
            <div class="col-sm-12 box-col-12">
               <div class="card hovercard text-center" >
                  <div class="info market-tabs p-0" style="margin:10px;">
                     <div class="row">
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <center>
                                <h6><a href="market/{{ $shop->slug }}">About</a></h6>
                                </center>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="ttl-info text-start">
                                <center>
                                <h6><a href="market/feeds/{{ $shop->slug }}">Feeds</a></h6>
                                </center>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                           <div class="row">
                           </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="ttl-info text-start">
                                    <center>
                                       <h6><a href="{{ route('market.product', $shop->slug ) }}">Products</a></h6>
                                    </center>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="ttl-info text-start">
                                    <center>
                                       <h6><a href="{{ route('user', $shop->user_id) }}">Chat</a></h6>
                                    </center>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cardheader socialheader"></div>
                  <div class="user-image">
                     <div class="avatar"><img alt="" src="assets/uploads/{{ $shop->attachments['path'] }}"></div>
                     @if($shop->user_id == auth()->user()->id)
                     <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                     @endif
                  </div>
                  <div class="info">
                     <div class="row">
                        <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="ttl-info text-start">
                                    <h6>&nbsp;&nbsp;<span id="followersCountEl">0</span></h6>
                                    <span>Followers</span>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="ttl-info text-start">
                                    <h6>&nbsp;0</h6>
                                    <span>Following</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                           <div class="user-designation"></div>
                           <div class="title"><a target="_blank" href="#">Shop Rite Mall</a></div>
                           <!-- <div class="rating"><span><i class="fa fa-star font-warning"></i><i
                              class="fa fa-star font-warning"></i><i class="fa fa-star font-warning"></i><i
                              class="fa fa-star font-warning"></i><i
                              class="fa fa-star font-warning-o"></i></span><span >(206)</span>
                           </div> -->
                           <div class="price d-flex">
                              <div class="text-muted me-2" style="text-align:center!important;">
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 @if(((date('H') >= (int)explode(":",$shop->startTime)[0])) && ((date('H') <= (int)explode(":",$shop->closeTime)[0])))
                                 <span style="color:green"><b>Opened </b></span>{{ $shop->startTime }}am
                                 @else
                                 <span style="color:red"><b>Closed </b></span>{{ $shop->closeTime }}am
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="ttl-info text-start">
                                    <h6>{{count($shop->feeds)}}</h6>
                                    <span>Post</span>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="ttl-info text-start">
                                    <h6>0</h6>
                                    <span>Reviews</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div>
                        <button id="favoriteButton" onclick="handleFavoriteShop()" class="btn btn-light active font-primary" type="button"><i class="fa fa-star"></i>
                        Favourite</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button id="followButton" onclick="handleFollowShop()" class="btn btn-info active txt-light" type="button">Follow</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- user profile first-style end-->
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="owl-carousel owl-theme" id="carousel-high">
                              <div class="item"><img src="./assets/images/social-app/post-27.jpg" alt=""></div>
                              <div class="item"><img src="./assets/images/social-app/post-24.jpeg" alt=""></div>
                              <div class="item"><img src="./assets/images/social-app/post-26.jpg" alt=""></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="feed-title">
                            <h4>Feed Update</h4>
                        </div>
                        @if($shop->user_id == auth()->user()->id)
                        <div class="px-4">
                            <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
                            <input id="shopId" type="hidden" name="shopId" value="{{ $shop->id }}" />
                            <input id="shopSlug" type="hidden" name="shopSlug" value="{{ $shop->slug }}" />
                            <img class="d-none" id="realAvatar" alt="" src="{{ (auth()->user()->attachments) ? './assets/uploads/'.auth()->user()->attachments['path'] : './assets/images/avatar/default.jpg' }}">
                            <textarea id="postInput" placeholder="What's happening?"  class="form-control"></textarea>
                            <div class="form-group">
                                <div>
                                    <input id="fileInput" class="form-control form-control-sm" id="formFileSm" type="file" multiple>
                                </div>
                                <p id="errorMessage" class="text-center">Message</p>
                                <button id="postButton" type="submit" class="btn btn-primary pull-right my-2">
                                    Post
                                </button>
                            </div>
                        </div>
                        @else
                        <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
                        <input id="shopId" type="hidden" name="shopId" value="{{ $shop->id }}" />
                        <input id="shopSlug" type="hidden" name="shopSlug" value="{{ $shop->slug }}" />
                        <img class="d-none" id="realAvatar" alt="" src="{{ (auth()->user()->attachments) ? './assets/uploads/'.auth()->user()->attachments['path'] : './assets/images/avatar/default.jpg' }}">
                        @endif
                        <div class="d-flex justify-content-center">
                            <div id="waitSpinner" class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div> 
                        <div id="feedContainer"></div>                      
                    </div>
                </div>

                <div class="col-md-4">
                <div class="default-according style-1 faq-accordion" id="accordionExample">
                    <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-start ps-0 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Ads promotions</button>
                        </h2>
                    </div>
                    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="card-body socialprofile filter-cards-view">
                        
                        <img class="img-fluid mt-5" alt="" src="./assets/images/social-app/ad1.png">
                        <img class="img-fluid mt-5" alt="" src="./assets/images/social-app/ad2.jpg">
                        <img class="img-fluid mt-5" alt="" src="./assets/images/social-app/ad33.jpg">
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
   <script src="{{ asset('./assets/js/dashboard/marketFeed.js') }}"></script>
</div>
@endsection