@extends('layouts.vendor') 

@section('content')  
                    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">All Orders</h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('vendor-dashboard') }}">Dashbord  </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Orders</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('vendor-order-index') }}">All Orders</a>
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
                                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                                                <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Number</th>
                                                            <th>Total Qty</th>
                                                            <th>Total Cost</th>
                                                            <th>Payment Method</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>


                                              <tbody>
                                                @foreach($orders as $orderr) 
                                                @php 
                                                $qty = $orderr->sum('qty');
                                                $price = $orderr->sum('price');                                       
                                                @endphp
                    @foreach($orderr as $order)
                    
                    @php 


// dd($order->order->order_number);
//    $ordrtx =App\Models\Order::where('order_number','=',$order->order->order_number)->first();
//   if($ordrtx  != 0){
//       $price  += ($price / 100) * $ordrtx;
//     }    

@endphp

<tr>
                                                    <td> <a href="{{route('vendor-order-invoice',$order->order_number)}}">{{ $order->order->order_number}}</a></td>
                                          <td>{{$qty}}</td>
                                      <td> {{ App\Models\Product::convertPrice($price) }}</td>
                                      <td>{{$order->order->method}}</td>
                                      <td>

                                        <div class="action-list">

                                        <a href="{{route('vendor-order-show',$order->order->order_number)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> Details</a>
                                            <select class="vendor-btn {{ $order->status }}">
                                            <option value="{{ route('vendor-order-status',[ $slug = $order->order->order_number, $status = 'pending']) }}" {{  $order->status == "pending" ? 'selected' : ''  }}>Pending</option>
                                            <option value="{{ route('vendor-order-status',[ $slug = $order->order->order_number, $status = 'processing']) }}" {{  $order->status == "processing" ? 'selected' : ''  }}>Processing</option>
                                            <option value="{{ route('vendor-order-status',[ $slug = $order->order->order_number, $status = 'completed']) }}" {{  $order->status == "completed" ? 'selected' : ''  }}>Completed</option>
                                            <option value="{{ route('vendor-order-status',[ $slug = $order->order->order_number, $status = 'declined']) }}" {{  $order->status == "declined" ? 'selected' : ''  }}>Declined</option>
                                            </select>
                                            

                                        </div>

                                        </td>

                                                  </tr>

                                                  @break
                    @endforeach

                                                  @endforeach
                                                  </tbody>
                                                    
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

{{-- ORDER MODAL --}}

<div class="modal fade" id="confirm-delete2" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="submit-loader">
        <img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
    </div>
    <div class="modal-header d-block text-center">
        <h4 class="modal-title d-inline-block">Update Status</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p class="text-center">You are about to update the Order's Status.</p>
        <p class="text-center">Do you want to proceed?</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a class="btn btn-success btn-ok order-btn">Proceed</a>
      </div>

    </div>
  </div>
</div>

{{-- ORDER MODAL ENDS --}}


@endsection    

@section('scripts')

{{-- DATA TABLE --}}

    <script type="text/javascript">


$('.vendor-btn').on('change',function(){
          $('#confirm-delete2').modal('show');
          $('#confirm-delete2').find('.btn-ok').attr('href', $(this).val());

});

        var table = $('#geniustable').DataTable({
               ordering: false
           });
                                                                
    </script>

{{-- DATA TABLE --}}
    
@endsection   