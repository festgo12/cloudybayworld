<base href="../">

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
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
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
                        <div class="cardheader"></div>
                        <div class="user-image">
                            <div class="avatar">
                                <img id="realAvatar" alt="" src="{{ ($user->attachments) ? './assets/uploads/'.$user->attachments['path'] : './assets/images/avatar/default.jpg' }}">
                            </div>
                            <div data-bs-toggle="modal" data-bs-target="#updateAvatarModal" class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
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
                                                <h6><i class="fa fa-calendar"></i> DOB</h6><del> &#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;</del>
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
                                <button id="followButton" onclick="handleFollowUser('{{ $user->username }}')" class="btn mrl5 btn-lg btn-info default-view"> Follow</button>
                                <button class="btn mrl5 btn-lg btn-info default-view"> Message</button>
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
                            <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
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
            <div class="modal-body">
                <input id="avatarInput" class="form-control form-control-sm" id="formFileSm" type="file">
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