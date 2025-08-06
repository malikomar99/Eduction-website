@extends('layouts.vertical', ['title' => 'Add Course'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Add Course Files</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ route('courseFiles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                            <div class="col-12">
                                    <label for="file_name" class="form-label">Course File Name</label>
                                    <input type="text" name="file_name" id="file_name" class="form-control" placeholder="Enter course File Name" required value="{{ old('file_name') }}">
                                    @error('file_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                    <label for="file_Type" class="form-label">File Type</label>
                                    <select name="file_type" id="file_Type" class="form-select" required>
                                        <option value="pdf" @selected( old('file_type'=='pdf') ) >PDF</option>
                                        <option value="doc" @selected( old('file_type'=='doc') )>DOC</option>
                                        <option value="txt" @selected( old('file_type'=='txt') )>TXT</option>
                                        <option value="inline_text" @selected( old('file_type'=='inline_text') )>INLINE TEXT</option>
                                    </select>
                                    @error('file_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="file_path" class="form-label">File</label>
                                    <input type="file" name="file_path" id="file_path" class="form-control" placeholder="Enter file" accept=".pdf, .doc, .txt, .docx"  value="{{ old('file_path') }}">
                                    @error('file_path')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="previewArea" class="mt-3 d-flex flex-wrap gap-2"></div>
                                </div>


                                <div class="col-12">
                                    <label for="inline_text" class="form-label">Description</label>
                                    <textarea name="inline_text" id="summernote" cols="30" rows="3" class="form-control">{{ old('inline_text') }}</textarea>
                                    @error('inline_text')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>







                                <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('courses.index') }}'" style="padding: 8px 16px; font-size: 16px;">
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
  {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
<script>
      $('#summernote').summernote({
        placeholder: 'Inline Text Editor',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
    <script>
$(document).ready(function() {
    $('#file_path').on('change', function(event) {
        $('#previewArea').empty(); // Clear previous previews

        const files = event.target.files;

        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                let preview = '';

                preview = `
                        <div class="position-relative border p-2 rounded">
                            <span>${file.name}</span>
                            <button class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-file" data-index="${index}">&times;</button>
                        </div>
                    `;

                $('#previewArea').append(preview);
            };

            reader.readAsDataURL(file);
        });
    });

    // Handle remove button
    $(document).on('click', '.remove-file', function() {
        const indexToRemove = $(this).data('index');

        // Convert FileList to Array
        let file_path = $('#file_path')[0];
        let dataTransfer = new DataTransfer(); // Create new FileList

        Array.from(file_path.files).forEach((file, index) => {
            if (index !== indexToRemove) {
                dataTransfer.items.add(file); // Keep other files
            }
        });

        file_path.files = dataTransfer.files;

        // Trigger change to refresh preview
        $('#file_path').trigger('change');
    });
});
</script>

<script src="{{ asset('js/custom.js') }}"></script>
@endsection
