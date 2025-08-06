@extends('layouts.vertical', ['title' => 'users'])

@section('content')
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Users</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0">Users</h5>
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-end flex-wrap gap-3 pt-3 px-3">
                    <a href=" class="btn btn-outline-primary">
                        Add User
                    </a>
                </div> --}}


                <div class="card-body mt-0">
                    <div class="table-responsive table-card mt-0">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col" class="cursor-pointer">ID </th>
                                    <th scope="col" class="cursor-pointer">Picture</th>
                                    <th scope="col" class="cursor-pointer">Name </th>
                                    <th scope="col" class="cursor-pointer">Email </th>
                                    <th scope="col" class="cursor-pointer">Mobile</th>
                                    <th scope="col" class="cursor-pointer">Country</th>
                                    {{-- <th scope="col" class="cursor-pointer">login Attempt </th>
                                    <th scope="col" class="cursor-pointer">Role</th> --}}
                                    <th scope="col" class="cursor-pointer">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        @if($user->profile_picture)
                                            
                                        <img style="width:50px; height:50px" class="rounded-circle" src="{{ asset($user->profile_picture) }}" alt="not found">
                                        @else
                                        N/A
                                        @endif

                                    </td>
                                    <td>{{ $user->title }}. {{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile}}</td>
                                    <td>{{ $user->country }}</td>
                                    {{-- <td>{{ $user->login_attempt }}</td> --}}
                                    {{-- <td>{{ $user->role }}</td> --}}

                                    

                                   <td>
                                     <a href="{{ route("users.show",$user->id) }}"  class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                   </td>
                                </tr>
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                    <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                </div>

            </div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>



        </div>
        @endif



    </div>
</div>
@endsection

@section('scripts')
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
@vite(['resources/js/pages/jobs-dashboard.init.js'])
@endsection
