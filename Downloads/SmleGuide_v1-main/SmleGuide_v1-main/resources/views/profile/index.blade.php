@extends('layouts.vertical', ['title' => 'Profile'])

@section('content')

<!-- Start Content-->
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Account Detail</h4>
        </div>

        {{-- <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                <li class="breadcrumb-item active">Contacts</li>
            </ol>
        </div> --}}
    </div>

    <div class="card">
        <div class="row ">

            <form method="post" action="{{ route('profile.update') }}" class="col-12 col-md-12 " enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="mb-4">My Account</h2>
                    <h3 class="card-title">Profile Details</h3>
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-xl">
                                <img class="rounded" src="{{ asset($user->profile_picture) }}" alt="" width="100">
                            </span>
                        </div>
                        {{-- <div class="col-auto">
                            <a href="#" class="btn btn-1">
                                Change avatar
                            </a></div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-ghost-danger btn-3">
                                Delete avatar
                            </a></div> --}}
                    </div>
                    <h3 class="card-title mt-4">Profile</h3>
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-label">Name</div>
                            <div class="input-group">
                                <select class="form-select" name="title" id="title" style="max-width: 100px;" required>
                                    <option value="" disabled>Title</option>
                                    <option value="Dr" @selected($user->title == 'Dr')>Dr.</option>
                                    <option value="Mr" @selected($user->title == 'Mr')>Mr.</option>
                                    <option value="Miss" @selected($user->title == 'Miss')>Miss.</option>

                                </select>
                                <input class="form-control" type="text" name="name" id="name" required placeholder="Enter your Full Name" value="{{ $user->name }}">
                            </div>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md">
                            <div class="form-label">Email</div>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md">
                            <div class="form-label">Country</div>
                            <select class="form-select" name="country" id="country" required>
                                <option value="" >Select Country</option>
                                <option value="Pakistan" @selected($user->country=='Pakistan')>Pakistan</option>
                                <option value="Saudi Arabia" @selected($user->country=='Saudi Arabia')>Saudi Arabia</option>
                                <option value="India" @selected($user->country=='India')>India</option>
                                <option value="Other" @selected($user->country=='Other')>Other</option>
                                <!-- Add country options here -->
                            </select>
                            @error('country')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <h3 class="card-title mt-4">Email</h3>
                    <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p> --}}
                    <div>
                        <div class="row g-2 mt-2">
                            <div class="col-md">

                                <div class="form-label">Mobile</div>
                                <input type="text" class="form-control " name="mobile" value="{{ $user->mobile }}" required>
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md">

                                <div class="form-label">Change Profile Picture</div>
                                <input type="file" class="form-control " name="profile_picture" accept=".jpg, .png, .jpeg">
                                @error('profile_picture')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                        {{-- <a href="#" class="btn btn-1">
                            Cancel
                        </a> --}}
                        <button type="submit" class="btn btn-primary btn-2">
                            Submit
                        </butto>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection
