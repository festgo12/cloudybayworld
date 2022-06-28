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
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active"> Edit </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form>
                                <input id="userId" type="hidden" name="userId" value="{{ $user->id }}" />
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="media"> <img class="img-70 rounded-circle" alt=""
                                                src="{{ ($user->attachments) ? $user->attachments['path'] : './assets/images/avatar/default.jpg' }}">
                                            <div class="media-body">
                                                <h5 class="mb-1">{{ $user->firstname }} {{ $user->lastname }}</h5>
                                                <p>DESIGNER</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Bio</h6>
                                    <textarea id="userBio" placeholder="Add a bio" class="form-control"
                                        rows="5">{{ $user->userBio ? $user->userBio : '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input id="contactNo" value="{{ $user->contactNo }}" class="form-control"
                                        placeholder="+234 810-456-7890">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" value="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Website</label>
                                    <input id="websiteUrl" value="{{ $user->websiteUrl }}" class="form-control" placeholder="http://Uplor .com">
                                </div>
                                <div class="form-footer">
                                    <p class="serverMessage text-center"></p>
                                    <button class="btn btn-info btn-block submitButtons">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Company</label>
                                        <input id="companyName" value="{{ $user->companyName ? $user->companyName : '' }}"
                                            class="form-control" type="text" placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input id="username" value="{{ $user->username }}" class="form-control" type="text"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input id="email" value="{{ $user->email }}" class="form-control" type="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input id="firstname" value="{{ $user->firstname }}" class="form-control" type="text"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input id="lastname" value="{{ $user->lastname }}" class="form-control" type="text"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input id="homeAddress" value="{{ $user->homeAddress ? $user->homeAddress : '' }}"
                                            class="form-control" type="text" placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input id="city" value="{{ $user->city ? $user->city : '' }}" class="form-control"
                                            type="text" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Postal Code</label>
                                        <input id="zipCode" value="{{ $user->zipCode ? $user->zipCode : '' }}" class="form-control"
                                            type="number" placeholder="ZIP Code">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select id="countryId" class="form-control btn-square">
                                            <option value="0">--Select--</option>
                                            <option value="1">Germany</option>
                                            <option value="2">Canada</option>
                                            <option value="3">Usa</option>
                                            <option value="4">Aus</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label">About Me</label>
                                        <textarea id="aboutUser" class="form-control" rows="5"
                                            placeholder="Enter About your description">{{ $user->aboutUser ? $user->aboutUser : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <p class="serverMessage text-center"></p>
                            <button class="btn btn-info submitButtons" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <script src="{{ asset('./assets/js/dashboard/editProfile.js') }}"></script>
</div>
@endsection