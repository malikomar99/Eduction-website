@extends('layouts.vertical', ['title' => 'Service'])

@section('content')
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Services</h4>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card overflow-hidden">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Services</h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end flex-wrap gap-3 pt-3 px-3">
                        <a href="{{ route('service.add') }}" class="btn btn-outline-primary">
                            Add Service
                        </a>
                    </div>


                    <div class="card-body mt-0">
                        <div class="table-responsive table-card mt-0">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col" class="cursor-pointer">ID </th>
                                        <th scope="col" class="cursor-pointer">Service </th>
                                        <th scope="col" class="cursor-pointer">Amount</th>
                                        <th scope="col" class="cursor-pointer">Discounted Amount</th>
                                        <th scope="col" class="cursor-pointer">Image</th>
                                        <th scope="col" class="cursor-pointer">Status</th>
                                        <th scope="col" class="cursor-pointer">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>

                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->service_name }}</td>
                                            <td>{{ $service->service_amount }}</td>
                                            <td>{{ $service->discounted_amount }}</td>




                                            <td>
                                                @if ($service->image)
                                                    <img src="{{ $service->image }}"
                                                        class="avatar avatar-sm rounded-circle me-3" alt="N/A">
                                                @else
                                                    <div class="avatar avatar-sm rounded-circle bg-light me-3">
                                                        <i class="fas fa-camera"></i>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($service->status == 'Active')
                                                    <span
                                                        class="badge bg-success-subtle text-success fs-12 fw-normal">{{ $service->status }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-secondary-subtle text-secondary fs-12 fw-normal">{{ $service->status }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button"
                                                    onclick="window.location.href='{{ route('service.edit', $service->id) }}'"
                                                    class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                {{-- <button type="button"
                                                    onclick="window.location.href='{{ route('service.delete', $service->id) }}'"
                                                    class="btn btn-icon btn-sm bg-danger-subtle text-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button> --}}

                                                <form action="{{ route('service.delete', $service->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm bg-danger-subtle text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this service?')">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>


                                        </tr>
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
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
