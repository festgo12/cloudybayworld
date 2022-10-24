@extends('layouts.app')

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
                  <li class="breadcrumb-item">wallet</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="edit-profile">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header text-center">
                     <h4 class="card-title mb-0"> <strong>My Balance</strong> </h4>
                     <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                  </div>
                  <div class="card-body">
                     <div class="container">
                        <div class="text-center">
                           <div class="title">
                              <div class="">
                                 <h1> <strong>{{ App\Models\Currency::convertPrice( $user->wallet['balance'] )}}</strong> </h1>
                                
                                 <p class=" mt-3">this is your current balance.</p>
                                 <button class="btn mrl5 btn-lg btn-success default-view"  data-bs-toggle="modal" data-bs-target="#depositModal">Add Funds</button>
                                 {{-- <button class="btn mrl5 btn-lg btn-primary btn-md-res"  href="#" >Withdraw       </button> --}}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title mb-0">History</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                     </div>
                     <div class="table-responsive add-project mx-5">
                        <table class="table card-table table-vcenter text-nowrap">
                        @if($user->transactions->count())
                           <thead>
                              <tr>
                                 <!-- <th> <strong>Name </strong> </th> -->
                                 <th> <strong>Date </strong> </th>
                                 <th> <strong> Description</strong> </th>
                                 <th> <strong> Amount</strong> </th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              @foreach($user->transactions->sortByDesc('created_at') as $transaction)
                              <tr>
                                 <!-- <td><a class="text-inherit" href="#">Untrammelled prevents </a></td> -->
                                 <td>{{$transaction->created_at->diffForHumans()}}</td>
                                 <td><span class="status-icon bg-success"></span> {{$transaction->description}}</td>
                                 <td class="{{($transaction->is_inflow) ? 'text-success' : 'text-danger'}}">
                                    {{($transaction->is_inflow) ? '+' : '-'}}{{ App\Models\Currency::convertPrice( $transaction->amount )}}
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        @else
                        <div class="avatar d-flex justify-content-center mt-2">
                           <img id="tempAvatar" height="200" width="200" alt="" src="./assets/images/dashboard/no_transaction_waiting.svg">
                        </div>
                        <p class="text-center">Your transactions will appear hear</p>
                        @endif
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <!-- The Deposit Modal -->
   <div class="modal" id="depositModal">
      <div class="modal-dialog">
         <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h6 class="modal-title">Funding Amount</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               <form method="POST" name="fundingForm" action="{{ route('fundWallet') }}" class="input-group">
                  @csrf
                  <input id="userEmail" type="hidden" name="userEmail" value="{{$user->email}}" />
                  <input id="fundingReference" type="hidden" name="fundingReference" value="{{$user->email}}" />
                  <input id="depositInput" type="number" name="amount" min="1" class="form-control" placeholder="Enter Funding Amount (NGN)">
                  <button id="depositProceedButton" class="btn btn-primary" type="submit">Proceed</button>
               </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
               <button id="depositModalCloseButton" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

         </div>
      </div>
   </div>
   <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
   <script src="https://js.paystack.co/v1/inline.js"></script>
   <script src="{{ asset('./assets/js/dashboard/wallet.js') }}"></script>
</div>
@endsection