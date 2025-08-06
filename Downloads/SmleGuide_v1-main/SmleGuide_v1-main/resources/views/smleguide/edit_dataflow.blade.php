@extends('layouts.vertical', ['title' => 'Add Services'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Add Dataflow Case</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="container-fluid p-0">
                            <form action="{{ route('dataflow.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="row g-3">

                                    <div class="col-md-1 col-12">
                                        <label for="title" class="form-label">Title</label>
                                        <select name="title" id="title" class="form-select" required>
                                            <option value="">-- Select Title --</option>
                                            <option value="Dr" {{ $dataflow->title == 'Dr' ? 'selected' : '' }}>Dr
                                            </option>
                                            <option value="Mr" {{ $dataflow->title == 'Mr' ? 'selected' : '' }}>Mr
                                            </option>
                                            <option value="Miss" {{ $dataflow->title == 'Miss' ? 'selected' : '' }}>Miss
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Full Name" value="{{ $dataflow->name }} ">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="passport_no" class="form-label">Passport No</label>
                                        <input type="text" name="passport_no" id="passport_no" class="form-control"
                                            placeholder="Passport Number" value="{{ $dataflow->passport_no }} " required>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="dataflow_email" class="form-label">Dataflow Email</label>
                                        <input type="email" name="dataflow_email" id="dataflow_email" class="form-control"
                                            placeholder="Enter Dataflow Email" value="{{ $dataflow->dataflow_email }} "
                                            required>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="dataflow_password" class="form-label">Dataflow Password</label>
                                        <input type="text" name="dataflow_password" id="dataflow_password"
                                            class="form-control" placeholder="Enter dataflow password"
                                            value="{{ $dataflow->dataflow_password }}">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="service_id" class="form-label">Service</label>
                                        <select name="service_id" id="service_id"
                                            class="form-select @error('service_id') is-invalid @enderror" required>
                                            <option value="">-- Select a Service --</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}"
                                                    {{ $dataflow->service_id == $service->id ? 'selected' : '' }}>
                                                    {{ $service->service_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>




                                    <div class="col-md-4 col-12">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" name="status"
                                            value="{{ $dataflow->status }}" id="status">
                                            <option value="">-- Select a Status --</option>
                                            <option value="dataflow_pending"
                                                {{ $dataflow->status == 'dataflow_pending' ? 'selected' : '' }}>Dataflow
                                                Pending</option>
                                            <option value="application_submitted"
                                                {{ $dataflow->status == 'application_submitted' ? 'selected' : '' }}>
                                                Application Submitted</option>
                                            <option value="application_in_progress"
                                                {{ $dataflow->status == 'application_in_progress' ? 'selected' : '' }}>
                                                Application in process</option>
                                            <option value="quality_check"
                                                {{ $dataflow->status == 'quality_check' ? 'selected' : '' }}>Quality Check
                                            </option>
                                            <option value="report_completed_positive"
                                                {{ $dataflow->status == 'report_completed_positive' ? 'selected' : '' }}>
                                                Report
                                                Completed (positive)</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-6">
                                        <label class="form-label">File Upload</label>
                                        <input type="file" name="file[]" multiple
                                            class="form-control @error('file.*') is-invalid @enderror" id="file"
                                            onchange="previewImage(event) width="200">
                                        @error('file.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if (old('file_uploaded'))
                                            <small class="text-muted">Note: Files need to be re-selected</small>
                                        @endif
                                    </div>



                                    <div class="col-xl-6">
                                        <p class="mt-2 mb-lg-0"><code>Uploaded Files</code></p>
                                        <div id="file-preview" class="mt-2">
                                            @if ($dataflow->file)
                                                @foreach (json_decode($dataflow->file) as $file)
                                                    <div class="file-item mb-2 d-flex align-items-center">
                                                        <i class="far fa-file-alt me-2"></i>
                                                        <a href="{{ asset($file) }}" target="_blank"
                                                            class="text-decoration-none">
                                                            {{ basename($file) }}
                                                        </a>
                                                        <small class="text-muted ms-2">
                                                            ({{ strtoupper(pathinfo($file, PATHINFO_EXTENSION)) }})
                                                        </small>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="text-muted">No files uploaded</div>
                                            @endif
                                        </div>
                                    </div>











                                    <div class="d-flex justify-content-end flex-wrap gap-2 pt-3 px-3">

                                        <button type="button" class="btn btn-danger"
                                            onclick="window.location.href='{{ route('dataflow') }}'"
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
