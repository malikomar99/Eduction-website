@extends('layouts.error', ['title' => 'Error 503'])

@section('content')

<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="text-center">

            <div class="mb-0">
                <h3 class="mt-4 fw-semibold text-dark text-capitalize">Service unavailable</h3>
                <p class="text-muted">Temporary service outage. Please try again later.</p>
            </div>

            <a class="btn btn-primary mt-3 me-1" href="/">Back to Home</a>

            <div class="maintenance-img mt-4">
                <img src="/images/svg/503-error.svg" class="img-fluid" alt="coming-soon">
            </div>

        </div>
    </div>
</div>

@endsection