@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">        
      <div class="page-title">
       
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row second-chart-list third-news-update">


        <div class="row">

          <div class="col-sm-6 col-xs-6 col-xxl-3 col-xl-4">
            <div class="card  ">
              
              <div class=" dropdown-basic " style="padding: auto;">
                <div class="dropdown">
                  <div class="dropbtn2  d-flex  align-items-center m-t-10 "   data-bs-original-title="" title="">
                    <span class="cli-bg cli-bg1"><i class="icofont icofont-search"></i></span>
                    <div class="m-l-30 m-t-20">
                      <h5>Local Business </h5>
                    <p><strong>Explore Business</strong></p>
                    </div>
                    
                  </div>
                  <div id="tagList" class="drop-left dropdown-content  p-b-10">
                    <h6  data-bs-original-title="" style="margin: auto;" class="text-center p-t-5 m-b-10" title=""><strong> Select Catlog</strong></h4>
                    <a href="market.html" data-bs-original-title="" title=""><i class="icofont icofont-hanger m-r-10"></i> Clothing</a>
                    <a href="market.html" data-bs-original-title="" title=""><i class="icofont icofont-fast-food m-r-10"></i> Food & Drinks</a>
                    <a href="market.html" data-bs-original-title="" title=""><i class="icofont icofont-food-basket m-r-10"></i> Markets</a>
                    <a href="hotels.html" data-bs-original-title="" title=""><i class="icofont icofont-hotel m-r-10"></i> Hotels & suites</a>
                    <a href="market.html" data-bs-original-title="" title=""><i class="icofont icofont-hospital m-r-10"></i> Hospitals</a>
                    <a href="market.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-touch-phone m-r-10"></i> Phones</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Feature to be worked on later --}}
        
          {{-- <div class="col-sm-6 col-xs-6 col-xxl-3 col-xl-4">
            <div class="card  ">
              
              <div class=" dropdown-basic " style="padding: auto;">
                <div class="dropdown">
                  <div class="dropbtn2  d-flex  align-items-center m-t-10 "   data-bs-original-title="" title="">
                    <span class="cli-bg cli-bg2"><i class="icofont icofont-truck-loaded"></i></span>
                    <div class="m-l-30 m-t-20">
                      <h5>Rides</h5>
                    <p><strong>Book a Ride</strong></p>
                    </div>
                    
                  </div>
                  <div class="drop-left dropdown-content p-b-10">
                    <h6  data-bs-original-title="" style="margin: auto;" class="text-center p-t-5 m-b-10" title=""><strong> Select Ride</strong></h4>
                    <a href="find-ride.html" data-bs-original-title="" title=""><i class="icofont icofont-motor-bike m-r-10"></i> Bike</a>
                    <a href="find-ride.html" data-bs-original-title="" title=""><i class="icofont icofont-auto-rickshaw m-r-10"></i> Keke ride</a>
                    <a href="find-ride.html" data-bs-original-title="" title=""><i class="icofont icofont-taxi m-r-10"></i> Taxi</a>
                    <a href="find-ride.html" data-bs-original-title="" title=""><i class="icofont icofont-airplane m-r-10"></i> Airplane</a>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="col-sm-6 col-xs-6 col-xxl-3 col-xl-4">
            <div class="card  ">
              
              <div class=" dropdown-basic " style="padding: auto;">
                <div class="dropdown">
                  <div class="dropbtn2  d-flex  align-items-center m-t-10 "   data-bs-original-title="" title="">
                    <span class="cli-bg cli-bg3"><i data-feather="shopping-cart"></i></span>
                    <div class="m-l-30 m-t-20">
                      <h5> Products</h5>
                    <p><strong>Explore products</strong></p>
                    </div>
                    
                  </div>
                  <div class="drop-left dropdown-content f-menu p-b-10">
                    <h6  data-bs-original-title="" style="margin: auto;" class="text-center p-t-5 m-b-10" title=""><strong> Select Catlog</strong></h4>
                    <a href="product.html" data-bs-original-title="" title=""><i class="icofont icofont-hanger m-r-10"></i> Clothing</a>
                    <a href="product.html" data-bs-original-title="" title=""><i class="icofont icofont-headphone-alt m-r-10"></i> Accessories</a>
                    <a href="product.html" data-bs-original-title="" title=""><i class="icofont icofont-foot-print m-r-10"></i> Shoes</a>
                    <a href="product.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-touch-phone m-r-10"></i> Phones</a>
                    <a href="product.html" data-bs-original-title="" title=""><i class="icofont icofont-apple-watch m-r-10"></i> Watch & jewelries</a>
                    <a href="product.html" data-bs-original-title="" title=""><i class="icofont icofont-tools-alt-2 m-r-10"></i> Tools & wears</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Features to be worked on later --}}

          {{-- <div class="col-sm-6 col-xs-6 col-xxl-3 col-xl-4">
            <div class="card  ">
              
              <div class=" dropdown-basic " style="padding: auto;">
                <div class="dropdown">
                  <div class="dropbtn2  d-flex  align-items-center m-t-10 "   data-bs-original-title="" title="">
                    <span class="cli-bg cli-bg4"><i class="icofont icofont-tools-bag"></i></span>
                    <div class="m-l-30 m-t-20">
                      <h5>Find Skill</h5>
                    <p><strong>Hire a skill</strong></p>
                    </div>
                    
                  </div>
                  <div class="drop-left dropdown-content f-menu p-b-10">
                    <h6  data-bs-original-title="" style="margin: auto;" class="text-center p-t-5 m-b-10" title=""><strong>Select Skill</strong></h4>
                    <a href="artist.html" data-bs-original-title="" title=""><i class="icofont icofont-job-search m-r-10"></i> Electrician</a>
                    <a href="artist.html" data-bs-original-title="" title=""><i class="icofont icofont-job-search m-r-10"></i> Plumber</a>
                    <a href="artist.html" data-bs-original-title="" title=""><i class="icofont icofont-job-search m-r-10"></i> Designer</a>
                    <a href="artist.html" data-bs-original-title="" title=""><i class="icofont icofont-job-search m-r-10"></i> Animators</a>
                    <a href="artist.html" data-bs-original-title="" title=""><i class="icofont icofont-job-search m-r-10"></i> Artists</a>
                    <a href="artist.html" data-bs-original-title="" title=""><i class="icofont icofont-job-search m-r-10"></i> Fashion Designer</a>
                    <a href="artist.html" data-bs-original-title="" title=""><i class="icofont icofont-job-search m-r-10"></i> Content Creators</a>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col-sm-6 col-xs-6 col-xxl-3 col-xl-4">
            <div class="card  ">
              
              <div class=" dropdown-basic " style="padding: auto;">
                <div class="dropdown">
                  <div class="dropbtn2  d-flex  align-items-center m-t-10 "   data-bs-original-title="" title="">
                    <span class="cli-bg cli-bg5"><i class="icofont icofont-users"></i></span>
                    <div class="m-l-30 m-t-20">
                      <h5>Chat </h5>
                    <p><strong>Chat Rooms</strong></p>
                    </div>
                    
                  </div>
                  <div class="drop-left dropdown-content f-menu p-b-10">
                    <h6  data-bs-original-title="" style="margin: auto;" class="text-center p-t-5 m-b-10" title=""><strong> Chat Rooms</strong></h4>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Political News</a>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Business Trends</a>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Doctors</a>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Lawyers</a>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Designer</a>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Videography </a>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Artists & Animators </a>
                    <a href="chatroom.html" data-bs-original-title="" title=""><i class="icofont icofont-ui-text-chat m-r-10"></i> Content Creators </a>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          
          <div class="col-sm-6 col-xs-6 col-xxl-3 col-xl-4">
            <div class="card  ">
              
              <div class=" dropdown-basic " style="padding: auto;">
                <div class="dropdown">
                  <div class="dropbtn2  d-flex  align-items-center m-t-10 "   data-bs-original-title="" title="">
                    <span class="cli-bg cli-bg6"><i class="icofont icofont-star"></i></span>
                   <a href="favorite.html" class="f-ch text-dark">
                     <div class="m-l-30 m-t-20">
                       <h5>Favorite</h5>
                       <p><strong>Favorite Star</strong></p>
                     </div>
                   </a>
                    
                  </div>
                
                </div>
              </div>
            </div>
          </div>

        </div>

         <!-- Updates Starts -->
      <div class="updates ">
        <h4>Updates</h4>
        <div class="profile-container">
              <div class="owl-carousel owl-theme" id="carousel-profile">
               
                <div class="item profile d-inline-block">
                  <a href="#"><img src="./assets/images/avatar/11.jpg" alt="" srcset=""></a>
                </div>
                <div class="item profile p-late d-inline-block">
                  <img src="./assets/images/avatar/16.jpg" alt="" srcset="">
                </div>
                <div class="item profile d-inline-block">
                  <img src="./assets/images/avatar/3.jpg" alt="" srcset="">
                </div>
                <div class="item profile p-late d-inline-block">
                  <img src="./assets/images/avatar/4.jpg" alt="" srcset="">
                </div>
                <div class="item profile d-inline-block">
                  <img src="./assets/images/avatar/7.jpg" alt="" srcset="">
                </div>
                <div class="item profile p-late d-inline-block">
                  <img src="./assets/images/avatar/8.jpg" alt="" srcset="">
                </div>
                <div class="item profile d-inline-block">
                  <img src="./assets/images/avatar/3.jpg" alt="" srcset="">
                </div>

              </div>
        </div>

        <div class="profile-bar">     
          <hr>

        </div>
      </div>
      <!-- Updates Ends -->


          <div class="col-xl-12 xl-100 box-col-12">
            <div class="row">
              <div class="col-xl-12">
                <div class="card offer-box">
                  <div class="card-body p-0">
                    <div class="offer-slider">
                      <div class="carousel slide" id="carouselExampleCaptions" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="selling-slide row">
                              <div class="col-xl-4 col-md-6">
                                <div class="d-flex">
                                  <div class="left-content">
                                    <p>Much More Selling product</p>
                                    <h4 class="f-w-600">Best Selling Product</h4><span class="badge badge-white rounded-pill">78% offer</span><span class="badge badge-dotted rounded-pill ms-2">Coupon Code : 12345</span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xl-4 col-md-12">
                                <div class="center-img"><img class="img-fluid" src="./assets/images/dashboard/offer-shoes-3.png" alt="..."></div>
                              </div>
                              <div class="col-xl-4 col-md-6">
                                <div class="d-flex">
                                  <div class="right-content">
                                    <p>Money back Guarrantee</p>
                                    <h4 class="f-w-600">Women Straight Kurta</h4><span class="badge badge-white rounded-pill">₦100.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="selling-slide row">
                              <div class="col-xl-4 col-md-6">
                                <div class="d-flex">
                                  <div class="left-content">
                                    <p>Money back Guarrantee</p>
                                    <h4 class="f-w-600">Women Straight Kurta</h4><span class="badge badge-white rounded-pill">₦100.00</span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xl-4 col-md-12">
                                <div class="center-img"><img class="img-fluid" src="./assets/images/dashboard/offer-shoes-3.png" alt="..."></div>
                              </div>
                              <div class="col-xl-4 col-md-6">
                                <div class="d-flex">
                                  <div class="right-content">
                                    <p>Money back Guarrantee</p>
                                    <h4 class="f-w-600">Nike Air Shoes</h4><span class="badge badge-white rounded-pill">₦120.55</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="selling-slide row">
                              <div class="col-xl-4 col-md-6">
                                <div class="d-flex">
                                  <div class="left-content">
                                    <p>Maximum Selling product</p>
                                    <h4 class="f-w-600">Best Selling Product</h4><span class="badge badge-white rounded-pill">50% offer</span><span class="badge badge-dotted rounded-pill ms-2">Coupon Code : 21546</span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xl-4 col-md-12">
                                <div class="center-img"><img class="img-fluid" src="./assets/images/dashboard/offer-shoes-3.png" alt="..."></div>
                              </div>
                              <div class="col-xl-4 col-md-6">
                                <div class="d-flex">
                                  <div class="right-content">
                                    <p>Money back Guarrantee</p>
                                    <h4 class="f-w-600">Nike Air Shoes</h4><span class="badge badge-white rounded-pill">₦120.55</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev" data-bs-original-title="" title=""><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next" data-bs-original-title="" title=""><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>

          <div class="row">
            <div class="col-xl-9 col-md-12 box-col-12">
              <div class="container-fluid product-wrapper">
                <div class="product-grid">
                 
                  <div class="product-wrapper-grid">
                    <div class="row">
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/01.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/01.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Women's Shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img">
                              <div class="ribbon ribbon-danger">Sale</div><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Woman T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Man T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Man T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price"> ₦7500.00
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img">
                              <div class="ribbon ribbon-success ribbon-right">50%</div><img class="img-fluid" src="./assets/images/ecommerce/04.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter3" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/04.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Woman's Suit</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦7500.00
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter4" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Woman T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">
                                                                          ₦5600.00 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="ribbon ribbon-secondary ribbon-vertical-left"><i class="icon-gift"></i></div>
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter5" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter5" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Man T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 box-col-6 email-wrap bookmark-wrap side-more">

              <div class="email-left-aside">
                <div class="card">
                  <div class="card-body">
                    <div class="email-app-sidebar left-bookmark task-sidebar">
                      
                      <ul class="nav main-menu" role="tablist">
                        
                        <li class="nav-item"><h4 class="main-title "> Products Trending</h4></li>
                        <li class="mt-4"><a id="pills-created-tab" data-bs-toggle="pill" href="#pills-created" role="tab" aria-controls="pills-created" aria-selected="true"><h6 class="title"> Clothes</h6></a></li>
                        <li><a class="show" id="pills-todaytask-tab" data-bs-toggle="pill" href="#pills-todaytask" role="tab" aria-controls="pills-todaytask" aria-selected="false"><span class="title"> #agbada</span></a></li>
                        <li><a class="show" id="pills-delayed-tab" data-bs-toggle="pill" href="#pills-delayed" role="tab" aria-controls="pills-delayed" aria-selected="false"><span class="title"> chinease suit</span></a></li>
                        <li><a class="show" id="pills-upcoming-tab" data-bs-toggle="pill" href="#pills-upcoming" role="tab" aria-controls="pills-upcoming" aria-selected="false"><span class="title">skining jeans</span></a></li>
                        <li class="mt-4"><a id="pills-created-tab" data-bs-toggle="pill" href="#pills-created" role="tab" aria-controls="pills-created" aria-selected="true"><h6 class="title"> Hotels</h6></a></li>
                        <li><a class="show" id="pills-todaytask-tab" data-bs-toggle="pill" href="#pills-todaytask" role="tab" aria-controls="pills-todaytask" aria-selected="false"><span class="title"> #oakland</span></a></li>
                        <li><a class="show" id="pills-delayed-tab" data-bs-toggle="pill" href="#pills-delayed" role="tab" aria-controls="pills-delayed" aria-selected="false"><span class="title"> #blueisland</span></a></li>
                        <li class="mt-4"><a id="pills-created-tab" data-bs-toggle="pill" href="#pills-created" role="tab" aria-controls="pills-created" aria-selected="true"><h6 class="title"> Shoes</h6></a></li>
                        <li><a class="show" id="pills-todaytask-tab" data-bs-toggle="pill" href="#pills-todaytask" role="tab" aria-controls="pills-todaytask" aria-selected="false"><span class="title"> #ocante</span></a></li>
                        <li><a class="show" id="pills-delayed-tab" data-bs-toggle="pill" href="#pills-delayed" role="tab" aria-controls="pills-delayed" aria-selected="false"><span class="title"> #snickers</span></a></li>

                       
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>


          <div class="mb-3 mt-5 container-fluid">
            <h4>New Release</h4>
          </div>

            <div class="col-xl-12  box-col-6">
              <div class="container-fluid product-wrapper">
                <div class="product-grid">
                  
                  <div class="product-wrapper-grid">
                    <div class="row">
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/01.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/01.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Woman's Shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img">
                              <div class="ribbon ribbon-danger">Sale</div><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Woman T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Man T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price"> ₦7500.00
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img">
                              <div class="ribbon ribbon-success ribbon-right">50%</div><img class="img-fluid" src="./assets/images/ecommerce/04.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter3" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/04.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Man's Suit</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦7500.00
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter4" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter4" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/02.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Woman T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">
                                                                          ₦5600.00 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="ribbon ribbon-secondary ribbon-vertical-left"><i class="icon-gift"></i></div>
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter5" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter5" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Man T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/01.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter6" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter6" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/01.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Woman T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter7" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter7" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/03.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Man T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 
                                <del>₦11500.00    </del>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                          <div class="product-box">
                            <div class="product-img"><img class="img-fluid" src="./assets/images/ecommerce/12.jpg" alt="">
                              <div class="product-hover">
                                <ul>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-shopping-cart"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter8" data-bs-original-title="" title=""><i class="icofont icofont-eye"></i></button>
                                  </li>
                                  <li>
                                    <button class="btn" type="button" data-bs-original-title="" title=""><i class="icofont icofont-food-cart"></i></button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter8" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="./assets/images/ecommerce/12.jpg" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <h4>Woman T-shirt</h4>
                                        <div class="product-price">₦5600.00
                                          <del>₦11500.00    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">M</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">L</button>
                                            </li>
                                            <li> 
                                              <button class="btn btn-outline-light" type="button" data-bs-original-title="" title="">Xl</button>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                            <div class="input-group bootstrap-touchspin">
                                              <button class="btn btn-info btn-square bootstrap-touchspin-down" type="button" data-bs-original-title="" title=""><i class="fa fa-minus"></i></button><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span><input class="touchspin text-center form-control" type="text" value="5" style="display: block;" data-bs-original-title="" title=""><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span><button class="btn btn-info btn-square bootstrap-touchspin-up" type="button" data-bs-original-title="" title=""><i class="fa fa-plus"></i></button>
                                            </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">Add to Cart</button>
                                            <button class="btn btn-info" type="button" data-bs-original-title="" title="">View Details</button>
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
                              <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                              <h4>Man T-shirt</h4>
                              <p>Simply dummy text of the printing.</p>
                              <div class="product-price">₦5600.00 
                                <del>₦11500.00    </del>
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
            
            <!-- Local News Trending -->
            <div class="mt-3">
              <div class="heading d-flex justify-content-between">
                <h4>Local News Trending</h4>
                <a href="#">
                  See more
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> -->
                  </span>
                </a>
              </div>
              <div class="card-body">
                <div class="owl-carousel owl-theme" id="carousel-1">
                  <div class="item"><img src="./assets/images/social-app/post-27.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-24.jpeg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-26.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-29.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-30.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
       
                </div>
              </div>
            </div>
            <!-- Favourite Stores Feed -->
            <div class="mt-3">
              <div class="heading d-flex justify-content-between">
                <h4>Favourite Stores Feed</h4>
                <a href="#">
                  See more
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> -->
                  </span>
                </a>
              </div>
              <div class="card-body">
                <div class="owl-carousel owl-theme" id="carousel-2">
                  <div class="item"><img src="./assets/images/social-app/post-25.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-24.jpeg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-29.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-25.png" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-27.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>

                </div>
              </div>
            </div>
            <!-- Bonanza Offers And Gift Surprises -->
            <div class="mt-3">
              <div class="heading d-flex justify-content-between">
                <h4>Bonanza Offers And Gift Surprises</h4>
                <a href="#">
                  See more
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> -->
                  </span>
                </a>
              </div>
              <div class="card-body">
                <div class="owl-carousel owl-theme" id="carousel-3">
                  <div class="item"><img src="./assets/images/social-app/post-31.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-25.png" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-24.jpeg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>

                </div>
              </div>
            </div>

            <!-- Brand Newsfeed -->
            <div class="mt-3">
              <div class="heading d-flex justify-content-between">
                <h4>Brand Newsfeed</h4>
                <a href="#">
                  See more
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> -->
                  </span>
                </a>
              </div>
              <div class="card-body">
                <div class="owl-carousel owl-theme" id="carousel-4">
                  <div class="item"><img src="./assets/images/social-app/post-25.png" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-27.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>
                  <div class="item"><img src="./assets/images/social-app/post-26.jpg" alt=""><a href="#"><p class="mt-2">Enugu Shopping Mall</p></a></div>

                </div>
              </div>
            </div>

      </div>
    </div>
    <!-- Container-fluid Ends-->
    <script src="{{ asset('./assets/js/dashboard/home.js') }}"></script>
  </div>
@endsection