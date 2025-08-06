@extends('layouts.vertical', ['title' => 'Mock Ups'])

@section('content')
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Mock Tests</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0">Questions</h5>
                    </div>
                </div>
                <div class="d-flex justify-content-end flex-wrap gap-3 pt-3 px-3">
                    <a href="{{ route('questions.create') }}" class="btn btn-outline-primary">
                        Add Mock Test
                    </a>
                </div>


                <div class="card-body mt-0">
                    <div class="table-responsive table-card mt-0 ">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0 align-middle">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col" class="cursor-pointer"># </th>
                                    <th scope="col" class="cursor-pointer">Mock Test </th>
                                    <th scope="col" class="cursor-pointer">Total Questions </th>
                                    <th scope="col" class="cursor-pointer">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as  $test)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $test->name }}</td>
                                    <td>{{ $test->questions_count }}</td>

                                    <td>
                                        <button type="button" onclick="window.location.href='{{ route('questions.show', $test->id) }}'" class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button type="button" onclick="window.location.href='{{ route('questions.edit', $test->id) }}'" class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        {{-- <button type="button"
                                                    onclick="window.location.href='{{ route('service.delete', $service->id) }}'"
                                        class="btn btn-icon btn-sm bg-danger-subtle text-danger">
                                        <i class="mdi mdi-delete"></i>
                                        </button> --}}

                                        <form action="{{ route('questions.destroy', $test->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-sm bg-danger-subtle text-danger" onclick="return confirm('Are you sure you want to delete this test?')">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                    {{-- <div class="mt-3">
                            {{ $questions->links() }}
                        </div> --}}
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
