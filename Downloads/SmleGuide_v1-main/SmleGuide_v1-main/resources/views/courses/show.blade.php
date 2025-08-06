@extends('layouts.vertical', ['title' => 'Course Detail'])

@section('content')
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">{{ $course->title }} - Course Detail</h4>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Files</h5>
                        <div class="d-flex justify-content-end flex-wrap gap-3  px-3">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>



                <div class="card-body mt-0 ">
                    <div class="table-responsive table-card mt-0">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col" class="cursor-pointer">ID </th>
                                    <th scope="col" class="cursor-pointer">File</th>
                                    <th scope="col" class="cursor-pointer">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($course->files as $file)
                                <tr>

                                    <td>{{ $file->id }}</td>
                                    <td>
                                        {{ $file->file_type }}

                                    </td>



                                    <td>
                                        <button type="button" onclick="window.location.href='{{ route('courseFiles.show', $file->id) }}'" class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button type="button" onclick="window.location.href='{{ route('courseFiles.edit', $file->id) }}'" class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        {{-- <button type="button"
                                                    onclick="window.location.href='{{ route('service.delete', $service->id) }}'"
                                        class="btn btn-icon btn-sm bg-danger-subtle text-danger">
                                        <i class="mdi mdi-delete"></i>
                                        </button> --}}

                                        <form action="{{ route('courseFiles.destroy', $file->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-sm bg-danger-subtle text-danger" onclick="return confirm('Are you sure you want to delete this course file?')">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Files  not found</td>
                                </tr>
                                @endforelse
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>

            </div>
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Mock test</h5>
                        {{-- <div class="d-flex justify-content-end flex-wrap gap-3  px-3">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                                Back
                            </a>
                        </div> --}}
                    </div>
                </div>



                <div class="card-body mt-0 ">
                    <div class="table-responsive table-card mt-0">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col" class="cursor-pointer">ID </th>
                                    <th scope="col" class="cursor-pointer">Name</th>
                                    <th scope="col" class="cursor-pointer">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($course->tests as $test)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $test->name }}

                                    </td>
                                    <td>
                                         <button type="button" onclick="window.location.href='{{ route('questions.show', $test->pivot->test_id) }}'" class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                    </td>

                                </tr>
                                 @empty
                                <tr>
                                    <td colspan="3">Mock test not found</td>
                                </tr>
                                @endforelse
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>
               
              

            </div>
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Videos</h5>
                        {{-- <div class="d-flex justify-content-end flex-wrap gap-3  px-3">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                                Back
                            </a>
                        </div> --}}
                    </div>
                </div>



                <div class="card-body mt-0 ">
                    <div class="table-responsive table-card mt-0">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col" class="cursor-pointer"># </th>
                                    <th scope="col" class="cursor-pointer">Label</th>
                                    <th scope="col" class="cursor-pointer">Video</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($course->videos as $video)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $video->label }}

                                    </td>
                                  
                                        <td>
                                        @if($video->type=='local') 
                                            <video src="{{ asset($video->video )}}" controls></video> 
                                        @else
                                            {!! $video->video !!}
                                        @endif
                                        </td>
                                   

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Videos not found</td>
                                </tr>
                                @endforelse
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
