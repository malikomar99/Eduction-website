@extends('layouts.vertical', ['title' => 'Edit Category'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Edit Category</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category name" required value="{{ old('name',$category->name) }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    @if($category->image)
                                     <img src="{{ asset($category->image) }}" alt="Category Image" width="100" height="100" >
                                     @endif
                                    <label for="image" class="form-label">Upload Category Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                   
                                </div>


                                <div class="col-12">
                                    <label for="priority" class="form-label">Priority</label>
                                    <input type="number" name="priority" id="priority" class="form-control" placeholder="0 means high priority" min="0" step="1" required value="{{ old('priority',$category->priority) }}">
                                    @error('priority')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option @selected(old('status') == 'active' || $category->status == 'active') value="active">Active</option>
                                        <option @selected(old('status') == 'inactive' || $category->status == 'inactive') value="inactive">InActive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                

                                <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('categories.index') }}'" style="padding: 8px 16px; font-size: 16px;">
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
