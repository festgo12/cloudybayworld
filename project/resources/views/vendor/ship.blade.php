@extends('layouts.vendor')
@section('content')

						<div class="content-area">
							<div class="mr-breadcrumb">
								<div class="row">
									<div class="col-lg-12">
											<h4 class="heading">Shipping Cost</h4>

										<ul class="links">
											<li>
												<a href="{{ route('vendor-dashboard') }}">Dashbord</a>
											</li>
											<li>
												<a href="javascript:;">Settings </a>
											</li>
											<li>
												<a href="{{ route('vendor-shop-ship') }}">Shipping Cost</a>
											</li>
										</ul>



									</div>
								</div>
							</div>
							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">

				                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
											<form id="geniusform" action="{{ route('vendor-profile-update') }}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

                      						 @include('includes.vendor.form-both')  


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Shipping Cost</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="number" min="0" class="input-field" name="shipping_cost" placeholder="Shipping Cost" required="" value="{{$data->shipping_cost}}">
													</div>
												</div>



						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                              
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit">Save</button>
						                          </div>
						                        </div>

											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection