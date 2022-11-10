@extends('layouts.app')

@section('title')
Explore Product
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/range-slider.css') }}">
@endsection

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <!-- <h3>Product</h3> -->
            {{-- <div class="left-header col horizontal-wrapper ps-0">
              <ul class="horizontal-menu">
                <li class="mega-menu outside"><a class="nav-link" href="#!" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg><span>Category</span></a>
                  <div class="mega-menu-container nav-submenu menu-to-be-close header-mega" style="display: none;">
                    <div class="container-fluid ">
                      <div class="row cat-row ">
                        <div class="col-md-3 mega-box">
                          <div class="mobile-title d-none">
                            <h5>Mega menu</h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                          </div>
                          <div class="link-section icon">
                            <div>
                              <h6>Error Page</h6>
                            </div>
                            <ul>
                              <li><a href="error-400.html" data-bs-original-title="" title="">Error page 400</a></li>
                              <li><a href="error-401.html" data-bs-original-title="" title="">Error page 401</a></li>
                              <li><a href="error-403.html" data-bs-original-title="" title="">Error page 403</a></li>
                              <li><a href="error-404.html" data-bs-original-title="" title="">Error page 404</a></li>
                              <li><a href="error-500.html" data-bs-original-title="" title="">Error page 500</a></li>
                              <li><a href="error-503.html" data-bs-original-title="" title="">Error page 503</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 mega-box">
                          <div class="link-section doted">
                            <div>
                              <h6> Authentication</h6>
                            </div>
                            <ul>
                              <li><a href="login.html" data-bs-original-title="" title="">Login</a></li>
                              <li><a href="login_one.html" data-bs-original-title="" title="">Login with image</a></li>
                              <li><a href="login-bs-validation.html" data-bs-original-title="" title="">Login with validation</a></li>
                              <li><a href="sign-up.html" data-bs-original-title="" title="">Sign Up</a></li>
                              <li><a href="sign-up-one.html" data-bs-original-title="" title="">SignUp with image</a></li>
                              <li><a href="sign-up-two.html" data-bs-original-title="" title="">SignUp with image</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 mega-box">
                          <div class="link-section dashed-links">
                            <div>
                              <h6>Usefull Pages</h6>
                            </div>
                            <ul>
                              <li><a href="search.html" data-bs-original-title="" title="">Search Website</a></li>
                              <li><a href="unlock.html" data-bs-original-title="" title="">Unlock User</a></li>
                              <li><a href="forget-password.html" data-bs-original-title="" title="">Forget Password</a></li>
                              <li><a href="reset-password.html" data-bs-original-title="" title="">Reset Password</a></li>
                              <li><a href="maintenance.html" data-bs-original-title="" title="">Maintenance</a></li>
                              <li><a href="login-sa-validation.html" data-bs-original-title="" title="">Login validation</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 mega-box">
                          <div class="link-section">
                            <div>
                              <h6>Email templates</h6>
                            </div>
                            <ul>
                              <li class="ps-0"><a href="basic-template.html" data-bs-original-title="" title="">Basic Email</a></li>
                              <li class="ps-0"><a href="email-header.html" data-bs-original-title="" title="">Basic With Header</a></li>
                              <li class="ps-0"><a href="template-email.html" data-bs-original-title="" title="">Ecomerce Template</a></li>
                              <li class="ps-0"><a href="template-email-2.html" data-bs-original-title="" title="">Email Template 2</a></li>
                              <li class="ps-0"><a href="ecommerce-templates.html" data-bs-original-title="" title="">Ecommerce Email</a></li>
                              <li class="ps-0"><a href="email-order-success.html" data-bs-original-title="" title="">Order Success</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 mega-box">
                          <div class="link-section">
                            <div>
                              <h6>Email templates</h6>
                            </div>
                            <ul>
                              <li class="ps-0"><a href="basic-template.html" data-bs-original-title="" title="">Basic Email</a></li>
                              <li class="ps-0"><a href="email-header.html" data-bs-original-title="" title="">Basic With Header</a></li>
                              <li class="ps-0"><a href="template-email.html" data-bs-original-title="" title="">Ecomerce Template</a></li>
                              <li class="ps-0"><a href="template-email-2.html" data-bs-original-title="" title="">Email Template 2</a></li>
                              <li class="ps-0"><a href="ecommerce-templates.html" data-bs-original-title="" title="">Ecommerce Email</a></li>
                              <li class="ps-0"><a href="email-order-success.html" data-bs-original-title="" title="">Order Success</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 mega-box">
                          <div class="link-section">
                            <div>
                              <h6>Email templates</h6>
                            </div>
                            <ul>
                              <li class="ps-0"><a href="basic-template.html" data-bs-original-title="" title="">Basic Email</a></li>
                              <li class="ps-0"><a href="email-header.html" data-bs-original-title="" title="">Basic With Header</a></li>
                              <li class="ps-0"><a href="template-email.html" data-bs-original-title="" title="">Ecomerce Template</a></li>
                              <li class="ps-0"><a href="template-email-2.html" data-bs-original-title="" title="">Email Template 2</a></li>
                              <li class="ps-0"><a href="ecommerce-templates.html" data-bs-original-title="" title="">Ecommerce Email</a></li>
                              <li class="ps-0"><a href="email-order-success.html" data-bs-original-title="" title="">Order Success</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 mega-box">
                          <div class="link-section">
                            <div>
                              <h6>Email templates</h6>
                            </div>
                            <ul>
                              <li class="ps-0"><a href="basic-template.html" data-bs-original-title="" title="">Basic Email</a></li>
                              <li class="ps-0"><a href="email-header.html" data-bs-original-title="" title="">Basic With Header</a></li>
                              <li class="ps-0"><a href="template-email.html" data-bs-original-title="" title="">Ecomerce Template</a></li>
                              <li class="ps-0"><a href="template-email-2.html" data-bs-original-title="" title="">Email Template 2</a></li>
                              <li class="ps-0"><a href="ecommerce-templates.html" data-bs-original-title="" title="">Ecommerce Email</a></li>
                              <li class="ps-0"><a href="email-order-success.html" data-bs-original-title="" title="">Order Success</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 mega-box">
                          <div class="link-section">
                            <div>
                              <h6>Email templates</h6>
                            </div>
                            <ul>
                              <li class="ps-0"><a href="basic-template.html" data-bs-original-title="" title="">Basic Email</a></li>
                              <li class="ps-0"><a href="email-header.html" data-bs-original-title="" title="">Basic With Header</a></li>
                              <li class="ps-0"><a href="template-email.html" data-bs-original-title="" title="">Ecomerce Template</a></li>
                              <li class="ps-0"><a href="template-email-2.html" data-bs-original-title="" title="">Email Template 2</a></li>
                              <li class="ps-0"><a href="ecommerce-templates.html" data-bs-original-title="" title="">Ecommerce Email</a></li>
                              <li class="ps-0"><a href="email-order-success.html" data-bs-original-title="" title="">Order Success</a></li>
                            </ul>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </li>
                
              </ul>
            </div>  --}}
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid product-wrapper">
      <div class="product-grid product-spacing">
        <div class="feature-products">
          <div class="row">
            <div class="col-md-6 products-total">
              <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#" data-original-title="" title=""><i data-feather="grid"></i></a></div>
              <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title=""><i data-feather="list"></i></a></div><span class="d-none-productlist filter-toggle">
                    Filters<span class="ms-2"><i class="toggle-data" data-feather="chevron-down"></i></span></span>
              <div class="grid-options d-inline-block">
                <ul>
                  <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-1 bg-primary"></span><span class="line-grid line-grid-2 bg-primary"></span></a></li>
                  <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-3 bg-primary"></span><span class="line-grid line-grid-4 bg-primary"></span><span class="line-grid line-grid-5 bg-primary"></span></a></li>
                  <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-6 bg-primary"></span><span class="line-grid line-grid-7 bg-primary"></span><span class="line-grid line-grid-8 bg-primary"></span><span class="line-grid line-grid-9 bg-primary"></span></a></li>
                  <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-10 bg-primary"></span><span class="line-grid line-grid-11 bg-primary"></span><span class="line-grid line-grid-12 bg-primary"></span><span class="line-grid line-grid-13 bg-primary"></span><span class="line-grid line-grid-14 bg-primary"></span><span class="line-grid line-grid-15 bg-primary"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 text-end"><span class="f-w-600 m-r-5 prod-result"></span>
              <div class="select2-drpdwn-product select-options d-inline-block">
                <select class="form-control btn-square" id="sortby" name="sort">
                  <option value="date_desc">Latest Products</option>
                  <option value="date_asc">Oldest Products</option>
                  <option value="price_asc">Lowest Prices</option>
                  <option value="price_desc">Highest Prices</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="product-sidebar">
                <div class="filter-section">
                  <div class="card">
                    <div class="card-header">
                      <h6 class="mb-0 f-w-600">Filters<span class="pull-right"><i class="fa fa-chevron-down toggle-data"></i></span></h6>
                    </div>
                    <div id="filter-scroll" class="left-filter">
                      <div class="card-body filter-cards-view animate-chk">
                        <div class="product-filter">
                          <h6 class="f-w-600">Category</h6>
                          <div class="checkbox-animated mt-0">

                            @foreach($cats as $cat)
                              <div class="cat "><a href="{{ route('product.index', [$cat->slug]) }}">{{ $cat->name }}</a></div>


                              @if ($cat->slug == $slug )
                                  
                              @foreach($cat->subcats as $sub)
                                <div class="p-l-15 subs"><i class="fa fa-angle-right"></i><a href="{{ route('product.index', [$cat->slug, $sub->slug ]) }}"> {{ $sub->name }} </a></div>

                                @if ($sub->slug == $slug1 )

                                  @foreach($sub->childs as $child)
                                    <div class="p-l-25 child"><i class="fa fa-angle-double-right"></i><a href="{{ route('product.index', [$cat->slug, $sub->slug, $child->slug ]) }}"> {{ $child->name }} </a></div>

                                  @endforeach
                                @endif

                              @endforeach
                              @endif
                            @endforeach

                          
                          </div>
                        </div>
                        <div class="product-filter">
                          <h6 class="f-w-600">Brand</h6>
                          <div class="checkbox-animated mt-0">
                            <label class="d-block" for="chk-ani">
                              <input class="checkbox_animated" id="chk-ani" type="checkbox" data-original-title="" title=""> Levi's
                            </label>
                            <label class="d-block" for="chk-ani1">
                              <input class="checkbox_animated" id="chk-ani1" type="checkbox" data-original-title="" title="">Diesel
                            </label>
                            <label class="d-block" for="chk-ani2">
                              <input class="checkbox_animated" id="chk-ani2" type="checkbox" data-original-title="" title="">Lee
                            </label>
                            <label class="d-block" for="chk-ani3">
                              <input class="checkbox_animated" id="chk-ani3" type="checkbox" data-original-title="" title="">Hudson
                            </label>
                            <label class="d-block" for="chk-ani4">
                              <input class="checkbox_animated" id="chk-ani4" type="checkbox" data-original-title="" title="">Denizen
                            </label>
                            <label class="d-block" for="chk-ani5">
                              <input class="checkbox_animated" id="chk-ani5" type="checkbox" data-original-title="" title="">Spykar
                            </label>
                          </div>
                        </div>
                        <div class="product-filter slider-product">
                          <h6 class="f-w-600">Colors</h6>
                          <div class="color-selector">
                            <ul>
                              <li class="white"></li>
                              <li class="gray"></li>
                              <li class="black"></li>
                              <li class="orange"></li>
                              <li class="green"></li>
                              <li class="pink"></li>
                              <li class="yellow"></li>
                              <li class="blue"></li>
                              <li class="red"></li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-filter pb-0">
                          <h6 class="f-w-600">Price</h6>
                          <input id="u-range-03" type="text">
                          <h6 class="f-w-600">New Products</h6>
                        </div>
                        <div class="product-filter pb-0 new-products">
                          <div class="owl-carousel owl-theme" id="testimonial">
                            <div class="item">
                              @foreach ($newProducts as $prod)
                                  
                              <div class="product-box row">
                                <div class="product-img col-md-5"><img class="img-fluid img-100" src="{{ asset('assets/uploads/products').'/'.$prod->image }}" alt="" data-original-title="" title=""></div>
                                <div class="product-details col-md-7 text-start">
                                  <span><i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-dark"></i>
                                  </span>
                                  <a href="{{ route('product.details', $prod->slug) }}"><p class="mb-0">{{mb_strlen($prod->name,'utf-8')
                                    > 35 ? mb_substr($prod->name ,0,35,'utf-8').'...' : $prod->name}}</p></a>
                                  <div class="product-price">{{ $prod->showPrice() }}</div>
                                </div>
                              </div>
                              @endforeach
                              
                            </div>
                            <div class="item">

                              @foreach ($newProducts2 as $prod)
                                  
                              <div class="product-box row">
                                <div class="product-img col-md-5"><img class="img-fluid img-100" src="{{ asset('assets/uploads/products').'/'.$prod->image }}" alt="" data-original-title="" title=""></div>
                                <div class="product-details col-md-7 text-start">
                                  <span><i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-warning me-1"></i>
                                    <i class="fa fa-star font-dark"></i>
                                  </span>
                                  <a href="{{ route('product.details', $prod->slug) }}"><p class="mb-0">{{mb_strlen($prod->name,'utf-8')
                                    > 35 ? mb_substr($prod->name ,0,35,'utf-8').'...' : $prod->name}}</p></a>
                                  <div class="product-price">{{ $prod->showPrice() }}</div>
                                </div>
                              </div>
                              @endforeach

                              
                            </div>
                          </div>
                        </div>
                        {{-- <div class="product-filter text-center"><img class="img-fluid banner-product" src="{{ asset('assets/images/ecommerce/banner.jpg') }}" alt="" data-original-title="" title=""></div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="form-group m-0">
                  <input class="form-control" id="prod_name" name="search" type="search" placeholder="Search.." value="{{ request()->input('search') }}" autocomplete="off"><i class="fa fa-search"></i>
                  <div class="autocomplete">
                    <div id="myInputautocomplete-list" class="autocomplete-items">
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="product-wrapper-grid">
          <div class="row" id="product-list">
           
           
          </div>
          
          
        </ul>
        <div class="d-flex justify-content-center m-b-30">

          {{-- @if($data['prods']['next_page_url']) --}}
          <button id="load-more" class="btn btn-info text-white" > <strong>Load More</strong></button>
          {{-- @endif --}}

        </div>
      </div>
        </div>
    </div>
  
  </div>
   

@endsection

@section('script')
<script src="{{ asset('assets/js/range-slider/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/js/range-slider/rangeslider-script.js') }}"></script>
<script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script src="{{ asset('assets/js/product-tab.js') }}"></script>
    
    
<script type="text/javascript">



$(document).ready(function () {

    

    let data = {!! json_encode($data) !!};
    let prods= data.prods;
    let content ='';
    let loadMore = prods.next_page_url;
    // console.log(prods);

    const loopProds = ()=>{

        prods.data.map(item => {
          let sizes = '';
          if(item['size']){

            item['size'].map(item => {
              sizes +=`
              <li> 
                <button class="btn btn-outline-light" data-size='${item}' type="button" data-bs-original-title="" title="">${item}</button>
              </li>`
            });
          }

        //  /

          let star = '4';


            content +=`
            <div class="col-xl-3 col-sm-6 xl-4">
                    <div class="card">
                    <div class="product-box">
                        <div class="product-img"><img class="img-fluid" src="{{ asset('assets/uploads/products') }}/${item.image}" alt="">
                        <div class="product-hover">
                            <ul>
                            <li>
                                <button class="btn addcart" id="${item.id}"" data-href="{{URL::to('/addcart')}}/${item.id}" type="button"><i class="icofont icofont-shopping-cart"></i></button>
                            </li>
                            <li>
                                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter-${item.id}"><i class="icofont icofont-eye"></i></button>
                            </li>
                            <li>
                                <button class="btn" type="button"><i class="icofont icofont-food-cart"></i></button>
                            </li>
                            </ul>
                        </div>
                        </div>
                        <div class="modal fade" id="exampleModalCenter-${item.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter-${item.id}" aria-hidden="true">
                              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <div class="product-box row">
                                      <div class="product-img col-lg-6"><img class="img-fluid" src="{{ asset('assets/uploads/products') }}/${item.image}" alt=""></div>
                                      <div class="product-details col-lg-6 text-start">
                                        <div class="d-flex justify-content-between mr-5">
                                          <h4>${item.name}</h4>
                                          <i class="icofont icofont-heart addwish wishcart ${ (item['is_wish'] > 0) ? 'font-info' : ''} " data-href="{{URL::to('/wishlist/add')}}/${item.id}" ></i>
                                        </div>
                                        <div class="product-price">${item.showprice}
                                          <del>${item.showprevprice}    </del>
                                        </div>
                                        <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                        </div>
                                        <div class="product-size">
                                          <ul>
                                            ${sizes}
                                          </ul>
                                        </div>
                                        <div class="product-qnty">
                                            
                                            <div class="addcart-btn">
                                                <button id="${item.id}" data-href="{{URL::to('/addtocart')}}/${item.id}" class="btn btn-info addtocart" type="button">Add to Cart</button>
                                                <a href="{{URL::to('/item')}}/${item.slug}" class="btn btn-info" type="button">View Details</a>
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
                                <i class="fa ${ (item['rating'] >= 1) ? ' fa-star' : 'fa-star-o'}"></i>
                                <i class="fa ${ (item['rating'] >= 2) ? ' fa-star' : 'fa-star-o'}"></i>
                                <i class="fa ${ (item['rating'] >= 3) ? ' fa-star' : 'fa-star-o'}"></i>
                                <i class="fa ${ (item['rating'] >= 4) ? ' fa-star' : 'fa-star-o'}"></i>
                                <i class="fa ${ (item['rating'] >= 5) ? ' fa-star' : 'fa-star-o'}"></i>
                              </div>
                        <a href="{{URL::to('/item')}}/${item.slug}"><h4>${ item.name.length > 25 ? item.name.substring(0,24) + "..." : item.name}</h4></a>
                        
                        <div class="product-price">${item.showprice}
                            <del>${item.showprevprice}    </del>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            ` ;
        
        });
    }
    loopProds();

    $('.prod-result').html(`Showing Products 1 - ${prods.to} Of ${prods.total} Results`);
    $('#product-list').html(content);
    
    if (!loadMore) {
        $('#load-more').hide()
      }else{
      $('#load-more').show()

    }
    


        $('#load-more').on('click', ()=>{
          
          $.ajax({

                type: 'get',
                url: loadMore,
                
                success: function (data) {
                  prods= data.prods;
                  loadMore = prods.next_page_url;

                  if (!loadMore) {
                      $('#load-more').hide()
                    }else{
                    $('#load-more').show()

                  }

                  loopProds();
                  $('.prod-result').html(`Showing Products 1 - ${prods.to} Of ${prods.total} Results`);
                    $('#product-list').html(content);
                },
                error: function (err){
                    console.log(err);
                }
        
            });
            // return false;
        });
        
                  // when dynamic attribute changes
              $(".attribute-input, #sortby").on('change', function() {
                
                filter();
              });
        
              val='';
              $(".irs-from").on('click', function() {
                if(val == ''){
                    
                    val= $('.irs-from').html()
                    filter();
                    // console.log(val);
                }else{
                  if (!(val == $('.irs-from').html())) {
                    
                    val= $('.irs-from').html()
                    filter();
                    // console.log(val);
                  }
        
                }
              });
        
        
              $(".irs-to").on('click', function() {
                if(val == ''){
                    
                    val= $('.irs-to').html()
                    filter();
                    // console.log(val);
                }else{
                  if (!(val == $('.irs-to').html())) {
                    
                    val= $('.irs-to').html()
                    filter();
                    // console.log(val);
                  }
        
                }
              });
        
        
        
        
              // when price changed & clicked in search button
              $("#prod_name").on('keyup', function(e) {
                e.preventDefault();
                if (e.key == 'Enter') {
                  filter();
                }
              });
        
              
                    
        
        
              function filter() {
                  let filterlink = '';
                  content ='';
                
                  $('#product-list').html('');

                  if ($("#prod_name").val() != '') {
                    if (filterlink == '') {
                      filterlink += '{{route('product.index', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?search='+$("#prod_name").val();
                    } else {
                      filterlink += '&search='+$("#prod_name").val();
                    }
                  }
          
                  $(".attribute-input").each(function() {
                    if ($(this).is(':checked')) {
                      if (filterlink == '') {
                        filterlink += '{{route('product.index', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+$(this).attr('name')+'='+$(this).val();
                      } else {
                        filterlink += '&'+$(this).attr('name')+'='+$(this).val();
                      }
                    }
                  });
          
                  if ($("#sortby").val() != '') {
                    if (filterlink == '') {
                      filterlink += '{{route('product.index', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+$("#sortby").attr('name')+'='+$("#sortby").val();
                    } else {
                      filterlink += '&'+$("#sortby").attr('name')+'='+$("#sortby").val();
                    }
                  }
          
                  if ($('.irs-from').html() != '') {
                    if (filterlink == '') {
                      filterlink += '{{route('product.index', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+'min'+'='+$('.irs-from').html();
                    } else {
                      filterlink += '&'+'min'+'='+$('.irs-from').html();
                    }
                  }
          
                  // if ($('.irs-to').html() != '') {
                  //   if (filterlink == '') {
                  //     filterlink += '{{route('product.index', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+'max'+'='+$('.irs-to').html();
                  //   } else {
                  //     filterlink += '&'+'max'+'='+$('.irs-to').html();
                  //   }
                  // }
          
                  // console.log(encodeURI(filterlink));
                 
                      $.ajax({
          
                            type: 'get',
                            url: encodeURI(filterlink),
          
                            success: function (data) {
                              // console.log(data);
          
                              prods= data.prods;
                              loadMore = prods.next_page_url;

          
                              if (!loadMore) {
                                  $('#load-more').hide()
                                }else{
                                $('#load-more').show()

                              }
                              
          
                              
                              loopProds(); 
                                $('.prod-result').html(`Showing Products 1 - ${prods.to} Of ${prods.total} Results`);
                                $('#product-list').html(content);
                            },
                            error: function (err){
                                console.log(err);
                            }
          
                            });
          
          
            }
        
        
            });
        
        


   
  
</script>
@endsection