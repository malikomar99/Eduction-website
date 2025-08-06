@extends('layouts.vertical', ['title' => 'Change Password'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Change Password</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ route('profile.passowrd.change') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter old password" required value="{{ old('current_password') }}">
                                    @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    <label for="priority" class="form-label">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required value="{{ old('password') }}" placeholder="Enter New password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="priority" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter  password Confirmation" required value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                                <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('categories.index') }}'" style="padding: 8px 16px; font-size: 16px;">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary" style="padding: 8px 16px; font-size: 16px;">
                                        Submit
                                    </button>
                                </div>


                            </div>


                        </form>
                        {{-- @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>



                    </div>
                    @endif --}}

                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script src="{{ asset('js/custom.js') }}"></script>
@endsection
