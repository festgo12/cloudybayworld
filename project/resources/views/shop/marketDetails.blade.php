<base href="../">
@extends('layouts.app')
@section('title')
About Shop
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
                  <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Market</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="user-profile social-app-profile">
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
                                       <h6><a href="{{ route('chat.user', $shop->user_id) }}">Chat</a></h6>
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
                  <div class="info market-tabs p-0">
                     <ul class="nav nav-tabs border-tab tabs-scoial" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-Personal" data-bs-toggle="tab"
                           href="#about" role="tab" aria-controls="Personal" aria-selected="true">Business Info</a></li>
                        <li class="nav-item"><a class="nav-link" id="top-skill" data-bs-toggle="tab" href="#business"
                           role="tab" aria-controls="skill" aria-selected="false">About Founder</a></li>
                        <li class="nav-item">
                           <div class="user-designation"></div>
                           <div class="title"><a target="_blank" href="#">{{ $shop->shopName }}</a></div>
                           <!-- <div class="rating"><span><i class="fa fa-star font-warning"></i><i
                              class="fa fa-star font-warning"></i><i class="fa fa-star font-warning"></i><i
                              class="fa fa-star font-warning"></i><i
                              class="fa fa-star font-warning-o"></i></span><span>(206)</span></div> -->
                           <div class="price d-flex">
                              <div class="text-muted me-2" style="text-align:center;">
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 @if(((date('H') >= (int)explode(":",$shop->startTime)[0])) && ((date('H') <= (int)explode(":",$shop->closeTime)[0])))
                                 <span style="color:green"><b>Opened </b></span>{{ $shop->startTime }}am
                                 @else
                                 <span style="color:red"><b>Closed </b></span>{{ $shop->closeTime }}am
                                 @endif
                              </div>
                           </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab" href="#photos"
                           role="tab" aria-controls="photos" aria-selected="false">Photos</a></li>
                        <li class="nav-item"><a class="nav-link" id="top-Videos" data-bs-toggle="tab" href="#Videos"
                           role="tab" aria-controls="Videos" aria-selected="false">Videos</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-content" id="top-tabContent">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="timeline">
               <div class="row">
                  <div class="col-xl-12 xl-100 box-col-12">
                     <div class="default-according style-1 faq-accordion job-accordion" id="accordionoc1">
                        <div class="row">
                           <div class="col-xl-4 xl-50 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon2" aria-expanded="true"
                                          aria-controls="collapseicon2">&nbsp;&nbsp;&nbsp;<b>About Business</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                    data-bs-parent="#accordion">
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                       data-bs-parent="#accordion">
                                       <div class="card-body filter-cards-view">
                                          <span class="f-w-600 mb-2 d-block"></span>
                                          <br>
                                          <div class="row details" style="padding:10px; font-size: 16px;">
                                             <div class="col-6" style="padding:5px;"><span>Business Name :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->shopName }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Founder/ cofounder :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->founder }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Business Type :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->businessType }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Year founded :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->yearFounded }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Partners :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->partners }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>No of branches :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->numberOfBranch }} branches</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Locations :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 17px;">{{ $shop->location }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 xl-50 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon13" aria-expanded="true"
                                          aria-controls="collapseicon13">&nbsp;&nbsp;&nbsp;<b>About Product</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon13" data-bs-parent="#accordion"
                                    aria-labelledby="collapseicon13">
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                       data-bs-parent="#accordion">
                                       <div class="card-body filter-cards-view">
                                          <span class="f-w-600 mb-2 d-block"></span>
                                          <br>
                                          <div class="row details" style="padding:10px; font-size: 16px;">
                                             <div class="col-6" style="padding:5px;"><span>Product category:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->category->category_name }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Major Products:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->majorProduct }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Minor Products:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->minorProduct }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Target Customers :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->targetCustomer }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Hours of Operation:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->timeOfOperation }} {{ $shop->startTime }}am - {{ $shop->closeTime }}pm</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Recommendation :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->recommendation }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 xl-50 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon13" aria-expanded="true"
                                          aria-controls="collapseicon13">&nbsp;&nbsp;&nbsp;<b>Contact Information</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon13" data-bs-parent="#accordion"
                                    aria-labelledby="collapseicon13">
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                       data-bs-parent="#accordion">
                                       <div class="card-body filter-cards-view">
                                          <span class="f-w-600 mb-2 d-block"></span>
                                          <br>
                                          <div class="row details" style="padding:10px; font-size: 16px;">
                                             <div class="col-5" style="padding:5px;"><span>Mobile No :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->contactNo }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Email :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->contactEmail }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Website :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->websiteLink }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Facebook :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->facebookLink }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Twitter :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->twitterLink }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Linkedln :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->linkedinLink }}</p>
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
               </div>
            </div>
            <div class="tab-pane fade show" id="business" role="tabpanel" aria-labelledby="skill">
               <div class="row">
                  <div class="col-xl-12 xl-100 box-col-12">
                     <div class="default-according style-1 faq-accordion job-accordion" id="accordionoc1">
                        <div class="row">
                           <div class="col-xl-4 xl-50 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon2" aria-expanded="true"
                                          aria-controls="collapseicon2">&nbsp;&nbsp;&nbsp;<b>Personal Information</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                    data-bs-parent="#accordion">
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                       data-bs-parent="#accordion">
                                       <div class="card-body filter-cards-view">
                                          <span class="f-w-600 mb-2 d-block"></span>
                                          <br>
                                          <div class="row details" style="padding:10px; font-size: 16px;">
                                             <div class="col-6" style="padding:5px;"><span>FullName :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->owner->firstname }} {{ $shop->owner->lastname }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Gender :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">____</p>
                                             </div>
                                             {{-- <div class="col-6" style="padding:5px;"> <span>Date of Birth :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">../ ../ ....</p>
                                             </div> --}}
                                             <div class="col-6" style="padding:5px;"> <span>Address :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->owner->homeAddress }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>State :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->owner->city }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Country :</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->owner->country }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 xl-50 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon13" aria-expanded="true"
                                          aria-controls="collapseicon13">&nbsp;&nbsp;&nbsp;<b>Professional
                                       Information</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon13" data-bs-parent="#accordion"
                                    aria-labelledby="collapseicon13">
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                       data-bs-parent="#accordion">
                                       <div class="card-body filter-cards-view">
                                          <span class="f-w-600 mb-2 d-block"></span>
                                          <br>
                                          <div class="row details" style="padding:10px; font-size: 16px;">
                                             <div class="col-6" style="padding:5px;"><span>Degree:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->degree }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Practicing Profession:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->profession }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Skill:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->skill }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Experience:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->experience }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Achievements:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->achievements }}</p>
                                             </div>
                                             <div class="col-6" style="padding:5px;"> <span>Fields of Interest:</span></div>
                                             <div class="col-6">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->fieldsOfInterest }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 xl-50 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon13" aria-expanded="true"
                                          aria-controls="collapseicon13">&nbsp;&nbsp;&nbsp;<b>Contact Information</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon13" data-bs-parent="#accordion"
                                    aria-labelledby="collapseicon13">
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                       data-bs-parent="#accordion">
                                       <div class="card-body filter-cards-view">
                                          <span class="f-w-600 mb-2 d-block"></span>
                                          <br>
                                          <div class="row details" style="padding:10px; font-size: 16px;">
                                             <div class="col-5" style="padding:5px;"><span>Mobile No :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->contactNo }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Email :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->contactEmail }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Website :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->websiteLink }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Facebook :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->facebookLink }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Twitter :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->twitterLink }}</p>
                                             </div>
                                             <div class="col-5" style="padding:5px;"> <span>Linkedln :</span></div>
                                             <div class="col-7">
                                                <p style="text-align:right; font-size: 16px;">{{ $shop->linkedinLink }}</p>
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
               </div>
            </div>
            <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
            <input id="shopId" type="hidden" name="shopId" value="{{ $shop->id }}" />
            <input id="shopSlug" type="hidden" name="shopSlug" value="{{ $shop->slug }}" />
            <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos">
               <div class="row">
                  <div class="col-xl-12 xl-100 box-col-12">
                     <div class="default-according style-1 faq-accordion job-accordion" id="accordionoc1">
                        <div class="row">
                           <div class="col-xl-12 xl-100 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon2" aria-expanded="true"
                                          aria-controls="collapseicon2">&nbsp;&nbsp;&nbsp;<b>Photos</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon13" data-bs-parent="#accordion"
                                    aria-labelledby="collapseicon13">
                                    <div id="photosContainer" class="my-gallery card-body row gallery-with-description" itemscope="">
                                       <figure class="col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                          <a
                                             href="assets/images/lightgallry/01.jpg" itemprop="contentUrl"
                                             data-size="1600x950">
                                             <img src="assets/images/lightgallry/01.jpg"
                                                itemprop="thumbnail" alt="Image description">
                                             <!-- <div class="caption">
                                                <h4><b>Photos</b><i class="fa fa-heart" style="float: right; color:red;"></i></h4>
                                             </div> -->
                                          </a>
                                          <!-- <figcaption itemprop="caption description">
                                             <h4><b>Photos</b></h4>
                                          </figcaption> -->
                                       </figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="Videos" role="tabpanel" aria-labelledby="Videos">
               <div class="row">
                  <div class="col-xl-12 xl-100 box-col-12">
                     <div class="default-according style-1 faq-accordion job-accordion" id="accordionoc1">
                        <div class="row">
                           <div class="col-xl-12 xl-100 box-col-6">
                              <div class="card">
                                 <div class="card-header">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                          data-bs-target="#collapseicon2" aria-expanded="true"
                                          aria-controls="collapseicon2">&nbsp;&nbsp;&nbsp;<b>Videos</b></button>
                                    </h5>
                                 </div>
                                 <div class="collapse show" id="collapseicon13" data-bs-parent="#accordion"
                                    aria-labelledby="collapseicon13">
                                    <div id="videoContainer" class="my-gallery card-body row gallery-with-description" itemscope="">
                                       <figure class="col-md-12 col-sm-12" itemprop="associatedMedia" itemscope="">
                                            <video class="img-fluid rounded" itemprop="thumbnail" controls>
                                                <source src="http://192.168.43.119/cloudybayworld/assets/uploads/gc5CdrMVFxVTikfXNYI49YknhumZUGfeqOqWFcD1.webm" type="video/mp4">
                                            </video>
                                            <!-- <div class="caption">
                                                <h4><b>A thousand songs - music video</b></h4>
                                            </div>
                                            </a> -->
                                       </figure>
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
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <script src="{{ asset('./assets/js/dashboard/marketDetails.js') }}"></script>
</div>
@endsection
