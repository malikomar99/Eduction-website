@extends('layouts.vertical', ['title' => 'Edit Test name'])

@section('content')
<div class="row mt-2">
    <div class="col-8 m-auto ">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Edit Test Name</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="container-fluid p-0">
                        <form action="{{ url('tests/'.$test->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Test name" required value="{{ old('name', $test->name) }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                


                                <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('tests.index') }}'" style="padding: 8px 16px; font-size: 16px;">
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
