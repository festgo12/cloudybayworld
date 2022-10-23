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

            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i data-feather="home"></i></a></li>

            <li class="breadcrumb-item">Market</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="email-wrap bookmark-wrap" >
        <div class="row">
        <div class="col-xl-3 box-col-6">
            <div class="email-left-aside">
            <div class="card">
                <div class="card-body">
                <div class="email-app-sidebar left-bookmark task-sidebar">

                    <ul class="nav main-menu" role="tablist">

                        <li class="nav-item"><span class="main-title"> Categories</span></li>
                        <li id="tagList"></li>
                    </ul>
                    {{-- <hr />
                    <ul class="nav main-menu" role="tablist">
                        <li class="nav-item"><span class="main-title"> Tags</span></li>
                        <li><a id="pills-created-tab" data-bs-toggle="pill" href="#pills-created" role="tab"
                            aria-controls="pills-created" aria-selected="true"><span class="title">
                                #Agbada</span></a></li>
                        
                    </ul> --}}
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                    aria-labelledby="pills-created-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">
                                        <h6 class="mb-0"><b><i class="icofont icofont-ui-clip-board"></i> Markets</b></h6>
                                        {{-- <ul>
                                            <li><a class="grid-bookmark-view" href="javascript:void(0)"><i
                                                data-feather="grid"></i></a></li>
                                            <li><a class="list-layout-view" href="javascript:void(0)"><i
                                                data-feather="list"></i></a></li>
                                        </ul> --}}
                                    </div>
                                    <div id="marketList" class="row">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center m-b-30">

            {{-- <button class="btn btn-info text-white" data-bs-original-title="" title=""> <strong>Load More</strong></button> --}}
            </div>
        </div>

        </div>
    </div>
    
    
    </div>  
    <!-- Container-fluid Ends-->
    <input id="userId" type="hidden" name="userId" value="{{ auth()->user()->id }}" />
    <script src="{{ asset('./assets/js/dashboard/markets.js') }}"></script>
</div>
@endsection