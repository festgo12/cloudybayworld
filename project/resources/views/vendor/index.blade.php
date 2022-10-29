@extends('layouts.vendor') 

@section('content')
                    <div class="content-area">

                            

                        
                        @include('includes.admin.form-success')
                        <div class="row row-cards-one">

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg1">
                                        <div class="left">
                                            <h5 class="title">{{ __('Orders Pending!') }} </h5>
                                            <span class="number">{{ count($pending) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">{{ __('View All') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-dollar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg2">
                                        <div class="left">
                                            <h5 class="title">{{ __('Orders Processing!') }}</h5>
                                            <span class="number">{{ count($processing) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">{{ __('View All') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-truck-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg3">
                                        <div class="left">
                                            <h5 class="title">{{ __('Orders Complete!') }}</h5>
                                            <span class="number">{{ count($completed) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">{{ __('View All') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-check-circled"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg4">
                                        <div class="left">
                                            <h5 class="title">{{ __('Total Product!') }}</h5>
                                            <span class="number">{{ count($user->products) }}</span>
                                            <a href="{{route('vendor-prod-index')}}" class="link">{{ __('View All') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-cart-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>  


                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg5">
                                        <div class="left">
                                            <h5 class="title">{{ __('Total Item Sold!') }}</h5>
                                            <span class="number">{{ App\Models\VendorOrder::where('user_id','=',$user->id)->where('status','=','completed')->sum('qty') }}</span>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-shopify"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg6">
                                        <div class="left">
                                            <h5 class="title">{{ __('Total Earnings!') }}</h5>
                                            <span class="number">{{ App\Models\Product::vendorConvertPrice( App\Models\VendorOrder::where('user_id','=',$user->id)->where('status','=','completed')->sum('price') ) }}</span>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                               <i class="icofont-dollar-true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                    </div>

@endsection
