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
								<h3>about us</h3>
                        	</div>
                           
                            <div class="kf_inr_breadcrumb">
								<ul>
									<li><a href="{{route('welcome')}}">Home</a></li>
									<li><a href="{{route('about-us')}}">about us</a></li>
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
    				
    		<!--ABOUT UNIVERSITY START-->
    		<section>
    			<div class="container">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="abt_univ_wrap">
								<!-- HEADING 1 START-->
								<div class="kf_edu2_heading1">
									<h5>About Our Institute </h5>
									<h3>Step into Insta Trainings Institute.</h3>
								</div>
								<!-- HEADING 1 END-->

								<div class="abt_univ_des">

									<span>Our institute is dedicated to furnishing students with the skills and knowledge needed to excel in the ever-evolving tech industry. We offer multifarious courses, from programming and cybersecurity to data analytics and cloud computing, all taught by industry experts.</span>
									<p> At INSTA Trainings, we make sure our students are all set for work as soon as they finish, that's only possible by our hands-on approach and top-notch facilities. We believe in promoting a learning environment that encourages invention, creativity, and continuous growth.</p>
									{{-- <a href="#" class="btn-3">Know More</a> --}}

								</div>
    						</div>
    					</div>

    					<div class="col-md-6">
    						<div class="abt_univ_thumb">
    							<figure>
    								<img src="{{asset('asset/extra-images/abt-thumb.jpg')}}" alt=""/>
    							</figure>
    						</div>
    					</div>

    				</div>
    			</div>
    		</section>
    		<!--ABOUT UNIVERSITY END-->

    		<!--COUNTER SECTION START-->
			<section class="edu2_counter_wrap">
				<div class="container">
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class="icon-group2"></i></span>
						<h3 class="counter">10,000</h3>
						<h5>FOLLOWERS</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class="icon-book236"></i></span>
						<h3 class="">70+</h3>
						<h5>Courses</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class="icon-win5"></i></span>
						<h3 class="counter">10,00</h3>
						<h5>STUDENTS</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class="icon-user255"></i></span>
						<h3 class="">50+</h3>
						<h5>CERTIFIED TEACHERS</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
				</div>
			</section>
			<!--COUNTER SECTION END-->

			<!--KF INTRO WRAP START-->
			<section class="abut-padiing">
				<div class="kf_intro_des_wrap aboutus_page">
					<div class="container">
						<div class="row">
							<!-- HEADING 2 START-->
							<div class="col-md-12">
								<div class="kf_edu2_heading2">
									<h3>our courses</h3>
								</div>
							</div>
							<!-- HEADING 2 END-->

							<div class="col-md-3 col-sm-6">
								<!-- INTERO DES START-->
								<div class="kf_intro_des">
									<div class="kf_intro_des_caption">
										<span><i class=" icon-earth132 "></i></span>
										<h6>Development Courses</h6>
										<p>Entrust your future with the top development skills of INSTA Training. </p>
										{{-- <a href="#">view more</a> --}}
									</div>
								</div>
								<!-- INTERO DES END-->
							</div>

							<div class="col-md-3 col-sm-6">
								<!-- INTERO DES START-->
								<div class="kf_intro_des">
									<div class="kf_intro_des_caption">
										<span><i class=" icon-educational18"></i></span>
										<h6>Cybersecurity & Networking Courses</h6>
										<p>Secure Your Career with Expert Cybersecurity & Networking Training.</p>
										{{-- <a href="#">view more</a> --}}
									</div>
								</div>
								<!-- INTERO DES END-->
							</div>

							<div class="col-md-3 col-sm-6">
								<!-- INTERO DES START-->
								<div class="kf_intro_des">
									<div class="kf_intro_des_caption">
										<span><i class="icon-teacher4"></i></span>
										<h6>Art & Design Courses</h6>
										<p>Turn creativity into masterpieces with our Art & Design courses.</p>
										{{-- <a href="#">view more</a> --}}
									</div>
								</div>
								<!-- INTERO DES END-->
							</div>

							<div class="col-md-3 col-sm-6">
								<!-- INTERO DES START-->
								<div class="kf_intro_des">
									<div class="kf_intro_des_caption">
										<span><i class="fa fa-globe"></i></span>
										<h6>Marketing Courses</h6>
										<p>Enrich your professional orbit with the latest marketing strategies and techniques.</p>
										{{-- <a href="#">view more</a> --}}
									</div>
								</div>
								<!-- INTERO DES END-->
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--KF INTRO WRAP END-->

			<!--KF EDUCATION STUDENT SLIDER WRAP START-->
			<section class="edu_student_wrap_bg">
				<div class="container">
					<div class="student_slider_wrap">
						<div class="row">
							<div class="col-md-6">
								<ul class="bxslider">
									<li>
										<!-- STUDENT SLIDER DES START-->
										<div class="student_slider_des">
											<!-- HEADING 1 START-->
											<div class="kf_edu2_heading1">
												<h3>Our Future Plans</h3>
											</div>
											<!-- HEADING 1 END-->
											<p>Looking ahead, INSTA TRAININGS is committed to expanding our course offerings and including the latest advancements in technology. We aim to enrich our online learning platform, making high-quality IT education accessible to learners nationwide. By continuously evolving and adapting, we strive to stay at the forefront of the industry, ensuring our students are always ahead of the curve.
											Join us and take the first step towards a successful and rewarding career in IT.
												</p>
											{{-- <div class="std_name_des">
												<a href="#">Roslin Miriyam</a>
												<small>Regular Student</small>
											</div>
										</div> --}}
										<!-- STUDENT SLIDER DES END-->
									</li>

									{{-- <li>
										<!-- STUDENT SLIDER DES START-->
										<div class="student_slider_des">
											<!-- HEADING 1 START-->
											<div class="kf_edu2_heading1">
												<h3>Waht Our Students Says</h3>
											</div>
											<!-- HEADING 1 END-->
											<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
											<div class="std_name_des">
												<a href="#">Roslin Miriyam</a>
												<small>Regular Student</small>
											</div>
										</div>
										<!-- STUDENT SLIDER DES END-->
									</li> --}}

									{{-- <li>
										<!-- STUDENT SLIDER DES START-->
										<div class="student_slider_des">
											<!-- HEADING 1 START-->
											<div class="kf_edu2_heading1">
												<h3>Waht Our Students Says</h3>
											</div>
											<!-- HEADING 1 END-->
											<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
											<div class="std_name_des">
												<a href="#">Roslin Miriyam</a>
												<small>Regular Student</small>
											</div>
										</div>
										<!-- STUDENT SLIDER DES END-->
									</li> --}}

									{{-- <li>
										<!-- STUDENT SLIDER DES START-->
										<div class="student_slider_des">
											<!-- HEADING 1 START-->
											<div class="kf_edu2_heading1">
												<h3>Waht Our Students Says</h3>
											</div>
											<!-- HEADING 1 END-->
											<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
											<div class="std_name_des">
												<a href="#">Roslin Miriyam</a>
												<small>Regular Student</small>
											</div>
										</div>
										<!-- STUDENT SLIDER DES END-->
									</li> --}}
								</ul>
							</div>

							<div class="col-md-6">
								<!-- STUDENT SLIDER THUMB DES START-->
								<div class="student_slider_thumb">
									<div class="row">
										<div id="bx-pager">
											<div class="col-md-6 col-sm-3">
												<a data-slide-index="0" href=""><img src="{{asset('asset/extra-images/student-1.jpg')}}" alt="#" /></a>
											</div>

											<div class="col-md-6 col-sm-3">
												<a data-slide-index="1" href=""><img src="{{asset('asset/extra-images/student-2.jpg')}}" alt="#" /></a>
											</div>

											<div class="col-md-6 col-sm-3">
												<a data-slide-index="2" href=""><img src="{{asset('asset/extra-images/student-3.jpg')}}" alt="#" /></a>
											</div>
											<div class="col-md-6 col-sm-3">
												<a data-slide-index="3" href=""><img src="{{asset('asset/extra-images/student-4.jpg')}}" alt="#" /></a>
											</div>
										</div>
									</div>
								</div>
								<!-- STUDENT SLIDER THUMB DES END-->
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--KF EDUCATION STUDENT SLIDER WRAP END-->

			<!-- FACULTY WRAP START-->
			<section>
				<div class="container">
					<div class="row">
						<!-- HEADING 1 START-->
						<div class="col-md-12">
							<div class="kf_edu2_heading1">
								<h3>Faculty member</h3>
							</div>
						</div>
						<!-- HEADING 1 END-->

						<!-- FACULTY SLIDER WRAP START-->
						<div class="edu2_faculty_wrap">
							<div id="owl-demo-8" class="owl-carousel owl-theme">
								<div class="item">
									<!-- FACULTY DES START-->
									<div class="edu2_faculty_des">
										<figure><img src="extra-images/faculty-mb1.jpg" alt=""/>
											<figcaption>
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</figcaption>
										</figure>
										<div class="edu2_faculty_des2">
											<h6><a href="#">Mr. Umair Wahab </a></h6>
											<strong>Expert Graphic Designer </strong>
											<p>Passionate about transforming ideas into visually spectacular designs that captivate and inspire.</p>
										</div>
									</div>
									<!-- FACULTY DES END-->
								</div>

								<div class="item">
									<!-- FACULTY DES START-->
									<div class="edu2_faculty_des">
										<figure><img src="extra-images/faculty-mb2.jpg" alt=""/>
											<figcaption>
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</figcaption>
										</figure>
										<div class="edu2_faculty_des2">
											<h6><a href="#">Mr. Kamran Yasin</a></h6>
											<strong>Content Writer</strong>
											<p>Transforming ideas into captivating stories that leave a lasting impact.</p>
										</div>
									</div>
									<!-- FACULTY DES END-->
								</div>

								<div class="item">
									<!-- FACULTY DES START-->
									<div class="edu2_faculty_des">
										<figure><img src="extra-images/faculty-mb3.jpg" alt=""/>
											<figcaption>
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</figcaption>
										</figure>
										<div class="edu2_faculty_des2">
											<h6><a href="#">Mr. Haseeb Aleem</a></h6>
											<strong>Full stack developer</strong>
											<p>Reserved to crafting full-bodied, user-centric webs & apps that empower businesses in digital means.</p>
										</div>
									</div>
									<!-- FACULTY DES END-->
								</div>

								

								<div class="item">
									<!-- FACULTY DES START-->
									<div class="edu2_faculty_des">
										<figure><img src="extra-images/faculty-mb1.jpg" alt=""/>
											<figcaption>
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</figcaption>
										</figure>
										<div class="edu2_faculty_des2">
											<h6><a href="#">Miss Iman Arif</a></h6>
											<strong>E-Com Instructor</strong>
											<p>Guiding desiring e-commerce leaders through practical insights and strategic mastery.</p>
										</div>
									</div>
									<!-- FACULTY DES END-->
								</div>
								<div class="item">
									<!-- FACULTY DES START-->
									<div class="edu2_faculty_des">
										<figure><img src="extra-images/faculty-mb1.jpg" alt=""/>
											<figcaption>
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</figcaption>
										</figure>
										<div class="edu2_faculty_des2">
											<h6><a href="#">Mr. Umair Wahab</a></h6>
											<strong>Expert Graphic Designer </strong>
											<p>Passionate about transforming ideas into visually spectacular designs that captivate and inspire.</p>
										</div>
									</div>
									<!-- FACULTY DES END-->
								</div>
							</div>
						</div>
						<!-- FACULTY SLIDER WRAP END-->
					</div>
				</div>
			</section>
@endsection
