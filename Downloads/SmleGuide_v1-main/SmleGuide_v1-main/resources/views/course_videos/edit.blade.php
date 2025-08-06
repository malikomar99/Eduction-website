@extends('layouts.vertical', ['title' => 'Edit Video'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Video</h5>
            </div>

            <div class="card-body">
                <div class="container-fluid p-0">
                    <form action="{{ route('course.videos.update', ['course_video' => $course_video->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="course_id" class="form-label">Course</label>
                                <select name="course_id" id="course_id" class="form-select" required>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ $course_video->course_id == $course->id ? 'selected' : '' }}>
                                            {{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="label" class="form-label">Video Label</label>
                                <input type="text" name="video_label" id="label" class="form-control" placeholder="Enter Video Label" required value="{{ old('video_label', $course_video->video_label) }}">
                                @error('video_label')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="embeded_video" class="form-label">Video Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type1" value="local" {{ $course_video->type == 'local' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type1">Local Video</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type2" value="youtube" {{ $course_video->type == 'youtube' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type2">Youtube Embeded Video</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="video" class="form-label" id="VideoLabel">Video</label>
                                <input type="{{ $course_video->type == 'local' ? 'file' : 'text' }}" name="{{ $course_video->type == 'local' ? 'video' : 'video_url' }}" id="video" class="form-control"
                                       placeholder="Enter Embeded Video"
                                       value="{{ old('video_url', $course_video->type == 'youtube' ? $course_video->video_url : '') }}"
                                       accept="{{ $course_video->type == 'local' ? 'video/*' : '' }}">
                                @error('video')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('video_url')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Upload Video Thumbnail</label>
                                <div class="col-lg-6">
                                    <div class="d-flex flex-wrap flex-sm-nowrap __gap-12px">
                                        <div class="__custom-upload-img w-100">
                                            <label class="text-center position-relative upload-container square w-100" for="customFile1">
                                                <img class="upload-preview w-100" id="viewer1"
                                                     src="{{ $course_video->video_thumbnail ? asset($course_video->video_thumbnail) : asset('upload-img.png') }}"
                                                     alt="Upload Banner image">
                                                <input type="file" name="video_thumbnail" id="customFile1" data-preview="viewer1" class="custom-file-input" accept="image/*" hidden>
                                            </label>
                                        </div>
                                    </div>
                                    <h6 class="mt-3">Video Thumbnail Ratio 3:1</h6>
                                    <div class="text-danger">Image format: jpg, png, jpeg | Max Size: 2MB</div>
                                </div>
                                @error('video_thumbnail')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="active" {{ $course_video->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $course_video->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/custom.js') }}"></script>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        changeInputType('{{ $course_video->type }}');
    });

    $('input[name="type"]').change(function () {
        let selectedType = $('input[name="type"]:checked').val();
        changeInputType(selectedType);
    });

    function changeInputType(type) {
        if (type === 'local') {
            $("#video").attr("type", "file").attr("name", "video").removeAttr("value");
            $('#VideoLabel').text('Local Video');
        } else {
            $("#video").attr("type", "text").attr("name", "video_url").val("{{ old('video_url', $course_video->video_url) }}");
            $('#VideoLabel').text('Embeded Video');
        }
    }
</script>
@endpush
