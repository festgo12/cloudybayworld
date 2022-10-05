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
            <li class="breadcrumb-item active"> Feeds</li>
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
            <div class="card">
            <div class="card-header high-height">
                <h5>Highlights</h5>
            </div>
            <div class="card-body">
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
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="feed-title">
                        <h4>Feed Update</h4>
                    </div>
                    
                    <div class="px-4">
                        <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
                        <img class="d-none" id="realAvatar" alt="" src="{{ ($user->attachments) ? './assets/uploads/'.$user->attachments['path'] : './assets/images/avatar/default.jpg' }}">
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
    <script src="{{ asset('./assets/js/dashboard/feeds.js') }}"></script>
</div>
@endsection