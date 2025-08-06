@extends('layouts.vertical', ['title' => 'Edit Course'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Edit Course Files</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ route('courseFiles.update',$file->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row g-3">
                            <div class="col-12">
                                    <label for="file_name" class="form-label">Course File Name</label>
                                    <input type="text" name="file_name" id="file_name" class="form-control" placeholder="Enter course File Name" required value="{{ old('file_name', $file->file_name ?? '') }}">
                                    @error('file_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="course_id" class="form-label">Course</label>
                                    <select name="course_id" id="course_id" class="form-select" required>
                                        @forelse ($courses as $course)
                                        <option  {{ old('course_id') == $course->id ? 'selected' : ($course->id == $file->course_id ? 'selected' : '') }} value="{{ $course->id }}">{{ $course->title }}</option>

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
                                        <option value="pdf" {{ old('file_type', $file->file_type)=="pdf" ? 'selected': '' }}>PDF</option>
                                        <option value="doc" {{ old('file_type', $file->file_type)=="doc" ? 'selected': '' }}>DOC</option>
                                        <option value="txt" {{ old('file_type', $file->file_type)=="txt" ? 'selected': '' }}>TXT</option>
                                        <option value="inline_text" {{ old('file_type', $file->file_type)=="inline_text" ? 'selected': '' }}>INLINE TEXT</option>
                                    </select>
                                    @error('file_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="file_path" class="form-label">File</label>
                                    <input type="file" name="file_path" id="file_path" class="form-control" placeholder="Enter file" accept=".pdf, .doc, .txt, .docx"  value="{{ old('file_path',$course->file_path) }}">


<div id="previewArea" class="mt-3 d-flex flex-wrap gap-2">
        <div class="position-relative border p-2 rounded" data-existing-index="{{ $file->id }}">
            <span>{{ basename($file->file_name) }}</span>
            <a href="{{ route('course-files.download',base64_encode($file->file_path)) }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">View</a>
            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-existing-file" data-index="{{ $file->id }}">&times;</button>
            <input type="hidden" name="existing_files" value="{{ $file->file_path }}">
        </div>
</div>
                                    @error('file_path')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    <label for="inline_text" class="form-label">Inline Text</label>
                                    <textarea name="inline_text" id="summernote" cols="30" rows="3" class="form-control">{{ old('inline_text',$file->inline_text) }}</textarea>
                                    @error('inline_text')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>







                                <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('courseFiles.index') }}'" style="padding: 8px 16px; font-size: 16px;">
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
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
    // Handle removal of existing files
    $(document).on('click', '.remove-existing-file', function () {
        const index = $(this).data('index');
        $(`[data-existing-index="${index}"]`).remove();
    });
</script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
