@extends('layouts.vertical', ['title' => 'Add Services'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Service</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="container-fluid p-0">
                            <form action="{{ route('service.update', $service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="row g-3">
                                    <div class="col-md-4 col-12">
                                        <label for="service_name" class="form-label">Service Name</label>
                                        <input type="text" name="service_name" value="{{ $service->service_name }}"
                                            id="service_name" class="form-control" placeholder="Enter service name">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="service_price" class="form-label">Service Amount</label>
                                        <input type="number" name="service_amount" value="{{ $service->service_amount }}"
                                            id="service_price" class="form-control" placeholder="Enter price" min="0"
                                            step="1">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="discount_price" class="form-label">Discounted Amount</label>
                                        <input type="number" name="discounted_amount"
                                            value="{{ $service->discounted_amount }}" id="discounted_amount"
                                            class="form-control" placeholder="Enter discount price" min="0"
                                            step="1">
                                    </div>

                                    <div class="col-med-4 col-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="Active" {{ $service->status == 'Active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="Inactive" {{ $service->status == 'Inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>


                                    <div class="col-med-4 col-6">
                                        <label class="form-label">Image File</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
                                            <label class="input-group-text" for="image">Upload Image</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <p class="mt-2 mb-lg-0"><code>Uploaded Image</code></p>
                                        <img id="image-preview" src="{{ asset($service->image) }}" class="img-thumbnail img-fluid" alt="Thumbnails" data-holder-rendered="true" width="200">
                                    </div>





                                    <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                        <button type="button" class="btn btn-danger"
                                            onclick="window.location.href='{{ route('service') }}'"
                                            style="padding: 8px 16px; font-size: 16px;">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary"
                                            style="padding: 8px 16px; font-size: 16px;">
                                            Update
                                        </button>
                                    </div>


                                </div>


                            </form>


                           @include('layouts.partials.alerts')



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="{{ asset('js/custom.js') }}"></script>


@endsection
