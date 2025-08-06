@extends('layouts.vertical', ['title' => 'Edit Banner'])

@section('css')
    @vite(['node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection


@section('content')
    <div class="row mt-2">
        <div class="col-8 m-auto ">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Banner</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="container-fluid p-0">
                            <form action="{{ route('banners.update', $banner->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">

                                    <div class="col-12">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" required class="form-control"
                                            placeholder="Enter Banner Name" value="{{ old('name', $banner->name ?? "") }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="description" class="form-label">Description <span
                                                class="text-danger">(optional)</span></label>
                                        <input type="text" name="description" id="description" class="form-control"
                                            placeholder="Enter Banner Description"
                                            value="{{ old('description', $banner->description ?? '') }}">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <!-- Place this after the description field -->

                                        <fieldset class="row mb-3 mt-3">
                                            <legend class="col-form-label col-sm-2 pt-0">Banner Type <span
                                                    class="text-danger">*</span></legend>
                                            <div class="col-sm-10 d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type"
                                                        id="banner_type_image" value="image" {{ old('type', $banner->type ?? '') == 'image' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="banner_type_image">Image</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type"
                                                        id="banner_type_video" value="video" {{ old('type', $banner->type ?? '') == 'video' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="banner_type_video">Video</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type"
                                                        id="banner_type_link" value="video_link" {{ old('type', $banner->type ?? '') == 'video_link' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="banner_type_link">Video
                                                        Link</label>
                                                </div>
                                            </div>
                                            @error('banner_type')
                                                <div class="text-danger ms-3">{{ $message }}</div>
                                            @enderror
                                        </fieldset>





                                        <!-- Dynamic Fields Below -->
                                        <div id="banner-image-fields" class="row g-3" style="display: none;">
                                            <div class="col-12">
                                                <div class="col-lg-6">
                                                    <div class="d-flex flex-wrap flex-sm-nowrap __gap-12px">
                                                        <!-- Image Upload (1:1) -->
                                                        <div class="__custom-upload-img w-100">
                                                            <label class="form-label">
                                                                <h2> Upload Banner</h2>
                                                            </label>
                                                            <label
                                                                class="text-center position-relative upload-container square w-100"
                                                                for="customFileEg1">
                                                                <img class="upload-preview w-100" id="viewer1"
                                                                    src="{{ asset($banner->image ? $banner->image : 'upload-img.png') }}"
                                                                    alt="Upload Banner image">
                                                                <input type="file" name="image"
                                                                    value="{{ $banner->image ?? '' }}" id="customFile1"
                                                                    data-preview="viewer1" class="custom-file-input"
                                                                    accept="image/*" hidden>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <h2 class="mt-4">Banner Image Ratio 3:1</h2>
                                                    <div class="text-danger">Image format : jpg, png, jpeg | Maximum Size: 2
                                                        MB
                                                    </div>
                                                </div>
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="image_redirection_link" class="form-label">Image Redirection
                                                    Link <span class="text-danger">*</span></label>
                                                <input type="url" name="image_redirection_link" value="{{ old('image_redirection_link',$banner->image_redirection_link ?? "") }}" id="image_redirection_link"
                                                    class="form-control" placeholder="https://example.com">
                                                @error('image_redirection_link')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div id="banner-video-fields" class="row g-3" style="display: none;">
                                            <div class="col-12">
                                                <label for="video" class="form-label">Video File <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" name="video" value="{{ old('video',$banner->video ?? "") }}" id="video" class="form-control">
                                                @error('video')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
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
                                                                for="customFileEg2">
                                                                <img class="upload-preview w-100" id="viewer2"
                                                                    src="{{ asset($banner->video_thumbnail ? $banner->video_thumbnail : 'upload-img.png') }}"
                                                                    alt="Upload Video Thumbnail">
                                                                <input type="file" name="video_thumbnail"
                                                                    value="{{ $banner->video_thumbnail ?? '' }}"
                                                                    id="customFile2" data-preview="viewer2"
                                                                    class="custom-file-input" accept="image/*" hidden>
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
                                        </div>

                                        <div id="banner-link-fields" class="row g-3" style="display: none;">
                                            <div class="col-12">
                                                <label for="video_link" class="form-label">Video Link <span
                                                        class="text-danger">*</span></label>
                                                <input type="url" name="video_link" id="video_link" value="{{ old('video_link',$banner->video_link ?? "") }}" class="form-control"
                                                    placeholder="https://example.com/video">
                                                @error('video_link')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">From Date <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control flatpickr-input active" id="from_date"
                                                required name="from_date"
                                                value="{{ old('from_date', $banner->from_date ?? "") }}"
                                                placeholder="From Date">
                                            @error('from_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label required">Till Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control flatpickr-input active" id="to_date"
                                                required name="to_date" value="{{ old('to_date', $banner->to_date ?? "") }}"
                                                placeholder="Till Date">
                                            @error('to_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option {{ old('status', $banner->status) == "1" ? 'selected' : '' }}
                                                value="active">
                                                Active
                                            </option>
                                            <option {{ old('status', $banner->status) == "0" ? 'selected' : '' }}
                                                value="inactive">
                                                InActive</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                        <button type="button" class="btn btn-danger"
                                            onclick="window.location.href='{{ route('categories.index') }}'"
                                            style="padding: 8px 16px; font-size: 16px;">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary"
                                            style="padding: 8px 16px; font-size: 16px;">
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
        document.addEventListener("DOMContentLoaded", function () {
            const bannerTypeRadios = document.querySelectorAll('input[name="type"]');
            const imageFields = document.getElementById('banner-image-fields');
            const videoFields = document.getElementById('banner-video-fields');
            const linkFields = document.getElementById('banner-link-fields');

            const allDynamicFields = {
                image: ['image', 'image_redirection_link'],
                video: ['video', 'video_thumbnail'],
                link: ['video_link'],
            };

            function clearRequiredAttributes() {
                Object.values(allDynamicFields).flat().forEach(id => {
                    document.getElementById(id)?.removeAttribute('required');
                });
            }

            function toggleFields(selected) {
                imageFields.style.display = selected === 'image' ? 'block' : 'none';
                videoFields.style.display = selected === 'video' ? 'block' : 'none';
                linkFields.style.display = selected === 'video_link' ? 'block' : 'none';

                clearRequiredAttributes();
                if (allDynamicFields[selected]) {
                    allDynamicFields[selected].forEach(id => {
                        document.getElementById(id)?.setAttribute('required', 'required');
                    });
                }
            }

            bannerTypeRadios.forEach(radio => {
                radio.addEventListener('change', function () {
                    toggleFields(this.value);
                });

                // On page load if already selected (e.g., on validation error)
                if (radio.checked) {
                    toggleFields(radio.value);
                }
            });

            // Initialize Flatpickr
            flatpickr("#from_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i", // e.g., 2025-07-16 14:30
                allowInput: true,
                onChange: function (selectedDates) {
                    toPicker.set('minDate', selectedDates[0]);
                }
            });

            flatpickr("#to_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                allowInput: true,
            });


        });
    </script>
    @vite(['resources/js/pages/form-picker.js'])
    <script>
        flatpickrConfig = {
            allowInput: true, // prevent "readonly" prop
        };
    </script>
  
      @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @foreach ($errors->all() as $error)
                    Toastify({
                        text: "❌ {{ $error }}",
                        duration: 4000,
                        gravity: "top",
                        position: "right",
                        close: true,
                        style: {
                            background: "linear-gradient(to right, #FF6F61, #D32F2F)",
                            color: "#fff",
                            padding: "10px 20px",
                            borderRadius: "8px",
                            fontSize: "16px",
                            boxShadow: "0px 4px 10px rgba(0, 0, 0, 0.1)"
                        }
                    }).showToast();
                @endforeach
                });
        </script>
    @endif
@endpush