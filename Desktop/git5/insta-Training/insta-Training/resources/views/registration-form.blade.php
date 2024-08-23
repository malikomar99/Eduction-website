@extends('layouts.app')
@section('content')
		<style>
			.card-registration .select-input.form-control[readonly]:not([disabled]) {
				font-size: 1rem;
				line-height: 2.15;
				padding-left: .73em;
				padding-right: .73em;
				}
				.card-registration .select-arrow {
				top: 13px;
				}
				
				</style>
                 <div class="kf_inr_banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!--KF INR BANNER DES Wrap Start-->
                                <div class="kf_inr_ban_des">
                                    <div class="inr_banner_heading">
                                        <h3>Enrollment Form</h3>
                                    </div>
                                   
                                    <div class="kf_inr_breadcrumb">
                                        <ul>
                                            <li><a href="{{route('welcome')}}">Home</a></li>
                                            <li><a href="{{route('contact-us')}}">contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--KF INR BANNER DES Wrap End-->
                            </div>
                        </div>
                    </div>
                </div>
    <section class="h-100 bg-white">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center">
            {{-- <div class="col"> --}}
                {{-- <div class="card card-registration"> --}}
                    {{-- <div class="row g-0"> --}}
                        <div class="col-xl-6 d-none d-xl-block p-xl-0 h-auto bg-black" >
    
                            <img src="{{asset('asset/extra-images/high-angle-kid-cheating-school-test.jpg')}}"
                                alt="Sample photo" class="img-fluid"
                                style=" height: 105vh; width: 100%;" />
                        </div>
                        <div class="col-xl-6 p-xl-0 h-auto" style="background-color: mintcream;">
                            <div class="card-body p-md-5 text-black">
                                <h3 class="mb-5 text-uppercase">Student registration form</h3>
                                @if(session('success'))
                                        <div class="alert alert-success">
                                            {!! session('success') !!}
                                        </div>
                                @endif
                                <form action="{{route('enrollment')}}" method="POST">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="form3Example1m" class="form-control form-control-lg" name="first_name" />
                                            <label class="form-label" for="form3Example1m">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="form3Example1n" class="form-control form-control-lg" name="last_name" />
                                            <label class="form-label" for="form3Example1n">Last name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                    <h6 class=" me-4" style="margin-bottom: 18px;">Gender: </h6>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio"  name="gender" id="femaleGender" value="female" />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="gender"  id="maleGender" value="male" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="gender" id="otherGender" value="others" />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <input type="text" id="form3Example1n"  class="form-control form-control-lg" name="city" />
                                        <label class="form-label" for="form3Example1n">City</label>
                                    </div>
                                    {{-- <div class="col-md-6 mb-4">
                                        <select data-mdb-select-init>
                                            <option value="1">City</option>
                                            <option value="2">Option 1</option>
                                            <option value="3">Option 2</option>
                                            <option value="4">Option 3</option>
                                        </select>
                                    </div> --}}
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form3Example8" class="form-control form-control-lg" name="address" />
                                    <label class="form-label" for="form3Example8">Address</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form3Example9" class="form-control form-control-lg" name="email" />
                                    <label class="form-label" for="form3Example9">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="number" id="form3Example90" class="form-control form-control-lg" name="phone" />
                                    <label class="form-label" for="form3Example90">Phone</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form3Example99" class="form-control form-control-lg" name="course" />
                                    <label class="form-label" for="form3Example99">Course</label>
                                </div>

                           
                                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                    <h6 class=" me-4" style="margin-bottom: 18px;">Time Table: </h6>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="time_table" id="femaleGender" value="Weekdays" />
                                        <label class="form-check-label" for="femaleGender">Weekdays Classes</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="time_table" id="maleGender" value="Weekend" />
                                        <label class="form-check-label" for="maleGender">Weekend Classes</label>
                                    </div>
                                    
                                </div>

                                <div class="d-flex justify-content-end pt-3">
                                    {{-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg">Reset all</button> --}}
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2" style="background-color: #f3703b">Submit form</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    {{-- </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
        
@endsection