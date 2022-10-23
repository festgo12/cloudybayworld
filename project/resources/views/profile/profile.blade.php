<base href="../">

@extends('layouts.app')

@section('title')
Profile
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/emojionearea.min.css') }}">
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
                        <li class="breadcrumb-item active"> {{ $user->username }}</li>
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
                <div class="col-sm-12">
                    <div class="card hovercard text-center">
                        <div class="cardheader" style="background: url({{ ($user->coverImage) ? asset('assets/uploads/'.$user->coverImage) :  asset('assets/images/other-images/default-cover.jpg') }})"></div>
                        <div class="user-image">
                            <div class="avatar">
                                <img id="profileAvatar" alt="" src="{{ ($user->attachments) ? asset('assets/uploads/'.$user->attachments['path']) : asset('assets/uploads/avatar/avatar.png') }}">
                            </div>
                            @if($user->id == auth()->user()->id)
                            <div data-bs-toggle="modal" data-bs-target="#updateAvatarModal" class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                            @endif
                        </div>
                        <div class="info">
                            <input id="usernameHolder" type="hidden" name="username" value="{{ $user->username }}" />
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-envelope"></i>   Email</h6><span>{{ $user->email }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-calendar"></i> DOB</h6><del> {{ $user->dateOfBirth }}</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                    <div class="user-designation ">
                                        <div class="title"><a target="_blank" href="#"><strong>{{ $user->firstname }} {{ $user->lastname }}</strong></a></div>
                                        <!-- <div class="p-online"></div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>{{ ($user->contactNo) ? $user->contactNo : '-------------' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>{{ ($user->homeAddress) ? $user->homeAddress : '-----------' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="social-media">
                                @if (Auth::user()->id != $user->id)
                                <button id="followButton" onclick="handleFollowUser('{{ $user->username }}')" class="btn mrl5 btn-lg btn-info default-view"> Follow</button>

                                    
                                <button onclick="location.href='{{ route('chat.user', $user->id) }}';" class="btn mrl5 btn-lg btn-info default-view"> Message</button>
                                @endif
                                <!-- <a class="btn mrl5 btn-lg btn-info-gradien default-view" target="_blank" href="index.html" data-bs-original-title="" title="">Check Now</a> -->
                            </div>
                            <div class="follow">
                                <div class="row">
                                    <div class="col-6 text-md-end border-right">
                                        <div id="followersCountEl" class="follow-num counter">0</div><span>Follower</span>
                                    </div>
                                    <div class="col-6 text-md-start">
                                        <div id="followingCountEl" class="follow-num counter">0</div><span>Following</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user profile first-style end-->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="feed-title">
                                <h4>Feed Update</h4>
                            </div>
                            @if($user->id == auth()->user()->id)
                            <div class="px-4">
                                <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
                                <img class="d-none" id="realAvatar" alt="" src="{{ (auth()->user()->attachments) ? './assets/uploads/'.auth()->user()->attachments['path'] : './assets/images/avatar/default.jpg' }}">
                                <textarea id="postInput" placeholder="What's happening?"  class="form-control"></textarea>
                                <div class="form-group ">
                                   
                                        <label  class="fileInput-upload my-3"><i class="fa fa-image"></i> Post Media 
                                            <input id="fileInput" hidden class="form-control form-control-sm" id="formFileSm" type="file" multiple>
                                        </label>
                                   
                                    <p id="errorMessage" class="text-center">Message</p>
                                    <button id="postButton" type="submit" class="btn btn-primary pull-right my-3">
                                        Post
                                    </button>
                                </div>
                            </div>
                            @else
                            <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
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

    <!-- The updateAvatar Modal -->
    <div class="modal" id="updateAvatarModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add photo</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body p-auto">
                <div>
                    <center>
                    <label  class="profileImage-upload"><i class="fa fa-image"></i> Cover image
                    <input id="coverInput" hidden class="form-control form-control-sm" id="formFileSm" type="file">
                    </label></center>
                </div>
                <div>
                    <center>
                    <label  class="profileImage-upload mt-2"><i class="fa fa-image"></i> Profile Image
                    <input id="avatarInput" hidden class="form-control form-control-sm" id="formFileSm" type="file">
                    </label></center>
                </div>
                <div class="avatar d-flex justify-content-center mt-2">
                    <img id="tempAvatar" style="display:none" height="200" width="200" alt="" src="./assets/images/avatar/default.jpg">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="saveButton" data-bs-dismiss="modal" type="submit" class="btn btn-primary pull-right my-2">
                    Save
                </button>
            </div>

        </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
    <script src="{{ asset('./assets/js/dashboard/profile.js') }}"></script>
</div>
@endsection

@section('script')
        <script src="{{ asset('assets/js/emojionearea.min.js') }}"></script>
@endsection