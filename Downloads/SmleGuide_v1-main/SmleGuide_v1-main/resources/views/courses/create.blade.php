@extends('layouts.vertical', ['title' => 'Add Course'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Add Course</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select" required>
                                        @forelse ($categories as $category)
                                        <option {{ old('category_id')==$category->id ? 'selected': '' }} value="{{ $category->id }}">{{ $category->name }}</option>

                                        @empty
                                        <option disabled> add category first</option>
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="title" class="form-label">Course Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter course title" required value="{{ old('title') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="image" class="form-label">Upload Course Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter price" min="0" step=".01" required value="{{ old('price') }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="validity_days" class="form-label">Validity Days</label>
                                    <input type="number" name="validity_days" id="validity_days" class="form-control" placeholder="Enter price" min="0" step="1" value="{{ old('validity_days','180') }}" required>
                                    @error('validity_days')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="priority" class="form-label">Prority</label>
                                    <input type="number" name="priority" id="priority" class="form-control" placeholder="0 means high priority" min="0" step="1" value="{{ old('priority') }}" required>
                                    @error('priority')
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
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="3" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="test_id" class="form-label">Mock Test</label>
                                    <select name="test_ids[]" id="test_ids" class="form-select select2" multiple="multiple">
                                        @forelse ($tests as $test)
                                        <option {{ old('test_ids[]')==$test->id ? 'selected': '' }}  value="{{ $test->id }}">{{ $test->name }}</option>

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
        j('.select2').select2();
    });


</script>
@endpush
