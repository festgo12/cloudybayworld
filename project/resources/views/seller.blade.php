@extends('layouts.app')

@section('title')
Home
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
              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Become a Seller</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"> 
              <h5>Become a Vendor</h5>
            </div>
            <div class="card-body row pricing-block">
              <div class="col-lg-3 col-md-6">
                <div class="pricingtable">
                  <div class="pricingtable-header">
                    <h3 class="title">CloudBay Shop</h3>
                  </div>
                  <div class="price-value"><span class="currency">₦</span><span class="amount">0</span><span class="duration">/mo</span></div>
                  <ul class="pricing-content">
                    <li>Create a New Shop</li>
                    <li>Upload Product</li>
                    <li>Manage Shop</li>
                    <li>CloudBay Support</li>
                  </ul>
                  <div class="pricingtable-signup"><a class="btn btn-primary  btn-lg" href="{{ route('createShop') }}">Get Started</a></div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

@endsection