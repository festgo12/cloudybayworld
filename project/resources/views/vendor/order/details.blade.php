@extends('layouts.vendor')
     
@section('styles')


@endsection


@section('content')
    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">Order Details <a class="add-btn" href="{{ route('vendor-order-index') }}"><i class="fas fa-arrow-left"></i> Back</a></h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('vendor-dashboard') }}">Dashbord </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">All Orders</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Order Details</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>

                        <div class="order-table-wrap">
                            @include('includes.admin.form-both')
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="special-box">
                                        <div class="heading-area">
                                            <h4 class="title">
                                                Order Details
                                            </h4>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th class="45%" width="45%">Order ID</th>
                                                    <td width="10%">:</td>
                                                    <td class="45%" width="45%">{{$order->order_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="45%">Total Product</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{$order->vendororders()->where('user_id','=',$user->id)->sum('qty')}}</td>
                                                </tr>

                                                @if(Auth::user()->id == $order->vendor_shipping_id)
                                                @if($order->shipping_cost != 0)
                                                @php 
                                                $price = round(($order->shipping_cost / $order->currency_value),2);
                                                @endphp
                                                @if(DB::table('shippings')->where('price','=',$price)->count() > 0)
                                                <tr>
                                                    <th width="45%">{{ DB::table('shippings')->where('price','=',$price)->first()->title }}</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{ $order->currency_sign }}{{ round($order->shipping_cost, 2) }}</td>
                                                </tr>
                                                @endif
                                                @endif
                                                @endif
                                                
                                                @if(Auth::user()->id == $order->vendor_packing_id)
                                                @if($order->packing_cost != 0)
                                                @php 
                                                $pprice = round(($order->packing_cost / $order->currency_value),2);
                                                @endphp
                                                @if(DB::table('packages')->where('price','=',$pprice)->count() > 0)
                                                <tr>
                                                    <th width="45%">{{ DB::table('packages')->where('price','=',$pprice)->first()->title }}</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{ $order->currency_sign }}{{ round($order->packing_cost, 2) }}</td>
                                                </tr>
                                                @endif
                                                @endif
                                                @endif

                                                <tr>
                                                    <th width="45%">Total Cost</th>
                                                    <td width="10%">:</td>

                                                        @php 

                                                        $price = round($order->vendororders()->where('user_id','=',$user->id)->sum('price'),2);

                                                        if($user->shipping_cost != 0){
                                                            $price = $price  + round($user->shipping_cost * $order->currency_value , 2);
                                                            }

                                                        if($order->tax != 0){
                                                            $tax = ($price / 100) * $order->tax;
                                                            $price  += $tax;
                                                            }   

                                                        @endphp

                                                    <td width="45%">{{$order->currency_sign}}{{ round($price * $order->currency_value , 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <th width="45%">Ordered Date</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                                                </tr>


                                                <tr>
                                                    <th width="45%">Payment Method</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{$order->method}}</td>
                                                </tr>
                
                                                @if($order->method != "Cash On Delivery")
                                                @if($order->method=="Stripe")
                                                <tr>
                                                    <th width="45%">{{$order->method}} Charge ID</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{$order->charge_id}}</td>
                                                </tr>                        
                                                @endif
                                                <tr>
                                                    <th width="45%">{{$order->method}} Transaction ID</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{$order->txnid}}</td>
                                                </tr>                         
                                                @endif

                                                <tr>
                                                    <th width="45%">Payment Status</th>
                                                    <th width="10%">:</th>
                                                    <td width="45%">{!! $order->payment_status == 'Pending' ? "<span class='badge badge-danger'>". 'Unpaid' ."</span>":"<span class='badge badge-success'>". 'Paid' ."</span>" !!}</td>
                                                </tr>   
                                                @if(!empty($order->order_note))
                                                <tr>
                                                    <th width="45%">Order Note</th>
                                                    <th width="10%">:</th>
                                                    <td width="45%">{{$order->order_note}}</td>
                                                </tr> 
                                                @endif
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="footer-area">
                                            <a href="{{ route('vendor-order-invoice',$order->order_number) }}" class="mybtn1"><i class="fas fa-eye"></i> View Invoice</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="special-box">
                                        <div class="heading-area">
                                            <h4 class="title">
                                                Billing Details
                                            </h4>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <tbody>
                                                        <tr>
                                                            <th width="45%">Customer Name</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Email</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Phone</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Address</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Country</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_country}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">City</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">Postal Code</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->customer_zip}}</td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                @if($order->dp == 0)
                                <div class="col-lg-6">
                                    <div class="special-box">
                                        <div class="heading-area">
                                            <h4 class="title">
                                                Shipping Details
                                            </h4>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <tbody>
                            @if($order->shipping == "pickup")
                        <tr>
                                    <th width="45%"><strong>Pickup Location:</strong></th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$order->pickup_location}}</td>
                                </tr>
                            @else
                                <tr>
                                    <th width="45%"><strong>Customer Name:</strong></th>
                                    <th width="10%">:</th>
                <td>{{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Email:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_email == null ? $order->customer_email : $order->shipping_email}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Phone:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Address:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Country:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_country == null ? $order->customer_country : $order->shipping_country}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>City:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}</td>
                                </tr>
                                <tr>
                                    <th width="45%"><strong>Postal Code:</strong></th>
                                    <th width="10%">:</th>
                <td width="45%">{{$order->shipping_zip == null ? $order->customer_zip : $order->shipping_zip}}</td>
                                </tr>
                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>



                            <div class="row">
                                    <div class="col-lg-12 order-details-table">
                                        <div class="mr-table">
                                            <h4 class="title">Products Ordered</h4>
                                            <div class="table-responsiv">
                                                    <table id="example2" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                <tr>
                                    <th>Product ID#</th>
                                    <th>Shop Name</th>
                                    <th>Status</th>
                                    <th>Product Title</th>
                                    <th>Details</th>
                                    <th>Total Price</th>
                                </tr>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                @foreach($cart->items as $key => $product)

                                @if($product['item']['user_id'] != 0)
                                    @if($product['item']['user_id'] == $user->id)
                                    <tr>
                                        
                                            <td><input type="hidden" value="{{$key}}">{{ $product['item']['id'] }}</td>

                                            <td>
                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\Models\User::find($product['item']['user_id']);
                                                @endphp
                                                @if(isset($user))
                                                <a target="_blank" href="{{route('admin-vendor-show',$user->id)}}">{{$user->shop_name}}</a>
                                                @else
                                                Vendor Removed
                                                @endif
                                                @endif

                                            </td>
                                            <td>
                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\Models\VendorOrder::where('order_id','=',$order->id)->where('user_id','=',$product['item']['user_id'])->first();
                                                @endphp

                                                    @if($order->dp == 1 && $order->payment_status == 'Completed')

                                                   <span class="badge badge-success">Completed</span>

                                                    @else

                                                        @if($user->status == 'pending')
                                                        <span class="badge badge-warning">{{ucwords($user->status)}}</span>
                                                        @elseif($user->status == 'processing')
                                                        <span class="badge badge-info">{{ucwords($user->status)}}</span>
                                                       @elseif($user->status == 'on delivery')
                                                        <span class="badge badge-primary">{{ucwords($user->status)}}</span>
                                                       @elseif($user->status == 'completed')
                                                        <span class="badge badge-success">{{ucwords($user->status)}}</span>
                                                       @elseif($user->status == 'declined')
                                                        <span class="badge badge-danger">{{ucwords($user->status)}}</span>
                                                       @endif

                                                    @endif

                                            @endif
                                            </td>



                                            <td>
                                                <input type="hidden" value="{{ $product['license'] }}">

                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\Models\User::find($product['item']['user_id']);
                                                @endphp
                                                @if(isset($user))
                                              <a target="_blank" href="{{ route('product.details', $product['item']['slug']) }}">{{mb_strlen($product['item']['name'],'utf-8') > 30 ? mb_substr($product['item']['name'],0,30,'utf-8').'...' : $product['item']['name']}}</a>
                                                @else
                                                <a href="javascript:;">{{mb_strlen($product['item']['name'],'utf-8') > 30 ? mb_substr($product['item']['name'],0,30,'utf-8').'...' : $product['item']['name']}}</a>
                                                @endif
                                                @endif


                                                @if($product['license'] != '')
                              <a href="javascript:;" data-toggle="modal" data-target="#confirm-delete" class="btn btn-info product-btn" id="license" style="padding: 5px 12px;"><i class="fa fa-eye"></i> View License</a>
                                                @endif

                                            </td>
                                            <td>
                                                @if($product['size'])
                                               <p>
                                                    <strong>Size :</strong> {{str_replace('-',' ',$product['size'])}}
                                               </p>
                                               @endif
                                               @if($product['color'])
                                                <p>
                                                        <strong>Color :</strong> <span
                                                        style="width: 40px; height: 20px; display: block; background: #{{$product['color']}};"></span>
                                                </p>
                                                @endif
                                                <p>
                                                        <strong>Price :</strong> {{$order->currency_sign}}{{ round($product['item_price'] * $order->currency_value , 2) }}
                                                </p>
                                               <p>
                                                    <strong>Quantity :</strong> {{$product['qty']}} {{ $product['item']['measure'] }}
                                               </p>
                                                    @if(!empty($product['keys']))

                                                    @foreach( array_combine(explode(',', $product['keys']), explode(',', $product['values']))  as $key => $value)
                                                    <p>

                                                        <b>{{ ucwords(str_replace('_', ' ', $key))  }} : </b> {{ $value }} 

                                                    </p>
                                                    @endforeach

                                                    @endif

                                            </td>

                                            <td>{{$order->currency_sign}}{{ round($product['price'] * $order->currency_value , 2) }}</td>

                                    </tr>

                    @endif

                @endif
                                @endforeach
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12 text-center mt-2">
                                        <a class="btn sendEmail send" href="javascript:;" class="send" data-email="{{ $order->customer_email }}" data-toggle="modal" data-target="#vendorform">
                                                <i class="fa fa-send"></i> Send Email
                                        </a>
                                    </div> --}}
                                </div>
                        </div>
                    </div>
                    <!-- Main Content Area End -->
                </div>
            </div>


    </div>

{{-- LICENSE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header d-block text-center">
        <h4 class="modal-title d-inline-block">License Key</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>

                <div class="modal-body">
                    <p class="text-center">The Licenes Key is :  <span id="key"></span> <a href="javascript:;" id="license-edit">License Key</a><a href="javascript:;" id="license-cancel" class="showbox">Cancel</a></p>
                    <form method="POST" action="{{route('vendor-order-license',$order->order_number)}}" id="edit-license" style="display: none;">
                        {{csrf_field()}}
                        <input type="hidden" name="license_key" id="license-key" value="">
                        <div class="form-group text-center">
                    <input type="text" name="Save License" placeholder="Enter New License Key" style="width: 40%; border: none;" required=""><input type="submit" name="submit" value="Save License" class="btn btn-primary" style="border-radius: 0; padding: 2px; margin-bottom: 2px;">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


{{-- LICENSE MODAL ENDS --}}

{{-- MESSAGE MODAL --}}
<div class="sub-categori">
    <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorformLabel">Send Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <form id="emailreply">
                                    {{csrf_field()}}
                                    <ul>
                                        <li>
                                            <input type="email" class="input-field eml-val" id="eml" name="to" placeholder="Email Address *" value="" required="">
                                        </li>
                                        <li>
                                            <input type="text" class="input-field" id="subj" name="subject" placeholder="Subject *" required="">
                                        </li>
                                        <li>
                                            <textarea class="input-field textarea" name="message" id="msg" placeholder="Your Message *" required=""></textarea>
                                        </li>
                                    </ul>
                                    <button class="submit-btn" id="emlsub" type="submit">Enter New License Key</button>
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

{{-- MESSAGE MODAL ENDS --}}




@endsection


@section('scripts')

<script type="text/javascript">
$('#example2').dataTable( {
  "ordering": false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'responsive'  : true
} );
</script>

    <script type="text/javascript">
        $(document).on('click','#license' , function(e){
            var id = $(this).parent().find('input[type=hidden]').val();
            var key = $(this).parent().parent().find('input[type=hidden]').val();
            $('#key').html(id);  
            $('#license-key').val(key);    
    });
        $(document).on('click','#license-edit' , function(e){
            $(this).hide();
            $('#edit-license').show();
            $('#license-cancel').show();
        });
        $(document).on('click','#license-cancel' , function(e){
            $(this).hide();
            $('#edit-license').hide();
            $('#license-edit').show();
        });

        $(document).on('submit','#edit-license' , function(e){
            e.preventDefault();
          $('button#license-btn').prop('disabled',true);
              $.ajax({
               method:"POST",
               url:$(this).prop('action'),
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
               success:function(data)
               {
                  if ((data.errors)) {
                    for(var error in data.errors)
                    {
                        $.notify('<li>'+ data.errors[error] +'</li>','error');
                    }
                  }
                  else
                  {
                    $.notify(data,'success');
                    $('button#license-btn').prop('disabled',false);
                    $('#confirm-delete').modal('toggle');

                   }
               }
                });
        });
    </script>

@endsection