@extends('layouts.vertical', ['title' => 'Course File Detail'])

@section('content')
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Course File Detail</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0">{{ $file->course->title }}</h5>
                    </div>
                </div>
                <div class="d-flex justify-content-end flex-wrap gap-3 pt-3 px-3">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                        Back
                    </a>
                </div>


                <div class="card-body mt-0 ">
                    @if($file->file_type=='inline_text')
                    {!! $file->inline_text !!}
                    @else
                    @php
                       $filePath = $file->file_path

                    @endphp
               

                    <div class="my-2">
                    <a href="{{ route('course-files.download', $filePath) }}" class="btn btn-sm btn-primary" target="_blank">
                      Download
                    </a>
                    </div>
                
                    {{-- <iframe src="{{ asset($file->file_path) }}" class="w-100 h-100" title="Iframe Example"></iframe> --}}

                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
@vite(['resources/js/pages/jobs-dashboard.init.js'])
@endsection
