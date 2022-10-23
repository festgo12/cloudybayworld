@extends('layouts.vendor') 

@section('content')

					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
									<h4 >My Withdraws</h4>
										<ul class="links">
											<li>
												<a href="{{ route('vendor-dashboard') }}">Dashbord </a>
											</li>
											<li>
												<a href="{{ route('vendor-wt-index') }}">My Withdraws</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">
										@include('includes.admin.form-success') 
										<div class="table-responsiv">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
						                                <th>Withdraw Date</th>
						                                <th>Method</th>
						                                <th>Account</th>
						                                <th>Amount</th>
						                                <th>Status</th>
														</tr>
													</thead>

												<tbody>
                            @foreach($withdraws as $withdraw)
                                <tr>
                                    <td>{{date('d-M-Y',strtotime($withdraw->created_at))}}</td>
                                    <td>{{$withdraw->method}}</td>
                                    @if($withdraw->method != "Bank")
                                        <td>{{$withdraw->acc_email}}</td>
                                    @else
                                        <td>{{$withdraw->iban}}</td>
                                    @endif
                                    <td>{{$sign->sign}}{{ round($withdraw->amount * $sign->value , 2) }}</td>
                                    <td>{{ucfirst($withdraw->status)}}</td>
                                </tr>
                            @endforeach
												</tbody>
													
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

@endsection    



@section('scripts')

{{-- DATA TABLE --}}


    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			ordering:false
		});

      	$(function() {
        $(".btn-area").append('<div class="col-sm-4 text-right">'+
        	'<a class="add-btn" href="{{route('vendor-wt-create')}}">'+
          '<i class="fas fa-plus"></i> Withdraw Now'+
          '</a>'+
          '</div>');
      });												
									
    </script>

{{-- DATA TABLE --}}
    
@endsection   