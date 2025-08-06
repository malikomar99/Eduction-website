@extends('layouts.vertical', ['title' => 'Edit Course'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Edit Course</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ route('courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="category_id" class="form-label">Category</label>
                                    <input type="text" class="form-control" name="category_id" value="{{ $course->category->name }}" readonly disabled id="">
                                    {{-- <select name="category_id" id="category_id" class="form-select" >
                                        @forelse ($categories as $category)
                                        <option readonly @selected(old('category_id'==$category->id , $course->category_id==$category->id)) value="{{ $category->id }}">{{ $category->name }}</option>

                                    @empty
                                    <option disabled> add category first</option>
                                    @endforelse
                                    </select> --}}
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="title" class="form-label">Course Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter course title" required value="{{ old('title',$course->title) }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    @if($course->image)
                                     <img src="{{ asset($course->image) }}" alt="Category Image" width="100" height="100" >
                                     @endif
                                    <label for="image" class="form-label">Upload Course Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                   
                                </div>

                                <div class="col-12">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter price" min="0" step=".01" required value="{{ old('price',$course->price) }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="validity_days" class="form-label">Validity Days</label>
                                    <input type="number" name="validity_days" id="validity_days" class="form-control" placeholder="Enter price" min="0" step="1" value="{{ old('validity_days',$course->validity_days) }}" required>
                                    @error('validity_days')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="priority" class="form-label">Prority</label>
                                    <input type="number" name="priority" id="priority" class="form-control" placeholder="0 means high priority" min="0" step="1" value="{{ old('priority', $course->priority) }}" required>
                                    @error('priority')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option {{ old('status',$course->status)=="active" ? 'selected': '' }} value="active">Active</option>
                                        <option {{ old('status', $course->status)=="inactive" ? 'selected': '' }} value="inactive">InActive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="3" class="form-control">{{ old('description',$course->description) }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="test_id" class="form-label">Mock Test</label>
                                    <select name="test_ids[]" id="test_ids" class="form-select select2" multiple="multiple">
                                        @forelse ($tests as $test)
                                        <option @selected($course->tests->contains($test->id)) @disabled($course->tests->contains($test->id))  value="{{ $test->id }}">{{ $test->name }}</option>

                                        @empty
                                        <option disabled> add test first</option>
                                        @endforelse
                                    </select>
                                    @error('test_ids')
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

<script src="{{ asset('js/custom.js') }}"></script>
@endsection
@push('js')
<script>
    var j = jQuery.noConflict();
    j(document).ready(function() {
        j('.select2').select2({
            allowClear: false
            , tags: true // allows user to type new tags
        });
        j('.select2').on('select2:unselecting', function(e) {
        let disabled = $(e.params.args.data.element).prop('disabled');
        if (disabled) {
            e.preventDefault();
        }
    });
    });

</script>
@endpush
