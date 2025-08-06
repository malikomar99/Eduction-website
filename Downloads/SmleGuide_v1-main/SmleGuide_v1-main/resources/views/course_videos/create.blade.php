@extends('layouts.vertical', ['title' => 'Add Video'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Add Video</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ route('course.videos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                            <div class="col-12">
                                    <label for="course_id" class="form-label">Course</label>
                                    <select name="course_id" id="course_id" class="form-select" required>
                                        @forelse ($courses as $course)
                                        <option {{ old('course_id')==$course->id ? 'selected': '' }} value="{{ $course->id }}">{{ $course->title }}</option>

                                        @empty
                                        <option disabled> add course first</option>
                                        @endforelse
                                    </select>
                                    @error('course_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="label" class="form-label">Video Label</label>
                                    <input type="text" name="video_label" id="video_label" class="form-control" placeholder="Enter Video Label" required value="{{ old('video_label') }}">
                                    @error('video_label')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="embeded_video" class="form-label">Video Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type1" value="local">
                                        <label class="form-check-label" for="type1">
                                            Local Video
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type2" checked value="youtube">
                                        <label class="form-check-label" for="type2">
                                            Youtube Embeded Video
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <label for="video" class="form-label" id="VideoLabel">Embeded Video</label>
                                        <input type="text" name="video_url" id="video_url" class="form-control" placeholder="Enter Embeded Video" required value="{{ old('video_url') }}" accept="video/*">
                                    </div>
                                    @error('video_url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dynamic Fields Below -->
                                <div id="video-thumbnail-fields" class="row g-3">
                                            <div class="col-12">
                                                <div class="col-lg-6">
                                                    <div class="d-flex flex-wrap flex-sm-nowrap __gap-12px">
                                                        <!-- Image Upload (1:1) -->
                                                        <div class="__custom-upload-img w-100">
                                                            <label class="form-label">
                                                                <h2> Upload Video Thumbnail</h2>
                                                            </label>
                                                            <label
                                                                class="text-center position-relative upload-container square w-100"
                                                                for="customFileEg1">
                                                                <img class="upload-preview w-100" id="viewer1"
                                                                    src="{{ asset('upload-img.png') }}"
                                                                    alt="Upload Banner image">
                                                                <input type="file" name="video_thumbnail"
                                                                    value="{{ old('video_thumbnail') }}" id="customFile1"
                                                                    data-preview="viewer1" class="custom-file-input"
                                                                    accept="image/*" hidden>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <h2 class="mt-4">Video Thumbnail Ratio 3:1</h2>
                                                    <div class="text-danger">Image format : jpg, png, jpeg | Maximum Size: 2
                                                        MB
                                                    </div>
                                                </div>
                                                @error('video_thumbnail')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                <div class="col-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option {{ old('active')=="active" ? 'selected': '' }} value="active">Active</option>
                                        <option {{ old('active')=="inactive" ? 'selected': '' }} value="inactive">InActive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('course.videos.index') }}'" style="padding: 8px 16px; font-size: 16px;">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary" style="padding: 8px 16px; font-size: 16px;">
                                        Submit
                                    </button>
                                </div>


                            </div>


                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/custom.js') }}"></script>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('input[name="type"]').change(function() {
            let selectedType = $('input[name="type"]:checked').val();
            // console.log("Selected type:", selectedType);
            if (selectedType == 'local') {
                $("#video_url").prop("type", "file");
                $('#VideoLabel').text('Local Video')
                
            }else{
                
                $("#video_url").prop("type", "text");
                $('#VideoLabel').text('Embeded Video')
            }
        });
    });

</script>
@endpush
