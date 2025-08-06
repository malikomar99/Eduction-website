@extends('layouts.vertical', ['title' => 'Subscription Detail'])

@section('content')
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Subscription Detail</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">{{ $subscription->file->course->title }}</h5>
                        <div class="d-flex justify-content-end flex-wrap ">
                            <a href="{{ route('userSubscription.generatePDF',['print',$subscription->id]) }}"  class="btn btn-outline-primary">
                                Print 
                            </a>
                            <a href="{{ route('userSubscription.generatePDF',['pdf',$subscription->id]) }}" class=" btn btn-outline-primary  mx-1">
                                PDF
                            </a>
                            <a href="{{ url()->previous() }}" class=" btn btn-outline-primary  ">
                                Back
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-0 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 my-1">User Name</div>
                            <div class="col-md-6 my-1">{{ $subscription->user->name }}</div>
                            <div class="col-md-6 my-1">Country</div>
                            <div class="col-md-6 my-1">{{ $subscription->user->country }}</div>
                            <div class="col-md-6 my-1">User Email</div>
                            <div class="col-md-6 my-1">{{ $subscription->user->email }}</div>
                            <div class="col-md-6 my-1">User Mobile</div>
                            <div class="col-md-6 my-1">{{ $subscription->user->mobile }}</div>
                            <div class="col-md-6 my-1">Category </div>
                            <div class="col-md-6 my-1">{{ $subscription->file->course->category->name }}</div>
                            <div class="col-md-6 my-1">Course </div>
                            <div class="col-md-6 my-1">{{ $subscription->file->course->title }}</div>
                            <div class="col-md-6 my-1">Course Purchase Date</div>
                            <div class="col-md-6 my-1">{{ $subscription->purchase_date }}</div>
                            <div class="col-md-6 my-1">Course Expiry Date</div>
                            <div class="col-md-6 my-1">{{ $subscription->expiry_date }}</div>
                            <div class="col-md-6 my-1">Payment method</div>
                            <div class="col-md-6 my-1">{{$subscription->payment_method?? ""  }}</div>
                            <div class="col-md-6 my-1">Payment Slip</div>
                            <div class="col-md-6 my-1">
                                @if($subscription->payment_slip)
                                    <img width="100" src="{{ asset($subscription->payment_slip) }}" alt="image not found">                             

                                
                                @endif
                            </div>
                        </div>
                    </div>
                  
                </div>

            </div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>



        </div>
        @endif



    </div>
</div>
@endsection

@section('scripts')
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
@vite(['resources/js/pages/jobs-dashboard.init.js'])
<script>
    
</script>
@endsection
