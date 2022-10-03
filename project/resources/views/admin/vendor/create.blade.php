@extends('layouts.admin')
@php
    $gs = App\Models\Generalsetting::findOrFail(1);
@endphp
@section('content')

						<div class="content-area">
							<div class="mr-breadcrumb">
								<div class="row">
									<div class="col-lg-12">
											<h4 class="heading">{{ __("Edit Vendor") }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("Back") }}</a></h4>
											<ul class="links">
												<li>
													<a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
												</li>
												<li>
													<a href="{{ route('admin-vendor-index') }}">{{ __("Vendors") }}</a>
												</li>
												<li>
													<a href="{{ route('admin-vendor-create') }}">{{ __("Create") }}</a>
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
												@include('includes.admin.form-both') 

											<form id="geniusform" action="{{ route('admin-vendor-create') }}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Vendor Name") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="text" class="input-field" name="firstname" placeholder="{{ __("First Name") }}"  >
														<input type="text" class="input-field" name="lastname" placeholder="{{ __("Last Name") }}"  >
														<input type="hidden" class="input-field" name="is_vendor"  value="1" >
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Vendor Email") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="email" class="input-field" name="email" placeholder="{{ __("Vendor Email Address") }}" >
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Vendor Username") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="username" placeholder="{{ __("Vendor Username") }}" >
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Vendor Password") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="password" placeholder="{{ __("Vendor Password") }}" value="" >
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Name") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="shopName" placeholder="{{ __("Shop Name") }}" required="" >
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Category") }} </h4>
														</div>
													</div>
													<div class="col-lg-7">
														@php
															$cats = App\Models\ShopCategory::all();	
														@endphp

														<select name="category_id" class="form-control" >
															
															<option value=" ">Choose...</option>
															
															@foreach ($cats as $cat)
																
															<option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
															@endforeach
															
														</select>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
													  <div class="left-area">
														  <h4 class="heading">{{ __('Shop Avatar Image') }} *</h4>
													  </div>
													</div>
													<div class="col-lg-7">
													  <div class="img-upload">
														  <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
															  <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
															  <input type="file" name="avatarInput" class="img-upload" value="" id="image-upload">
															</div>
													  </div>
						  
													</div>
												  </div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Description") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
													<textarea class="nic-edit" name="description" placeholder="{{ __("Shop Description") }}"></textarea> 
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Major & Minor Products") }} </h4>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="text" class="input-field" name="majorProduct" placeholder="{{ __("Major Product") }}" value="" >
														<input type="text" class="input-field" name="minorProduct" placeholder="{{ __("Major Product") }}" value="" >
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Target Customer") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="targetCustomer" placeholder="{{ __("Target Customer") }}" value="" >
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Business Type") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="businessType" placeholder="{{ __("Business Type") }}" value="" >
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Founder Name") }} *</h4>
																<p class="sub-heading">{{ __("( And Year Founded)") }}</p>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="text" class="input-field" name="founder" placeholder="{{ __("Founder Name") }}" required="" value="">
														<input type="number" class="input-field" name="yearFounded" placeholder="{{ __("Year Founded") }}" required="" value="">

													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Number Of Branch") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="number" class="input-field" name="numberOfBranch" placeholder="{{ __("Number Of Branch") }}" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop location") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="location" placeholder="{{ __("Shop location") }}" required="" value="">
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Contact Email") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="text" class="input-field" name="contactEmail" placeholder="{{ __("Contact Email") }}" required="" value="">
														<input type="phone" class="input-field" name="contactNo" placeholder="{{ __("Contact No") }}" required="" value="">
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Website") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="url" class="input-field" name="websiteLink" placeholder="{{ __("Website Link") }}" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Shop Contact Socials") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="url" class="input-field" name="facebookLink" placeholder="{{ __("Facebook Link") }}" required="" value="">
														<input type="url" class="input-field" name="twitterLink" placeholder="{{ __("Twitter Link") }}" required="" value="">
														<input type="url" class="input-field" name="linkedinLink" placeholder="{{ __("Linkedin Link") }}" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Hours of Operation") }} </h4>
														</div>
													</div>
													<div class="col-lg-7">
														<select name="timeOfOperation" class="form-control" >
													
															<option value=" ">Choose...</option>
															<option value="Weekly">Weekly</option>
															
															
														</select>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Open & Close Time") }} </h4>
														</div>
													</div>
													<div class="col-lg-7 d-flex">
														<input type="time" class="form-control" name="startTime" placeholder="Open Time" value="">
														<input type="time" class="form-control" name="closeTime" placeholder="Close Time" value="">

													</div>
												</div>


												

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                              
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit">{{ __("Submit") }}</button>
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