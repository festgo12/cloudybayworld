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
                        <li class="breadcrumb-item active"> ada-joy</li>
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
                            <div class="avatar"><img alt="" src="./assets/images/avatar/11.jpg"></div>
                            <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-envelope"></i>   Email</h6><span>ada@gmail.com</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-calendar"></i>   BOD</h6><span>02 January 1988</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                    <div class="user-designation ">
                                        <div class="title"><a target="_blank" href="#"><strong>Ada Ayo</strong></a></div>
                                        <!-- <div class="p-online"></div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>+234 810-456-7890</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>B69 Presidenal road, Enugu</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="social-media">
                                <button class="btn mrl5 btn-lg btn-info default-view"> Follow</button>
                                <button class="btn mrl5 btn-lg btn-info default-view"> Message</button>
                                <!-- <a class="btn mrl5 btn-lg btn-info-gradien default-view" target="_blank" href="index.html" data-bs-original-title="" title="">Check Now</a> -->
                            </div>
                            <div class="follow">
                                <div class="row">
                                    <div class="col-6 text-md-end border-right">
                                        <div class="follow-num counter">25869</div><span>Follower</span>
                                    </div>
                                    <div class="col-6 text-md-start">
                                        <div class="follow-num counter">659887</div><span>Following</span>
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
                            <!-- user profile second-style start-->
                            <div class="col-sm-12 ">
                                <div class="card">
                                    <div class="profile-img-style">
                                        <div class="post-border">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="media"><img class="img-thumbnail rounded-circle me-3" src="./assets/images/user/7.jpg" alt="Generic placeholder image">
                                                        <div class="media-body align-self-center">
                                                            <h5 class="mt-0 user-name">JOHAN DIO</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 align-self-center">
                                                    <div class="float-sm-end"><small>10 Hours ago</small></div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="img-container">
                                                <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                    <figure itemprop="associatedMedia" itemscope=""><a href="./assets/images/social-app/post-21.jpeg" itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded" src="./assets/images/social-app/post-22.jpeg" itemprop="thumbnail" alt="gallery"></a>
                                                        <figcaption itemprop="caption description">Image caption 1</figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>

                                            <div class="like-comment">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item border-right pe-3">
                                                        <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>  Like</label><span class="ms-2 counter">2659</span>
                                                    </li>
                                                    <li class="list-inline-item ms-2">
                                                        <label class="m-0"><a href="#"><i class="fa fa-comment"></i></a>  Comment</label><span class="ms-2 counter">569</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="social-chat">
                                                <div class="your-msg">
                                                    <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="./assets/images/user/1.jpg">
                                                        <div class="media-body"><span class="f-w-600">Jason Borne <span>1 Year Ago <i class="fa fa-reply font-primary"></i></span></span>
                                                            <p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="your-msg">
                                                    <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="./assets/images/user/1.jpg">
                                                        <div class="media-body"><span class="f-w-600">Issa Bell <span>1 Year Ago <i class="fa fa-reply font-primary"></i></span></span>
                                                            <p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center"><a href="#">More Commnets</a></div>
                                            </div>
                                            <div class="comments-box">
                                                <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="./assets/images/user/1.jpg">
                                                    <div class="media-body">
                                                        <div class="input-group text-box">
                                                            <input class="form-control input-txt-bx" type="text" name="message-to-send" placeholder="Post Your commnets">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-transparent" type="button"><i class="fa fa-smile-o"> </i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- user profile second-style end-->
                            <!-- user profile third-style start-->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="profile-img-style">
                                        <div class="post-border">

                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="media"><img class="img-thumbnail rounded-circle me-3" src="./assets/images/user/7.jpg" alt="Generic placeholder image">
                                                        <div class="media-body align-self-center">
                                                            <h5 class="mt-0 user-name">JOHAN DIO</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 align-self-center">
                                                    <div class="float-sm-end"><small>10 Hours ago</small></div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-4 pictures my-gallery" id="aniimated-thumbnials-2" itemscope="">
                                                <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a href="./assets/images/other-images/profile-style-img3.png" itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded" src="./assets/images/other-images/profile-style-img.png" itemprop="thumbnail" alt="gallery"></a>
                                                    <figcaption itemprop="caption description">Image caption 1</figcaption>
                                                </figure>
                                                <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a href="./assets/images/other-images/profile-style-img3.png" itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded" src="./assets/images/other-images/profile-style-img.png" itemprop="thumbnail" alt="gallery"></a>
                                                    <figcaption itemprop="caption description">Image caption 2</figcaption>
                                                </figure>
                                            </div>
                                            <p>you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                            <div class="like-comment">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item border-right pe-3">
                                                        <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>  Like</label><span class="ms-2 counter">2659</span>
                                                    </li>
                                                    <li class="list-inline-item ms-2">
                                                        <label class="m-0"><a href="#"><i class="fa fa-comment"></i></a>  Comment</label><span class="ms-2 counter">569</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- user profile third-style end-->
                            <!-- user profile fourth-style start-->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="profile-img-style">
                                        <div class="post-border">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="media"><img class="img-thumbnail rounded-circle me-3" src="./assets/images/user/7.jpg" alt="Generic placeholder image">
                                                        <div class="media-body align-self-center">
                                                            <h5 class="mt-0 user-name">JOHAN DIO</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 align-self-center">
                                                    <div class="float-sm-end"><small>10 Hours ago</small></div>
                                                </div>
                                            </div>
                                            <hr>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
                                            <div class="like-comment mt-4">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item border-right pe-3">
                                                        <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>  Like</label><span class="ms-2 counter">2659</span>
                                                    </li>
                                                    <li class="list-inline-item ms-2">
                                                        <label class="m-0"><a href="#"><i class="fa fa-comment"></i></a>  Comment</label><span class="ms-2 counter">569</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- user profile fourth-style end-->
                            <!-- user profile fifth-style start-->

                        </div>
                        <!-- user profile fifth-style end-->
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

                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="pswp__bg"></div>
                    <div class="pswp__scroll-wrap">
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>
                        <div class="pswp__ui pswp__ui--hidden">
                            <div class="pswp__top-bar">
                                <div class="pswp__counter"></div>
                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                <button class="pswp__button pswp__button--share" title="Share"></button>
                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                        <div class="pswp__preloader__cut">
                                            <div class="pswp__preloader__donut"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div>
                            </div>
                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
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