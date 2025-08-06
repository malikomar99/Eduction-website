@extends('layouts.error', ['title' => 'Error 404'])

@section('content')

<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="text-center">
            <div class="mb-0">
                <h3 class="fw-semibold text-dark text-capitalize">Oops!, Page Not Found</h3>
                <p class="text-dark">This pages you are trying to access does not exits or has been moved. <br> Try going back to our homepage.</p>
            </div>

            <a class="btn btn-primary mt-3 me-1" href="/">Back to Home</a>

            <div class="error-page mt-4">
                <img src="/images/svg/404-error.svg" class="img-fluid" alt="coming-soon">
            </div>
            
        </div>
    </div>
</div>

@endsection