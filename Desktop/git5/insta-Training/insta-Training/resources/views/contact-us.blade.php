@extends('layouts.app')
@section('content')
 <!--Banner Wrap Start-->
 <div class="kf_inr_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--KF INR BANNER DES Wrap Start-->
                <div class="kf_inr_ban_des">
                    <div class="inr_banner_heading">
                        <h3>contact us 2</h3>
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

<!--Banner Wrap End-->

<!--Content Wrap Start-->
<div class="kf_content_wrap">
    <!--LOCATION MAP Wrap Start-->
    {{-- <div class="kf_location_wrap overlay">
        <div id="map-canvas" class="map-canvas"></div>
        <div class="location_des">
            <h6>University of Education</h6>
            <p>Sed ut imperdiet nisi. Proin condimen nunc Etiam pharetra, erat sed fermentu</p>
            <ul class="location_meta">
                <li><i class="fa fa-phone"></i> <a href="#">+ (54) 456 789 4569</a></li>
                <li><i class="fa fa-map-marker"></i>  P.O.Box 15468, New York City, USA</li>
                <li><i class="fa fa-envelope-o"></i>  <a href="#"> Info@info.com</a></li>
            </ul>
            <a href="#">Contct Us Now and Get Started <i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div> --}}
    <!--LOCATION MAP Wrap END-->
    <section>
        <div class="container">
            <!--CONTACT HEADING Start-->
            <div class="row">
                <div class="col-md-12">
                    <div class="contact_2_headung">
                        <h3>Get In Touch</h3>
                        <p>We’re here to assist you with any queries. Feel free to reach out if you have questions about our services or want to learn more about what we offer. Our dedicated team is ready to provide you with the information and support you need. Contact us today and experience our commitment to exceptional learning services! </p>
                    </div>
                </div>
            </div>
            <!--CONTACT HEADING END-->
            <div class="contct_wrap">
                <div class="row">
                    <div class="col-md-8">
                        <form>
                            <div class="contact_des">
                                <h4>Contact Form</h4>
                                <div class="inputs_des des_2">
                                    <input type="text" placeholder="Name"><i class="fa fa-user"></i>
                                </div>

                                <div class="inputs_des des_2">
                                    <input type="text" placeholder="E-mail">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="inputs_des des_2">
                                    <input type="text" placeholder="Phone">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="inputs_des des_3">
                                    <textarea></textarea>
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="inputs_des des_2">
                                    <button>Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="contact_heading">
                            <h4>INSTA Training Institute</h4>
                            <p>Pakistan’s fastest growing to be no. 1 IT training Institute.
                                .</p>
                        </div>
                        <ul class="contact_meta">
                            <li><i class="fa fa-home"></i>4th Floor ChenOne Tower, Abdali Road, Multan. </li>
                            <li><i class="fa fa-phone"></i><a href="#">03-166-931-399</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">enrollments@instatrainings.com</a></li>
                        </ul>
                        <div class="contact_heading social">
                            <h4>Get Social</h4>
                        </div>
                        <ul class="cont_socil_meta">
                            <li><a href="https://www.linkedin.com/company/insta-trainings/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/instatrainings_" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.facebook.com/instatrainings1" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--Content Wrap End-->
@endsection
