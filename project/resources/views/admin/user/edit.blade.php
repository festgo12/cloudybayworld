@extends('layouts.load')
@section('content')

						<div class="content-area">
							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">
                        					@include('includes.admin.form-error') 
											<form id="geniusformdata" action="{{ route('admin-user-edit',$data->id) }}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading">{{ __("Customer Profile Image") }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <div class="img-upload">
						                            	{{-- @if($data->is_provider == 1)
						                                <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset($data->photo):asset('assets/images/noimage.png') }});">
						                            	@else --}}
						                                <div id="image-preview" class="img-preview" style="background: url({{ $data->avatar ? asset('assets/uploads/avatar/'.$data->avatar):asset('assets/uploads/avatar/avatar.png') }});">
						                                {{-- @endif --}}
						                                {{-- @if($data->is_provider != 1) --}}
						                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __("Upload Image") }}</label>
						                                    <input type="file" name="photo" class="img-upload" id="image-upload">
						                                {{-- @endif --}}
						                                  </div>
						                                  <p class="text">{{ __("Prefered Size: (600x600) or Square Sized Image") }}</p>
						                            </div>
						                          </div>
						                        </div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("First Name") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="firstname" placeholder="{{ __("First Name") }}" required="" value="{{ $data->firstname }}">
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Last Name") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="lastname" placeholder="{{ __("Last Name") }}" required="" value="{{ $data->lastname }}">
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("User Name") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="username" placeholder="{{ __("User Name") }}" required="" value="{{ $data->username }}">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Email") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="email" class="input-field" name="email" placeholder="{{ __("Email Address") }}" value="{{ $data->email }}" disabled="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Phone") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="contactNo" placeholder="{{ __("Phone Number") }}" required="" value="{{ $data->contactNo }}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Address") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="homeAddress" placeholder="{{ __("Address") }}" required="" value="{{ $data->homeAddress }}">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("City") }} </h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="city" placeholder="{{ __("City") }}" value="{{ $data->city }}">
													</div>
												</div>



												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Postal Code") }} </h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="zipCode" placeholder="{{ __("Postal Code") }}" value="{{ $data->zipCode }}">
													</div>
												</div>

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                              
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit">{{ __("Save") }}</button>
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