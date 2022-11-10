<base href="../../">

@extends('layouts.app')
@section('title')
Shop Feeds
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/market-feed-new-blog.css') }}">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
                                       {{-- <h6><a href="{{ route('chat.user', [ $username = $shop->owner->username, $fakeSlug =Illuminate\Support\Str::random(40)]) }}">Chat</a></h6>  --}}
                                       <h6><a href="{{ route('chat.user', $shop->user_id) }}">Chat</a></h6>
                                       {{-- <h6><a href="{{ route('chat.user', [ $username = $shop->owner->username, $fakeSlug =Illuminate\Support\Str::random(40)]) }}">Chat</a></h6>  --}}
                                    </center>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cardheader socialheader" style="background: url({{ $shop->coverImage ? asset('assets/uploads/'.$shop->coverImage):asset('assets/uploads/cover.jpg') }});"></div>
                  <div class="user-image">
                     <div class="avatar"><img alt="" src="assets/uploads/{{ $shop->attachments['path'] }}"></div>
                     {{-- @if($shop->user_id == auth()->user()->id)
                     <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                     @endif --}}
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
                                    <h6>&nbsp; {{ App\Models\Product::where('user_id', $shop->user_id)->get()->count() }}</h6><span>Products</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                           <div class="user-designation"></div>
                           <div class="title">{{ $shop->shopName }} </div>
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
                           @if($shop->user_id == auth()->user()->id)
                           <div data-bs-toggle="modal" data-bs-target="#newBlogPostModal" class="btn m-2 border border-primary rounded">
                              <i class="icofont icofont-ui-add"></i>
                              Add New Blog Post
                           </div>
                           @endif
                           <div class="owl-carousel owl-theme" id="carousel-high">
                              @foreach($blogList as $blog)
                              <div class="item">
                                 <img src="./assets/uploads/blogs/{{$blog->photo}}" alt="">
                              </div>
                              @endforeach
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
                              
                              <label  class="fileInput-upload my-3"><i class="fa fa-image"></i> Post Media 
                                    <input id="fileInput" hidden class="form-control form-control-sm" id="formFileSm" type="file" multiple>
                              </label>
                                    
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

   <!-- The newBlogPost Modal -->
   <div class="modal" id="newBlogPostModal">
      <div class="modal-dialog">
         <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                  <h6 class="modal-title">Add New Blog Post</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>

               <!-- Modal body -->
               <div class="modal-body p-auto">
               <div class="content-area">
                  <div class="add-product-content1">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="product-description">   
                              <div class="body-area">
                              
                                 <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <p class="text-left"></p> 
                                 </div>
                                 <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <ul class="text-left"></ul>
                                 </div>

                                 <form id="geniusform" action="{{route('market-blog-create')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="left-area">
                                             <p class="heading">{{ __('Category') }}*</p>
                                          </div>
                                       </div>
                                       <div class="col-lg-7">
                                          <select  class="form-control my-2"  name="category_id" required="">
                                             <option value="">{{ __('Select Category') }}</option>
                                             @foreach($blogCategories as $category)
                                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <input type="hidden" name="shop_id" value="{{ $shop->id }}" />
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="left-area">
                                             <p class="heading">{{ __('Title') }} *</p>
                                          </div>
                                       </div>
                                       <div class="col-lg-7">
                                          <input type="text" class="input-field form-control my-2" name="title" placeholder="{{ __('Title') }}" required="" value="">
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="left-area">
                                             <p class="heading">{{ __('Current Featured Image') }} *</p>
                                          </div>
                                       </div>
                                       <div class="col-lg-7">
                                          <div class="img-upload">
                                             <div id="blog-image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label">
                                                   <i class="icofont icofont-upload-alt"></i>{{ __('Upload Image') }}
                                                </label>
                                                <input type="file" name="photo" class="img-upload my-2" id="blog-image-upload">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="left-area">
                                             <p class="heading">
                                                {{ __('Description') }} *
                                             </p>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <textarea  class="nic-edit-p form-control my-2" name="details"></textarea> 
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="left-area">
                                             <p class="heading">{{ __('Tags') }} *</p>
                                          </div>
                                       </div>
                                       <div class="col-lg-7">
                                          <input type="text" name="tags" class="form-control my-2" autocomplete="off" placeholder="Add Tags (seperated with commas)">
                                          <ul id="tags" class="myTags">
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="left-area">
                                          </div>
                                       </div>
                                       <div class="col-lg-7">
                                          <button class="addProductSubmit-btn form-control btn btn-primary" type="submit">{{ __('Create Post') }}</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                  <!-- // -->
               </div>

         </div>
      </div>
    </div>
   <!-- Container-fluid Ends-->
</div>
@endsection

@section('script')
<script>
   CKEDITOR.replace( 'details' );
</script>
<script src="{{ asset('./assets/js/dashboard/marketFeed.js') }}"></script>
@endsection