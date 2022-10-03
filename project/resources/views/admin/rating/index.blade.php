@extends('layouts.admin') 

@php
    $gs = App\Models\Generalsetting::findOrFail(1);
@endphp
@section('content')  
					<input type="hidden" id="headerdata" value="{{ __('REVIEW') }}">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">{{ __('Reviews') }}</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
											</li>
											<li>
												<a href="javascript:;">{{ __('Product Ratings') }} </a>
											</li>
											<li>
												<a href="{{ route('admin-rating-index') }}">{{ __('Reviews') }}</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">
										<div class="d-flex">

											@include('includes.admin.form-success') 
											
										</div>

										<div class="table-responsiv">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
									                        <th width="20%">{{ __('Product') }}</th>
									                        <th>{{ __('Reviewer') }}</th>
									                        <th>{{ __('Rating') }}</th>
									                        <th width="30%">{{ __('Review') }}</th>
									                        <th>{{ __('Options') }}</th>
									                        
														</tr>
													</thead>
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

{{-- ADD / EDIT MODAL --}}

				<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
										
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
												{{-- <div class="submit-loader">
														<img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
												</div> --}}
											<div class="modal-header">
											<h5 class="modal-title"></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">

											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
											</div>
						</div>
					</div>

				</div>

{{-- ADD / EDIT MODAL ENDS --}}
{{-- ADD / EDIT MODAL --}}

				<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
										
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
												<div class="submit-loader">
														<img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
												</div>
											<div class="modal-header">
											<h5 class="modal-title">Add New Rating</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
												<div class="content-area no-padding">
													<div class="add-product-content1">
														<div class="row">
															<div class="col-lg-12">
																<div class="product-description">
																	<div class="body-area">
																		<div class="row">
																			<div class="col-lg-12">
																				<form action="{{ route('admin-rating-create') }}" method="post">
																					@csrf
																				<div class="table-responsive show-table">
																					<table class="table">
																						<tr>
																							<th>Product SKU*</th>
																							<td><input class="form-control" type="text" name="sku"></td>
																						</tr>
																						<tr>
																							<th>Rating*:</th>
																							{{-- <td><input class="form-control" type="number" name="rating"></td> --}}
																							<td>
																								<select name="rating" id="">
																									<option value="">Select Rating</option>
																									<option value="1">1 Star</option>
																									<option value="2">2 Star</option>
																									<option value="3">3 Star</option>
																									<option value="4">4 Star</option>
																									<option value="5">5 Star</option>
																								</select>
																							</td>
																						</tr>
																					   
																						
																						<tr>
																							<th>{{ __('Reviewed at') }}:</th>
																							<td><input class="form-control" type="date" name="review_date"></td>
																						</tr>
																						<tr>
																							<th></th>
																							<td><button type="submit" class="btn btn-secondary"> Create </button></td>
																						</tr>
																					</table>
																				</div>
																				
																				</form>

																			</div>
																			
																		</div>
															
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
											</div>
						</div>
					</div>

				</div>

{{-- ADD / EDIT MODAL ENDS --}}


{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header text-center">
        <h4 class="modal-title w-100">{{ __('Confirm Delete') }}</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">{{ __('You are about to delete this Review.') }}</p>
            <p class="text-center">{{ __('Do you want to proceed?') }}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
            <a class="btn btn-danger btn-ok">{{ __('Delete') }}</a>
      </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}

@endsection    



@section('scripts')

{{-- DATA TABLE --}}


    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-rating-datatables') }}',
               columns: [
                        { data: 'product', name: 'product', searchable: false, orderable: false },
                        { data: 'reviewer', name: 'reviewer' },
                        { data: 'rating', name: 'rating' },
                        { data: 'review', name: 'review' },
            			{ data: 'action', searchable: false, orderable: false }

                     ],
               language : {
                	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                }
            });	
			
			$(function() {
        $(".btn-area").append('<div class="col-sm-4 table-contents">'+
          '<a class="add-btn" data-href="{{route('admin-shipping-create')}}" id="add-data" data-toggle="modal" data-target="#modal2">'+
          '<i class="fas fa-plus"></i> {{ __('Add New Rating') }}'+
          '</a>'+
          '</div>');

		
      }); 
									
    </script>

{{-- DATA TABLE --}}

@endsection   