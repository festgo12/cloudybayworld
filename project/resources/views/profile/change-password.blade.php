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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active"> password </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                
                <div class="col-xl-8 offset-2">
                    <form class="card" method="POST" action="{{ route('user.password.update') }}">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title mb-0">Change Password</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body"> 
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Old Password*</label>
                                        <input id="homeAddress" value=""
                                            class="form-control @error('firstname') is-invalid @enderror" type="text" name="cpass" placeholder="Old Password">

                                            @error('cpass')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">New Password*</label>
                                        <input id="firstname" value="" class="form-control" name="newpass" type="text"
                                            placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Retype Password*</label>
                                        <input id="lastname" value="" class="form-control" name="renewpass" type="text"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                               @if (session()->has('msg'))
                                   
                                <center class="text-success">{{ session()->get('msg') }}</center>

                               {{-- <center class="text-success">{{ Session::get('msg') }}</center> --}}
                               {{-- @elseif() --}}
                                   
                               {{-- <center class="text-danger">the sjaoaajka jkdadldjd djIDIJ</center> --}}
                               @endif
                               
                            </div>
                        </div>
                        <button class="btn btn-info submitButtons mb-2" type="submit">Submit</button>
                        {{-- <div class="">
                        </div> --}}
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection