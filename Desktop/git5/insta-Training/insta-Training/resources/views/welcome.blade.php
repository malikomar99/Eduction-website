@extends('layouts.app')
@section('content')
<style>
    #art-and-design-path-1, #art-and-design-path-2, #art-and-design-path-3{
        fill: #2dc1bc;
    }
    #cyber-security-path-1{
        fill: #fd7e14;
        
    }
    #Development-path-1{
        fill: #20c997;
        
    }
    #marketing-path-1{
        fill: #0dcaf0;
        
    }
    #E-commerce-path-1{
        fill: #2dc1bc;
        
    }
    #business-path-1{
        fill: #6f42c1;
        
    }
    #kids-path-1{
        fill: #fd7e14;
        
    }
    #female-path-1{
        fill: #2dc1bc;
        
    }
    #multimedia-path-1{
        fill: #20c997;
        
    }
    #language-path-1{
        fill: #2dc1bc;
        
    }
             #language-path-1:hover,
            #multimedia-path-1:hover,
            #female-path-1:hover,
            #kids-path-1:hover,
            #business-path-1:hover,
            #E-commerce-path-1:hover,
            #marketing-path-1:hover,
            #Development-path-1:hover,
            #cyber-security-path-1:hover,
            #art-and-design-path-1:hover,
            #art-and-design-path-2:hover,
            #art-and-design-path-3:hover {
                fill: white; /* Change fill color on hover */
            }
</style>
<div class="edu2_main_bn_wrap">
    <div id="owl-demo-main" class="owl-carousel owl-theme">
        <div class="item">
            <figure>
                <img src="{{asset('asset/extra-images/slider1.jpg')}}" alt=""/>
                <figcaption>
                    <span>Pakistan’s fastest-growing to be No. 1 IT Training Institute </span>
                    <h2>INSTA TRAINING CENTER</h2>
                    <p>Institute and department of information technology and telecommunication network</p>
                    {{-- <a href="#" class="btn-1">read more</a> --}}
                </figcaption>
            </figure>
        </div>
        <div class="item">
            <figure>
                <img src="{{asset('asset/extra-images/slider2.jpg')}}" alt=""/>
                <figcaption>
                    <span>Opening A New World Of Education</span>
                    <h2>largest Education Institute</h2>
                    <p>We are the largest education online institute.</p>
                    <a href="#" class="btn-1">read more</a>
                </figcaption>
            </figure>
        </div>
        <div class="item">
            <figure>
                <img src="{{asset('asset/extra-images/slider3.jpg')}}" alt=""/>
                <figcaption>
                    <span>New Online Courses</span>
                    <h2>We bring new online courses</h2>
                    <p>Largest Online Courses available here.</p>
                    <a href="#" class="btn-1">read more</a>
                </figcaption>
            </figure>
        </div>
    </div>
</div>


<div class="kf_content_wrap">
    <!--COURSE OUTER WRAP START-->
    <div class="kf_course_outerwrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--COURSE CATEGORIES WRAP START-->
                    <div class="kf_cur_catg_wrap">
                        <!--COURSE CATEGORIES WRAP HEADING START-->
                        <div class="col-md-12">
                            <div class="kf_edu2_heading1">
                                <h3>Our Courses</h3>
                            </div>
                        </div>
                        <!--COURSE CATEGORIES WRAP HEADING END-->

                        <!--ROW 1 START-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-1">
                                    {{-- <span><i class="fas fa-code"></i></span> --}}
                                    <span><svg id="Development" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" style="    height: 57px;">
                                        <path id="Development-path-1" d="M243.88,46.39c-10.22-2.99-20.93,2.99-23.91,13.31l-77.14,270.01c-2.99,10.22,2.99,20.93,13.31,23.91,10.22,2.99,20.93-2.99,23.91-13.31L257.18,70.3c2.89-10.22-3.09-20.93-13.31-23.91h0Zm48.6,72.42c-7.52,7.52-7.52,19.77,0,27.29l53.81,53.9-53.9,53.9c-7.52,7.52-7.52,19.77,0,27.29s19.77,7.52,27.29,0l67.5-67.5c7.52-7.52,7.52-19.77,0-27.29l-67.5-67.5c-7.52-7.52-19.77-7.52-27.19-.1h0Zm-184.86,0c-7.52-7.52-19.77-7.52-27.29,0L12.83,186.31c-7.52,7.52-7.52,19.77,0,27.29l67.5,67.5c7.52,7.52,19.77,7.52,27.29,0s7.52-19.77,0-27.29l-53.9-53.81,53.9-53.9c7.52-7.52,7.52-19.77,0-27.29h0Z"/>
                                      </svg></span>
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Development Courses</h5>
                                        <p>Entrust your future with the top development skills of INSTA Training.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-2">
                                    <span>
                                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" style="    height: 57px;">
                                            <path id="cyber-security-path-1" d="M332.13,137.63c-1.22,31.6-6.05,62.47-18.18,91.91-16.67,40.44-44.31,71.68-80.68,95.42-8.52,5.56-17.55,10.33-26.37,15.41-4.82,2.78-9.56,2.53-14.52-.05-25.55-13.26-48.82-29.55-68.5-50.75-25.12-27.05-41.12-58.83-49.4-94.65-5.39-23.34-7.34-47.04-7.19-70.94,.05-7.23,5.02-12.83,12.42-12.93,40.93-.55,75.88-17.34,108.9-39.55,.59-.4,1.17-.81,1.75-1.22,7.3-5.06,11.43-5.13,18.78,.06,15.16,10.69,31.16,19.85,48.28,27.02,19.51,8.17,39.61,13.59,60.96,13.6,8.67,0,13.75,5.51,13.75,14.22,0,4.15,0,8.3,0,12.45Zm-132.68,124.7h0c8.78-.01,17.56,.11,26.33-.04,11.4-.2,20.68-9.26,20.83-20.6,.21-15.65,.18-31.31,0-46.97-.08-6.93-3.07-12.81-8.95-16.51-3.05-1.92-3.82-3.95-3.89-7.31-.42-22.75-19.73-37.81-41.94-32.89-16.31,3.61-26.18,16.35-26.23,34.16,0,2.54-.68,3.92-2.89,5.3-6.63,4.13-9.94,10.34-9.97,18.16-.06,14.94-.07,29.89,0,44.83,.06,12.58,9.23,21.75,21.8,21.85,8.3,.06,16.61,.01,24.91,.01Z"/>
                                            <path id="cyber-security-path-1" d="M89.6,344.33c-16.18,11.42-32.32,5.29-40.06-3.96-9.04-10.8-8.89-26.84,.54-37.51,9.26-10.47,25.01-12.61,36.89-5.02,13.08,8.37,16.3,23,8.6,40.17,1.12,.85,2.28,1.79,3.51,2.65,35.09,24.8,74.15,36.02,116.82,31.29,66.74-7.41,114.46-42.45,142.49-103.32,15.71-34.11,18.21-70.07,10.43-106.76-.15-.69-.32-1.38-.44-2.08-.47-2.71,.38-4.85,3.2-5.45,2.85-.61,4.56,1.1,5.11,3.72,1.11,5.21,2.32,10.43,2.96,15.71,7.37,60.91-9.97,113.7-53.94,156.6-37.04,36.14-82.31,52.73-134.06,50.88-36.16-1.29-68.87-13.03-98.23-34.13-1.25-.89-2.48-1.81-3.81-2.77Z"/>
                                            <path id="cyber-security-path-1" d="M290.26,52.11c-10.14-6.35-20.78-11.44-31.96-15.39C160.62,2.21,56.35,58.37,31.32,159.03c-5.77,23.21-6.23,46.68-2.36,70.26,.71,4.33-.2,6.28-2.97,6.82-2.98,.59-4.73-1.08-5.43-5.44-7.41-46.41,.78-89.85,26.43-129.29C76.88,55.42,119.51,28.12,173.66,19.94c41.99-6.35,81.61,1.79,118.33,23.28,2.42,1.42,3.81,1.43,6.08-.4,9.72-7.83,23.73-7.06,32.89,1.51,9.27,8.67,10.8,22.61,3.63,33.07-7.05,10.28-20.59,13.95-31.85,8.63-11.36-5.36-17.16-18.03-13.72-30.01,.36-1.24,.78-2.46,1.24-3.91Z"/>
                                            <path id="cyber-security-path-1" d="M174.3,173.84c-1.35-16.05,9.72-28.25,25.39-28.26,15.68,0,26.68,12.11,25.42,28.26h-50.81Z"/>
                                            <path id="cyber-security-path-1" d="M199.57,239.56c-10.74,0-11.79-1.26-9.77-11.82,.6-3.13,1.28-6.25,1.94-9.37,.68-3.23,1.22-6.25-.56-9.57-1.82-3.39-.19-7.74,2.87-10.13,3.04-2.37,7.38-2.55,10.63-.45,3.19,2.05,5.49,6.29,3.85,9.46-2.73,5.27-.83,10.1,.06,15.1,.52,2.91,1.24,5.78,1.73,8.69,.93,5.53-1.22,8.02-6.85,8.08-1.3,.01-2.6,0-3.91,0Z"/>
                                        </svg>
                                    </span>
                                    {{-- <span><i class="fas fa-shield-alt"></i></span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Cybersecurity & Networking Courses</h5>
                                        <p>Secure Your Career with Expert Cybersecurity & Networking Training.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-3">


                            <span>        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400; height: 58px;" xml:space="preserve">
                                    <g>
                                        <path id="art-and-design-path-1" d="M11,241.5C11.1,155.1,67.9,79.2,151,56c59.8-16.7,115.4-6.2,166.3,29.3c2.7,1.9,3.2,3.3,1.7,6.4
                                            c-20.8,44.7-41.5,89.4-61.9,134.2c-2.6,5.6-3.3,12-5.1,18c-0.4,1.3-1.4,3-2.6,3.4c-12.6,5-22,13.4-28.2,25.5
                                            c-0.6,1.2-1.9,2.4-3.2,2.9c-26.5,10.7-47.5,28-63.7,51.6c-14.2,20.6-34,31.9-59,32.6c-32,0.9-59.3-17.8-71-47.6
                                            C15.4,289.5,11,265.9,11,241.5z M121.9,241.3c0.2-17.8-14.8-32.9-32.7-33c-18-0.1-32.9,14.6-33.1,32.7c-0.2,17.9,14.5,33,32.6,33.2
                                            C106.7,274.4,121.7,259.6,121.9,241.3z M97.3,146.6c0,18.2,14.6,32.9,32.7,32.9c18.3,0,33-14.7,33-33c0-18.1-14.8-32.7-32.9-32.7
                                            C111.8,113.9,97.3,128.4,97.3,146.6z M261.7,117.8c0-18-14.9-32.9-32.9-32.9c-18.1,0-32.8,14.7-32.8,32.8
                                            c-0.1,18.1,14.6,33,32.6,33.1C246.8,150.9,261.7,136.1,261.7,117.8z"/>
                                        <path id="art-and-design-path-2" d="M290,269.1c8.5,8.2,13,17.7,11.7,29c-0.6,5.3-2.3,10.9-4.8,15.6c-13.3,25.4-34.3,40.6-62.4,46.1c-1.3,0.3-2.8,0.2-4.1,0.3
                                            c-0.2-0.5-0.3-0.7-0.3-0.9c5.1-13.1,4.4-26.4,1.8-39.8c-2.3-11.9-2.2-23.7,2.2-35.3c6.4-16.5,20.6-25.1,38.3-23c0.5,0.1,1,0,1.7,0
                                            c-1.3-2.2-2.6-4.1-3.5-6.1c-3.3-7.1-2.6-14.1,0.7-21.2c21.1-45.5,42.1-91,63.1-136.6c7.4-16.1,14.8-32.2,22.3-48.2
                                            c3-6.5,8.6-9.7,15.5-9.1c6,0.4,11.8,4.7,13,10.8c0.7,3.6,0.4,7.8-0.8,11.2c-14.6,40.4-29.5,80.7-44.4,121
                                            c-8,21.8-16,43.6-24.1,65.3C310.4,263.3,306.3,266.7,290,269.1z"/>
                                        <path id="art-and-design-path-3" d="M371.4,145.5c19.8,31.6,24.9,62.6,4.9,93.1c-11.8,18-29.1,28.2-50.3,31.7c-0.7,0.1-1.5,0.1-2.2,0.1
                                            c10.2-19.4,16-40.4,23.8-60.7c7.8-20.3,15.1-40.9,22.7-61.3C370.6,147.6,370.9,146.8,371.4,145.5z"/>
                                    </g>
                                    </svg>

                            </span>
                                    {{-- <span><img src="{{asset('asset/svg/Art and design courses.svg') }}" alt="Logo" class="art-and-design"  height="50px"></span> --}}
                                        {{-- <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="{{env('APP_URL')}}/asset/svg/Art and design courses.svg">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" fill="#fff"/>
                                          </svg> --}}
                                          
                                    {{-- <span><i class="fas fa-palette"></i>                                    </span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Art & Design Courses</h5>
                                        <p>Turn creativity into masterpieces with our Art & Design courses.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ROW 1 END-->

                        <!--ROW 2 START-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-4">
                                    <span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400; height: 57px;" xml:space="preserve">
                                   <g>
                                       <path id="marketing-path-1" d="M283.1,8c9.5,3.2,12.8,10,12.8,19.9c-0.2,94.1-0.1,188.2-0.1,282.3c0,9-4.5,15.4-12,17.3c-10.1,2.5-19.2-4.4-20-15.2
                                           c-0.4-4.7-0.4-9.5-1.4-14.1c-4.4-22-18.6-35.5-38.8-43.4c-13.2-5.1-27-6.8-41.1-6.8c-36.5,0-73.1,0.1-109.6,0
                                           c-31.5-0.1-57.1-21.1-63.4-52c-0.4-2.1-0.9-4.2-0.9-6.3c0.1-15.6-0.8-31.3,0.7-46.8c2.8-29.3,29.5-54,58.9-54.5
                                           c37.9-0.7,75.8-0.2,113.8-0.3c13.3,0,26.4-1.4,39-5.9c18.9-6.7,33.6-18,39.8-38c1.6-5.3,2.7-11,2.8-16.5
                                           c0.1-9.6,3.6-16.3,12.8-19.7C278.6,8,280.8,8,283.1,8z"/>
                                       <path id="marketing-path-1" d="M123.6,392c-7.6-1.8-14.8-4.2-21-9.2c-5.2-4.2-9.4-9.3-12.2-15.4c-13.1-29.2-26.2-58.5-39.3-87.7c-0.2-0.5-0.4-1.1-0.6-1.7
                                           c28.4,4,56.8,1.5,85.2,2.1c2.5,0.1,3.7,0.8,4.7,3.1c7.8,17.3,15.7,34.5,23.5,51.8c11.4,25.1-1.8,51-28.6,56.6
                                           c-0.5,0.1-0.9,0.4-1.3,0.6C130.6,392,127.1,392,123.6,392z"/>
                                       <path id="marketing-path-1" d="M391.6,91.2c-2,6.4-6.4,10.3-12.4,13c-9.2,4.2-18.1,9-27.1,13.5c-9.2,4.5-18.6,1.8-22.7-6.7c-4.1-8.3-0.7-17.4,8.3-21.9
                                           c9.7-4.9,19.4-9.7,29.1-14.5c10.9-5.4,19.7-2,24.3,9.3c0.1,0.2,0.3,0.3,0.5,0.5C391.6,86.8,391.6,89,391.6,91.2z"/>
                                       <path id="marketing-path-1" d="M391.6,251.8c-0.4,0.9-0.9,1.7-1.3,2.6c-3.7,8.2-12.9,12.1-21,8.3c-11.3-5.3-22.4-10.9-33.4-16.7
                                           c-7.7-4.1-10.3-13.4-6.4-21c3.8-7.6,12.9-11.1,20.7-7.4c11.1,5.3,22.1,10.9,33.1,16.5c4.5,2.3,6.7,6.5,8.3,11
                                           C391.6,247.2,391.6,249.5,391.6,251.8z"/>
                                       <path id="marketing-path-1" d="M391.6,171.5c-3.5,9.6-10.5,13.1-20.4,12.6c-9.1-0.4-18.2,0-27.3-0.1c-8.7-0.2-15.4-6.3-16-14.2
                                           c-0.7-8.6,4.6-15.9,12.9-17.5c2.2-0.4,4.5-0.3,6.7-0.3c8.1,0,16.2,0.3,24.3-0.1c9.9-0.5,16.5,3.4,19.8,12.8
                                           C391.6,167,391.6,169.2,391.6,171.5z"/>
                                   </g>
                                   </svg></span>
                                    {{-- <span> <i class="fas fa-chart-line"></i></span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Marketing Courses</h5>
                                        <p>Enrich your professional orbit with the latest marketing strategies and techniques.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-3">
                                    <span>
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400; height: 57px;" xml:space="preserve">
                                    <g>
                                        <path id="E-commerce-path-1" d="M85.3,12.7c2.6,0.8,5.3,1.4,7.9,2.3c18,5.9,30.6,21.9,32.2,40.8c0.1,1.2,0.3,2.4,0.5,3.7c1.9,0,3.4,0,5,0
                                            c69.2,0,138.5,0,207.7,0c25.1,0,43.8,15.9,47.9,40.8c1.2,7.5-0.4,14.8-1.9,22.1c-4.4,21.6-8.4,43.2-13.2,64.7
                                            c-7.1,31.5-33.6,55-65.7,59.1c-3.7,0.5-7.5,0.6-11.3,0.7c-46.7,0-93.5,0-140.2,0c-1.5,0-2.9,0-5,0c0.6,1.5,0.9,2.7,1.5,3.8
                                            c9.2,18.3,24.1,27.4,44.5,27.4c42.3,0,84.7,0,127,0c9.3,0,15.1,3.9,17.2,11.6c2.5,8.8-3.6,18.3-12.7,19.4c-1.6,0.2-3.2,0.3-4.7,0.3
                                            c-42.5,0-84.9,0.1-127.4,0c-37-0.1-67.6-22.7-76.8-57.7c-2.8-10.5-3.5-21.6-4.9-32.4c-2.2-17.8-4.2-35.5-6.3-53.3
                                            c-2.1-17.5-4.1-35.1-6.1-52.6C98.5,94.5,96.3,75.8,94,57c-0.9-7.4-7.4-12.9-14.9-13c-5.8-0.1-11.7,0-17.5,0
                                            c-8.9,0-15.6-4.9-17.1-12.4c-1.6-8.3,2.3-14.8,11.1-18.5c0.2-0.1,0.3-0.3,0.5-0.5C65.8,12.7,75.6,12.7,85.3,12.7z"/>
                                        <path id="E-commerce-path-1" d="M148.1,387.3c-2.5-0.9-5.1-1.6-7.5-2.7c-13.7-6.1-21.1-20.9-17.9-35.4c3.2-14.4,16.8-24.9,31.4-24.3
                                            c15.3,0.6,27.4,11.4,29.8,26.5c2.5,15.7-7.4,30.9-23,35c-0.9,0.2-1.8,0.6-2.7,0.9C154.9,387.3,151.5,387.3,148.1,387.3z"/>
                                        <path id="E-commerce-path-1" d="M288.3,387.3c-2.5-0.9-5.1-1.6-7.5-2.7c-13.7-6.1-21.1-20.9-17.9-35.4c3.2-14.4,16.8-24.9,31.4-24.3
                                            c15.3,0.6,27.4,11.4,29.8,26.5c2.5,15.7-7.4,30.9-23,35c-0.9,0.2-1.8,0.6-2.7,0.9C295.1,387.3,291.7,387.3,288.3,387.3z"/>
                                        <path id="E-commerce-path-1" d="M13,227.8c3.3-9.2,9.9-12.7,19.5-12.4c14.2,0.3,28.4,0,42.6,0.1c7.6,0.1,13.6,4.9,15.4,12.1c1.7,6.8-1.4,14.1-7.7,17.2
                                            c-2.4,1.2-5.3,1.8-8,1.9c-15.1,0.2-30.1,0-45.2,0.1c-7.7,0-12.9-3.5-15.8-10.6c-0.2-0.4-0.5-0.8-0.8-1.1
                                            C13,232.7,13,230.2,13,227.8z"/>
                                        <path id="E-commerce-path-1" d="M13,164.9c0.5-0.9,1-1.9,1.5-2.8c3-5.6,7.5-8.8,14-8.9c10.3-0.1,20.7,0,31,0c8.8,0,15.6,6.6,15.8,15.2
                                            c0.2,8.5-6.3,15.8-15.1,16c-10.7,0.3-21.4,0.3-32.1,0c-7.9-0.2-12.5-5.1-15.1-12.2C13,169.8,13,167.3,13,164.9z"/>
                                        <path id="E-commerce-path-1" d="M13,102.7c3.5-9.1,10.2-12.6,19.7-12.1c7.1,0.4,14.3-0.1,21.5,0.3c7.5,0.5,13,6.2,14,14c0.9,6.6-3.5,13.6-10.1,16.1
                                            c-1.5,0.5-3.1,0.9-4.6,0.9c-8.6,0.1-17.3,0.2-25.9,0c-7.6-0.3-11.8-5.3-14.6-11.8C13,107.6,13,105.1,13,102.7z"/>
                                    </g>
                                    </svg>
                                    </span>
                                    {{-- <span>  <i class="fas fa-shopping-cart"></i></span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>E-commerce Courses</h5>
                                        <p>Enrich your professional orbit with the latest e-commerce strategies and techniques.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-6">
                                    <span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400; height: 57px;" xml:space="preserve">
                                   <g>
                                       <path id="business-path-1" d="M28.2,8c9.6,3.5,12.7,10.5,12.6,20.4c-0.2,93.8-0.1,187.6-0.1,281.4c0,18.8,7.8,33.1,23.8,43c6.7,4.1,14.1,6.3,22,6.5
                                           c2,0,4,0.1,6,0.1c93,0,186.1,0.1,279.1-0.1c9.9,0,16.9,3.1,20.4,12.6c0,2.2,0,4.5,0,6.7c-3,8.2-8.4,12.8-17.6,12.8
                                           c-95.1-0.1-190.1,0-285.2-0.1c-5.9,0-12-0.6-17.8-1.9C34.1,380.8,8.8,349,8.8,310.7C8.7,216.4,8.8,122.1,8.6,27.8
                                           C8.6,18,12,11.2,21.5,8C23.7,8,26,8,28.2,8z"/>
                                       <path id="business-path-1" d="M392,26.7c-1.6,5.3-5.2,9.1-9,13c-27.7,27.5-55.2,55.2-82.9,82.8c-21.5,21.5-50.3,21.5-71.7,0.1
                                           c-10.5-10.5-21-21-31.5-31.5c-7.8-7.8-17.3-7.8-25.1-0.1c-18.4,18.3-36.7,36.7-55,55c-4.2,4.3-9.1,6.6-15.2,5.4
                                           c-6.1-1.2-10.4-4.8-12.3-10.8c-1.9-6.1-0.6-11.6,3.9-16.2c6.8-7,13.7-13.8,20.6-20.7c11.9-11.9,23.8-23.8,35.7-35.7
                                           c19.9-19.8,49.3-19.9,69.3-0.1c10.9,10.8,21.7,21.7,32.6,32.5c8.3,8.3,17.2,8.3,25.5,0c27.9-27.9,55.8-55.7,83.6-83.6
                                           c3.7-3.7,7.5-7.2,12.7-8.7c1.5,0,3,0,4.5,0c7.7,1.8,12.4,6.6,14.2,14.2C392,23.7,392,25.2,392,26.7z"/>
                                       <path id="business-path-1" d="M360,231.4c0,26.4,0.1,52.9,0,79.3c0,11.2-9.1,18.6-19.6,16.2c-6.6-1.5-11.6-7.3-12.1-14c-0.1-1.4-0.1-2.7-0.1-4.1
                                           c0-51.5,0-103,0-154.5c0-2.3,0-4.8,0.6-7c2.1-7.7,9.3-12.3,17.5-11.3c7.6,0.9,13.5,7.4,13.5,15.4c0.1,22.7,0.1,45.4,0.1,68.1
                                           C360,223.5,360,227.4,360,231.4z"/>
                                       <path id="business-path-1" d="M200.4,239.3c0,23.9,0,47.9,0,71.8c0,7.3-4.3,13.2-10.8,15.4c-6.3,2.1-13.6,0.4-17.4-5.2c-2-3-3.6-7.1-3.6-10.7
                                           c-0.2-47.4-0.2-94.7-0.1-142.1c0-9.9,7-16.9,16.2-16.8c9,0.1,15.7,7.2,15.7,16.9C200.4,192.2,200.4,215.7,200.4,239.3z"/>
                                       <path id="business-path-1" d="M88.7,255.8c0-18.8-0.1-37.6,0-56.5c0-6.6,3.3-11.5,9.3-14.2c5.9-2.7,11.7-1.9,16.8,2.3c3.4,2.8,5.3,6.5,5.6,11
                                           c0,0.9,0.1,1.7,0.1,2.6c0,36.4,0,72.8,0,109.2c0,8.5-4.5,14.7-11.8,16.6c-10.1,2.6-19.6-4.5-20-15c-0.1-4,0-8,0-12
                                           C88.7,285.2,88.7,270.5,88.7,255.8C88.7,255.8,88.7,255.8,88.7,255.8z"/>
                                       <path id="business-path-1" d="M248.3,263.4c0-15.9-0.1-31.9,0-47.8c0-8,5.6-14.4,13.3-15.7c7.1-1.3,14.6,2.7,17.2,9.6c0.9,2.4,1.4,5.1,1.4,7.6
                                           c0.1,31,0.1,62,0,93.1c0,10.1-7,17.4-16.2,17.3c-9.2-0.1-15.8-7.3-15.8-17.3C248.3,294.6,248.3,279,248.3,263.4z"/>
                                   </g>
                                   </svg></span>
                                    {{-- <span> <i class="fas fa-file-invoice-dollar"></i></span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Business and Accounts Courses</h5>
                                        <p>Lead your way to phenomenal success in business and accounting with brilliant excellence.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ROW 2 END-->

                        <!--ROW 3 START-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-3">
                                    <span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400; height: 57px;" xml:space="preserve">
                                   <g>
                                       <path id="language-path-1"  d="M175,22c0.5,0.2,1,0.5,1.5,0.7c14.3,3.5,23.5,14.8,23.5,29.6c0.1,30.2,0,60.5,0,90.7c0,17.7,0,35.5,0,53.2
                                           c0,1.1,0,2.3,0,3.9c-59.5,0-118.8,0-178.1,0c0-51,0-102,0-153c0.3-0.8,0.6-1.7,0.9-2.5c2.9-10.3,9.3-17.3,19.3-20.9
                                           c1.6-0.6,3.2-1,4.8-1.6C89.6,22,132.3,22,175,22z M125.3,143.4c14-16.7,21.3-36,23.8-57.5c4.7,0,9.1,0,13.5,0c0-6.2,0-12.2,0-18.6
                                           c-14.2,0-28.2,0-42.5,0c0-5.1,0-9.8,0-14.6c-6.3,0-12.1,0-18.4,0c0,4.9,0,9.5,0,14.8c-14.5,0-28.5,0-42.5,0c0,6.4,0,12.3,0,18.5
                                           c23.8,0,47.4,0,71.2,0c-2.3,17.1-7.9,32.3-19.8,46.1c-3.9-6.3-7.3-12-10.9-17.6c-0.6-0.9-1.3-2.5-2-2.5c-6.2-0.2-12.3-0.1-18.9-0.1
                                           c4.2,12,10.2,22.1,18,31.4c-11.7,7.2-24.3,9.5-37.4,9.9c0,6.3,0,12.3,0,18.4c19.1,0.1,36.4-4.7,51.9-15.5
                                           c15.6,10.8,32.7,15.6,51.6,15.4c0-6.3,0-12.2,0-18.3C149.5,153,136.9,150.6,125.3,143.4z"/>
                                       <path id="language-path-1"  d="M21.9,230c9.7,0,19.4,0,29.7,0c0,1.4,0,2.7,0,4.1c0,17.7,0,35.5,0,53.2c0,10.9,5.7,16.6,16.8,16.6c12.7,0,25.5,0,38.2,0
                                           c1.1,0,2.2-0.1,3.2-0.2c-7.1-7.2-14.2-14.3-21.1-21.3c7.3-7.2,14.2-14,21.4-21c0.4,0.4,1.3,1.1,2.1,1.9
                                           c11.2,11.1,22.3,22.3,33.4,33.4c13.3,13.4,13.3,31-0.1,44.4c-11.1,11.2-22.3,22.3-33.4,33.4c-0.7,0.7-1.5,1.4-2,1.9
                                           c-7-7-13.8-13.8-20.7-20.7c6.9-6.8,14-13.9,21.2-20.9c-0.1-0.4-0.3-0.7-0.4-1.1c-1.1,0-2.1,0-3.2,0c-13,0-26,0-38.9,0
                                           c-23.5,0-41.1-14.6-45.5-37.7c-0.1-0.4-0.4-0.8-0.6-1.2C21.9,273.1,21.9,251.5,21.9,230z"/>
                                       <path id="language-path-1"  d="M378.1,378c-59.5,0-118.6,0-178.1,0c0-1.4,0-2.6,0-3.8c0-47.5,0-95,0-142.5c0-19,12.5-31.6,31.6-31.6
                                           c38.4,0,76.7,0,115.1,0c18.8,0,31.4,12.6,31.4,31.3c0,47.6,0,95.3,0,142.9C378.1,375.4,378.1,376.6,378.1,378z M333.5,348.3
                                           c-3.7-16.3-7.4-32.2-11-48.1c-4-17.4-7.9-34.8-11.9-52.1c-1.8-7.7-5.8-13.9-13.6-16.8c-13.5-5.1-26.5,2.5-30.1,17.6
                                           c-6.9,29.4-13.9,58.8-20.8,88.2c-0.9,3.6-1.6,7.3-2.5,11.3c6.5,0,12.4-0.1,18.2,0c2.3,0.1,3.2-0.6,3.7-2.9c1.4-6.7,3-13.3,4.8-19.9
                                           c0.2-0.9,1.4-2.3,2.2-2.3c11.2-0.1,22.5-0.1,33.9-0.1c2,8.4,3.9,16.7,5.8,25.1C319.4,348.3,326.2,348.3,333.5,348.3z"/>
                                       <path id="language-path-1"  d="M290.1,138.7c-12.6-12.5-25.6-24.8-37.9-37.7c-10.6-11.1-10.5-28.5,0.3-39.7c12.3-12.8,25.1-25.1,37.4-37.3
                                           c6.8,6.9,13.7,13.8,20.6,20.8c-6.7,6.6-13.8,13.7-21.5,21.5c2,0.1,3.1,0.2,4.1,0.2c13.3,0,26.7,0,40,0
                                           c25.1,0.1,44.8,19.7,44.9,44.7c0.1,18.7,0,37.3,0,56c0,0.9,0,1.8,0,2.9c-10,0-19.6,0-29.8,0c0-1.4,0-2.6,0-3.8
                                           c0-17.8,0-35.7,0-53.5c0-10.7-5.8-16.5-16.6-16.5c-12.7,0-25.5,0-38.2,0c-1.1,0-2.3,0-3.4,0c7.2,7.3,14.3,14.4,21.3,21.4
                                           C303.9,125.1,297,131.9,290.1,138.7z"/>
                                       <path id="language-path-1"  d="M289.7,250.6c3.9,17.1,7.9,34.2,11.9,51.6c-8.7,0-17,0-26,0c4.1-17.3,8.2-34.4,12.2-51.6
                                           C288.5,250.6,289.1,250.6,289.7,250.6z"/>
                                   </g>
                                   </svg></span>
                                    {{-- <span> <i class="fas fa-language"></i></span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Language Courses</h5>
                                        <p>Gain the Confidence You Need to Express Yourself Effectively with our Comprehensive Language Courses.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-1">
                                    <span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400; height: 57px;" xml:space="preserve">
                                   <g>
                                       <path id="multimedia-path-1" d="M392,80.6c0,79.3,0,158.7,0,238c-0.2,1.1-0.6,2.1-0.7,3.2c-4.8,38.8-38.5,69.2-77.9,69.3c-75.3,0.3-150.7,0.3-226,0
                                           C44.4,391,9,355.5,8.8,312.6c-0.2-75.3-0.2-150.7,0-226c0.1-31.8,20.3-61.1,50-72.6c7-2.7,14.5-4,21.8-6c79.8,0,159.7,0,239.5,0
                                           c0.7,0.2,1.4,0.6,2.1,0.7c32.1,4.1,58.4,26.9,66.9,58.2C390.3,71.4,391,76,392,80.6z M120.3,199.7
                                           C120.3,199.7,120.3,199.7,120.3,199.7c0,14.5-0.2,28.9,0.1,43.4c0.4,26.6,28.9,44.6,52.7,33c29.2-14.3,58.2-29,87.2-43.5
                                           c6.5-3.3,11.5-8.3,15.1-14.6c10.5-18.9,3.2-42-16.4-51.9c-27.7-13.9-55.6-27.6-83.2-41.6c-26.3-13.3-55.3,4.3-55.4,33.7
                                           C120.3,172,120.3,185.8,120.3,199.7z"/>
                                       <path id="multimedia-path-1" d="M152.5,199.4c0-13.5,0-26.9,0-40.4c0-6.7,3.4-8.8,9.4-5.8c27.2,13.5,54.3,27.1,81.5,40.7c2.6,1.3,4.8,2.7,4.8,6
                                           c0,3.2-2.5,4.3-4.8,5.5c-27,13.5-54.1,27-81.1,40.5c-6.3,3.2-9.7,1-9.7-6.2C152.5,226.3,152.5,212.9,152.5,199.4z"/>
                                   </g>
                                   </svg></span>
                                    {{-- <span> <i class="fas fa-photo-video"></i></span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Multimedia Courses</h5>
                                        <p>Vent your creativity and captivate your audience with the power of multimedia proficiency.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_cur_catg_des color-2">
                                    <span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 400 400" style="enable-background:new 0 0 400 400; height: 57px;" xml:space="preserve">
                                   <g>
                                       <path id="kids-path-1" d="M218.6,220.2c1.4-5.4,2.5-10,3.7-14.7c-2.3-1.3-4.6-2.5-6.9-3.7c-18.4-10.6-30.6-26.1-36.6-46.5c-0.5-1.8-0.7-3.4-3.2-4
                                           c-10.3-2.5-17-10.7-17.8-21.1c-0.8-10.5,4.9-19.9,14.4-24.1c1.1-0.5,2.3-1,3.4-1.5c-3.7-45.5,32.6-84.4,77.7-84.7
                                           c46.5-0.3,82.7,39.8,78.8,84.8c6.7,2.2,12.1,6.2,15.3,12.8c6.7,13.8-0.5,29.9-15.3,34c-1.1,0.3-2.5,1.6-2.8,2.8
                                           c-6.6,23-20.6,39.6-41.9,50.3c-0.9,0.5-1.8,2.2-1.7,3.3c0.4,2.7,1.3,5.3,2.1,8c0.2,0.7,0.5,1.4,0.9,2.4c13.8,0,27.7-0.1,41.5,0
                                           c3.2,0,6.5,0.3,9.6,1.1c12.7,3.3,22,14.8,22,28c0.2,27,0.4,54,0,81c-0.4,27.9-24.2,51.3-52.1,51.9c-1.2,0-2.5,0-3.8,0
                                           c-78.4,0-156.8,0-235.2,0c-7,0-8.2-0.9-9.3-7.8c-4.9-31.7-9.8-63.5-14.7-95.2c-2.9-18.8-5.7-37.5-8.7-56.3c-0.9-6,1.3-8.8,7.4-8.8
                                           c54.9,0,109.8,0,164.7,0C215.5,212,216.9,213.3,218.6,220.2z M50.8,224.2c6.2,40.2,12.3,80,18.4,119.8c52.2,0,103.9,0,156,0
                                           c-6.2-40-12.3-79.9-18.4-119.8C154.7,224.2,103,224.2,50.8,224.2z M188,104.2c0,0.6-0.1,1.2-0.1,1.8c-0.2,8.3-0.2,8.3-8.5,10.2
                                           c-6,1.4-10,6.8-9.5,13c0.5,6,4.8,10.4,10.6,10.7c6.4,0.4,7.7,1.5,8.9,7.8c5.7,28.9,32,51.2,61.6,52.2c33.1,1.1,60.8-20.7,67.6-53.1
                                           c1.2-5.6,2.5-6.6,8.4-6.9c4.9-0.2,8.6-2.9,10.2-7.5c2.8-7.7-2.1-15.6-10.2-16.5c-5.3-0.6-6.9-2.4-7-7.7c0-1.4,0-2.9,0-4.4
                                           c-17.3-1.4-32.8-5.5-42.8-20.1C249.8,101.9,218.7,101.8,188,104.2z M289.7,368c6.8,0,14.1,0.3,21.3-0.1c19.3-1.1,35.8-16,38.2-35.2
                                           c1.2-9.2,0.6-18.7,0.8-28c0.1-2.8,0-5.6,0-8.4c-12.3,0-24.1,0-36,0c0,11.3,0,22.3,0,33.3c0,6.7-1.8,8.5-8.4,8.5
                                           c-21.6,0-43.2,0-64.9,0c-1.3,0-2.6,0-4.3,0c0.4,2.3,0.8,4.1,1.1,6c11.7,0,23-0.1,34.4,0c9.1,0.1,16.4,6.3,17.8,15.2
                                           C290.1,362.1,289.7,364.9,289.7,368z M233.9,209.4c-6.2,18.3-5.1,25.6,6.9,34.5c8.7,6.5,20.8,5.3,29.1-2c8.8-7.7,10-19.2,3.3-32.3
                                           C260.2,212.8,247.1,212.8,233.9,209.4z M253.7,368.1c5.7,0,11.5,0,17.2,0c4.3,0,7-2.6,7-6.2c-0.1-3.5-2.7-5.8-6.9-5.8
                                           c-11.4,0-22.7,0-34.1,0c-4.3,0-7,2.5-6.9,6.1c0.1,3.5,2.7,5.8,6.9,5.8C242.4,368.2,248.1,368.1,253.7,368.1z"/>
                                       <path id="kids-path-1" d="M151.8,284.1c0,10-8.2,18.1-18.2,18c-9.8-0.1-17.8-8.2-17.8-18.1c0-10,8.2-18.1,18.2-18
                                           C143.9,266.2,151.8,274.3,151.8,284.1z"/>
                                       <path id="kids-path-1" d="M253.7,182c-13.2-0.1-24.9-8.9-28.5-21.5c-1.1-3.9,0.2-7.1,3.6-8.2c3.3-1.1,6.3,0.6,7.8,4.5c3.1,8.4,9.3,13.1,17.3,13.1
                                           c7.9,0,14.2-4.7,17.3-13c1.5-3.9,4.4-5.7,7.8-4.5c3.4,1.2,4.8,4.3,3.6,8.2C278.9,173.3,267.1,182.1,253.7,182z"/>
                                       <path id="kids-path-1" d="M211.9,130.9c0-0.5,0-1,0-1.5c0.1-4.7,2.3-7.5,6-7.4c3.7,0,5.9,2.8,6,7.5c0,1.4,0.1,2.8,0,4.1c-0.2,3.8-2.6,6.3-6,6.3
                                           c-3.4,0-5.8-2.6-6-6.4C211.9,132.7,211.9,131.8,211.9,130.9z"/>
                                       <path id="kids-path-1" d="M295.9,131.1c0,0.8,0,1.5,0,2.3c-0.2,4-2.6,6.7-6.1,6.6c-3.4-0.1-5.7-2.6-5.8-6.5c-0.1-1.6-0.1-3.3,0-4.9
                                           c0.1-4,2.6-6.7,6.1-6.6c3.4,0.1,5.7,2.6,5.8,6.5C296,129.4,295.9,130.2,295.9,131.1z"/>
                                   </g>
                                   </svg></span>
                                    {{-- <span><i class="fa fa-video-camera"></i></span> --}}
                                    <div class="kf_cur_catg_capstion">
                                        <h5>Kids Courses</h5>
                                        <p>Inspire young minds with exciting and interactive educational activities tailored for kids.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--ROW 3 END-->

                    </div>
                    <!--COURSE CATEGORIES WRAP END-->
                </div>
            </div>
        </div>
    </div>
</div>

    <!--COURSE OUTER WRAP END-->
    <!--KF INTRO WRAP START-->
    <section class="kf_edu2_intro_wrap">
        <div class="kf_intro_des_wrap">
            <!-- HEADING 2 START-->
            <div class="col-md-12">
                <div class="kf_edu2_heading2">
                    <h3>Welcome To University of Education</h3>
                </div>
            </div>
            <!-- HEADING 2 END-->
            <!-- INTERO DES START-->
            <div class="kf_intro_des">
                <div class="kf_intro_des_caption">
                    <span><i class="icon-earth132"></i></span>
                    <h6>BOOKS & LIBRARY</h6>
                    <p>World Largest books and library center is here where you can study the latest trends of the education.</p>
                    <a href="#">view more</a>
                </div>
                <figure>
                    <img src="{{asset('asset/extra-images/intro-1.jpg')}}" alt=""/>
                    <figcaption><a href="#">Learn Courses Online</a></figcaption>
                </figure>
            </div>
            <!-- INTERO DES END-->
            <!-- INTERO DES START-->
            <div class="kf_intro_des">
                <div class="kf_intro_des_caption">
                    <span><i class="icon-educational18"></i></span>
                    <h6>Learn Courses Online</h6>
                    <p>World Largest books and library center is here where you can study the latest trends of the education.</p>
                    <a href="#">view more</a>
                </div>
                <figure>
                    <img src="{{asset('asset/extra-images/intro-2.jpg')}}" alt=""/>
                    <figcaption><a href="#">Learn Courses Online</a></figcaption>
                </figure>
            </div>
            <!-- INTERO DES END-->

            <!-- INTERO DES START-->
            <div class="kf_intro_des">
                <div class="kf_intro_des_caption">
                    <span><i class="icon-teacher4"></i></span>
                    <h6>Become a Instructor</h6>
                    <p>World Largest books and library center is here where you can study the latest trends of the education.</p>
                    <a href="#">view more</a>
                </div>
                <figure>
                    <img src="{{asset('asset/extra-images/intro-3.jpg')}}" alt=""/>
                    <figcaption><a href="#">Learn Courses Online</a></figcaption>
                </figure>
            </div>
            <!-- INTERO DES END-->
        </div>
    </section>
    <!--KF INTRO WRAP END-->
    <section>
        <div class="container">
            <div class="row">
                <!-- HEADING 1 START-->
                <div class="col-md-4">
                    <div class="kf_edu2_heading1">
                        <h3>Our Course</h3>
                    </div>
                </div>
                <!-- HEADING 1 END-->

                <!--EDU2 COURSES TAB WRAP START-->
                <div class="col-md-8">
                    <div class="kf_edu2_tab_wrap">
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Web Development" aria-controls="Web Development" role="tab" data-toggle="tab">Web Development </a></li>
                            <li role="presentation"><a href="#accounting" aria-controls="Networking" role="tab" data-toggle="tab">Networking</a></li>
                            <li role="presentation"><a href="#economics" aria-controls="Art and Design " role="tab" data-toggle="tab">Art and Design  </a></li>
                            <li role="presentation"><a href="#finance" aria-controls="Marketing " role="tab" data-toggle="tab">Marketing </a></li>
                            <li role="presentation"><a href="#technologies" aria-controls="Multimedia" role="tab" data-toggle="tab">Multimedia </a></li>
                            <li role="presentation"><a href="#management" aria-controls="Business and Accounts" role="tab" data-toggle="tab">Business and Accounts </a></li>
                            <li role="presentation"><a href="{{route('our-course')}}" aria-controls="other" role="tab" data-toggle="tab">Other</a></li>
                        </ul>

                    </div>
                    
                </div>
                <div class="kf_edu2_tab_des">
                    <div class="col-md-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="Web Development">
                                <!-- 1 Tab START  -->
                                <div class="row margin-bottom">
                                    <!-- EDU COURSES WRAP START -->			
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-2.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Full Stack Web-Development Course </a></h5>
                                                <strong>
                                                    <span>6 Months  </span>
                                                    <small>48 Lectures</small>
                                                </strong>
                                                <p>Our full-stack web development merges front-end and back-end skills to create user-friendly websites and applications for optimal user experience.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure> --}}
                                                {{-- <div class="edu2_cur_ftr_strip">
                                                    <h6>Sara Johnson</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Web Design and Development </a></h5>
                                                <strong>
                                                    <span>2.5 Months</span>
                                                    <small>20 Lectures</small>
                                                </strong>
                                                <p>Web Design and Development at INSTA Training Center corresponds creativity with technical expertise and enables you to compile a website that works perfectly.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft-2.jpg')}}" alt=""/>
                                                </figure> --}}
                                                {{-- <div class="edu2_cur_ftr_strip">
                                                    <h6>Johny Fisher</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-3.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Android App Development</a></h5>
                                                <strong>
                                                    <span>2 Months</span>
                                                    <small>16 Lectures</small>
                                                </strong>
                                                <p>Discover how to create groundbreaking apps and shape the future of mobile technology with our Android App Development course.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft-3.jpg')}}" alt=""/>
                                                </figure> --}}
                                                {{-- <div class="edu2_cur_ftr_strip">
                                                    <h6>Peter Parker</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                </div>
                                <div class="view-all">
                                    <a class="btn-3" href="{{route('our-course')}}">View All Cources</a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="accounting">
                                <!-- 2 Tab START  -->
                                <div class="row margin-bottom">
                                    <!-- EDU COURSES WRAP START -->			
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-2.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Advance Cybersecurity</a></h5>
                                                <strong>
                                                    <span>6 Months</span>
                                                    <small>48 Lectures</small>
                                                </strong>
                                                <p> Learn advanced cybersecurity techniques with our comprehensive course. Gain expertise in protecting networks, data, and systems from cyber threats.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure> --}}
                                                {{-- <div class="edu2_cur_ftr_strip">
                                                    <h6>Sara Johnson</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-3.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">CCNA & CCNP</a></h5>
                                                <strong>
                                                    <span>6 Months</span>
                                                    <small>48 Lectures</small>
                                                </strong>
                                                <p>Get essential networking skills and certifications with our CCNA & CCNP course to excel in today's IT industry. Master network fundamentals and advance your career with hands-on training and expert guidance.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure> --}}
                                                {{-- <div class="edu2_cur_ftr_strip">
                                                    <h6>Peter Parker</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">CISCO</a></h5>
                                                <strong>
                                                    <span>4 Months</span>
                                                    <small>32 Lectures </small>
                                                </strong>
                                                <p>Our CISCO Course offers comprehensive, hands-on training to master networking skills, preparing you for industry-recognized certifications and a successful IT career.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure> --}}
                                                {{-- <div class="edu2_cur_ftr_strip">
                                                    <h6>Johny Fisher</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                </div>
                                <div class="view-all">
                                    <a class="btn-3" href="{{route('our-course')}}">View All Cources</a>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="economics">
                                <!-- 2 Tab START  -->
                                <div class="row margin-bottom">
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Graphic Designing</a></h5>
                                                <strong>
                                                    <span>6 Months</span>
                                                    <small>48 Lectures</small>
                                                </strong>
                                                <p>Learn the essentials of graphic design and unleash your creativity with our comprehensive Graphic design course. Perfect for aspiring designers seeking practical skills and professional growth.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Johny Fisher</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->			
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-2.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Advanced Figma UI/UX</a></h5>
                                                <strong>
                                                    <span>6 Months </span>
                                                    <small>48 Lectures</small>
                                                </strong>
                                                <p>Discover the Advanced Figma UI/UX Course, designed to elevate your design skills with industry insights and hands-on practice.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Sara Johnson</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-3.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Revit Architectural</a></h5>
                                                <strong>
                                                    <span>2 Months</span>
                                                    <small> 16 Lectures</small>
                                                </strong>
                                                <p>Be a Master in architectural and modeling designs and develop advanced skills in industry-relevant software tools to create stunning, functional designs. </p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Peter Parker</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                </div>
                                <div class="view-all">
                                    <a class="btn-3" href="{{route('our-course')}}">View All Cources</a>
                                </div>
                            </div>
                            <!-- 4 Tab END  -->

                            <div role="tabpanel" class="tab-pane fade" id="finance">
                                <div class="row margin-bottom">
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Digital Marketing</a></h5>
                                                <strong>
                                                    <span>6 Months</span>
                                                    <small> 48 Lectures</small>
                                                </strong>
                                                <p>Learn about digital marketing essentials and strategies that drive success in today's competitive landscape. Join us at the INSTA Training Center and boost your career prospects.
                                                </p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Johny Fisher</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->			
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-2.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Social Media Marketing</a></h5>
                                                <strong>
                                                    <span>2 Months </span>
                                                    <small>16 Lectures</small>
                                                </strong>
                                                <p>Learn the art of leveraging social media platforms effectively with our Social Media Marketing course—master strategies to boost engagement and grow your brand online.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Sara Johnson</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-3.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">SEO & SEM</a></h5>
                                                <strong>
                                                    <span>2 Months</span>
                                                    <small> 16 Lectures </small>
                                                </strong>
                                                <p>Acquire advanced skills in website optimization and expertly manage campaigns for impactful online presence. </p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Peter Parker</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                </div>
                                <div class="view-all">
                                    <a class="btn-3" href="{{route('our-course')}}">View All Cources</a>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="technologies">
                                <div class="row margin-bottom">
                                    <!-- EDU COURSES WRAP START -->			
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-2.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Interior & Exterior Design</a></h5>
                                                <strong>
                                                    <span>6 Months </span>
                                                    <small>48 Lectures </small>
                                                </strong>
                                                <p>Learn to transform spaces with expert guidance, practical skills, creative techniques, and hands-on experience for stunning and professional results.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Sara Johnson</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">2D & 3D Animation </a></h5>
                                                <strong>
                                                    <span>6 Months</span>
                                                    <small> 48 Lectures </small>
                                                </strong>
                                                <p>Unlock your creativity with our 2D & 3D Animation course, where you'll learn essential skills to animate and design captivating visual stories from scratch.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Johny Fisher</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-3.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Video Production </a></h5>
                                                <strong>
                                                    <span>2 Months</span>
                                                    <small> 16 Lectures </small>
                                                </strong>
                                                <p>Our Video Production Course provides filming, editing, and storytelling training, allowing you to create professional-grade videos with unique creativity.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Peter Parker</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                </div>
                                <div class="view-all">
                                    <a class="btn-3" href="{{route('our-course')}}">View All Cources</a>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="management">
                                <div class="row margin-bottom">
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Data Analysis Expert </a></h5>
                                                <strong>
                                                    <span>4 Months</span>
                                                    <small> 32 Lectures</small>
                                                </strong>
                                                <p>Elevate your career with our Data Analysis Expert Course, and gain 90% hands-on experience in-house to master data-driven insights and decision-making.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Johny Fisher</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-3.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Business Management </a></h5>
                                                <strong>
                                                    <span>2 Months</span>
                                                    <small> 16 Lectures </small>
                                                </strong>
                                                <p>Transform your career with expert-led, hands-on training. This course provides practical skills and strategic insights essential for success in today's competitive market.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Peter Parker</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->			
                                    <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-2.jpg')}}" alt="">
                                                {{-- <figcaption><a href="courses-detail.html">See More</a></figcaption> --}}
                                            </figure>
                                            <div class="edu2_cur_des">
                                                {{-- <span>$20</span> --}}
                                                <h5><a href="#">Advance MS Excel</a></h5>
                                                <strong>
                                                    <span>2 Months</span>
                                                    <small> 16 Lectures</small>
                                                </strong>
                                                <p>Improve your data analysis, formula management, and automation skills to excel in today's digital business environment and set yourself apart.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                {{-- <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Sara Johnson</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- EDU COURSES WRAP END -->
                                </div>
                                <div class="view-all">
                                    <a class="btn-3" href="{{route('our-course')}}">View All Cources</a>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="other">
                                <div class="row margin-bottom">
                                    <!-- EDU COURSES WRAP START -->			
                                    {{-- <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-2.jpg')}}" alt="">
                                                <figcaption><a href="courses-detail.html">See More</a></figcaption>
                                            </figure>
                                            <div class="edu2_cur_des">
                                                <span>$20</span>
                                                <h5><a href="#">Real Estate Law</a></h5>
                                                <strong>
                                                    <span>Dec 27, 2015</span>
                                                    <small>Jan 27, 2016</small>
                                                </strong>
                                                <p>If you want to build a successful business online, watch the promo video to see why 13,000+ students are using this online entrepreneurship course to learn.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Sara Johnson</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    {{-- <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap-3.jpg')}}" alt="">
                                                <figcaption><a href="courses-detail.html">See More</a></figcaption>
                                            </figure>
                                            <div class="edu2_cur_des">
                                                <span>$20</span>
                                                <h5><a href="#">Networking Management</a></h5>
                                                <strong>
                                                    <span>Dec 27, 2015</span>
                                                    <small>Jan 27, 2016</small>
                                                </strong>
                                                <p>Welcome to Logo Design fundamentals of building a great brand Logo. Our course teacher Lauren, walks you through his process of logo design.</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Peter Parker</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- EDU COURSES WRAP END -->
                                    <!-- EDU COURSES WRAP START -->
                                    {{-- <div class="col-md-4">
                                        <div class="edu2_cur_wrap">
                                            <figure>
                                                <img src="{{asset('asset/extra-images/cur-wrap.jpg')}}" alt="">
                                                <figcaption><a href="courses-detail.html">See More</a></figcaption>
                                            </figure>
                                            <div class="edu2_cur_des">
                                                <span>$20</span>
                                                <h5><a href="#">The Secrets of Economic</a></h5>
                                                <strong>
                                                    <span>Dec 27, 2015</span>
                                                    <small>Jan 27, 2016</small>
                                                </strong>
                                                <p>Personal time management skills are essential for professional & personal success in any area of life. Those able to successfully implement time management strategies</p>
                                            </div>
                                            <div class="edu2_cur_des_ft">
                                                <figure>
                                                    <img src="{{asset('asset/extra-images/cur_ft.jpg')}}" alt=""/>
                                                </figure>
                                                <div class="edu2_cur_ftr_strip">
                                                    <h6>Johny Fisher</h6>
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- EDU COURSES WRAP END -->
                                </div>
                                <div class="view-all">
                                    <a class="btn-3" href="{{route('our-course')}}">View All Cources</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--EDU2 COURSES TAB WRAP END-->
            </div>
        </div>
    </section>
    <!--KF COURSES CATEGORIES WRAP END-->

    <!--GALLERY SECTION START-->
    <section class="kode-gallery-section">
        <!-- HEADING 2 START-->
        <div class="col-md-12">
            <div class="kf_edu2_heading2">
                <h3>Our Gallery</h3>
                <p>Student gallery of the year past graduated passouts</p>
            </div>
        </div>
        <!-- HEADING 2 END-->
        <!-- EDU2 GALLERY WRAP START-->
        <div class="edu2_gallery_wrap gallery">
           
            <!-- EDU2 GALLERY DES START-->
            <div class="gallery3">
            
                <div class="filterable-item all 2 1 9 col-md-3 col-sm-4 col-xs-12 no_padding">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery1.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery1.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
                <div class="filterable-item all 3 2 1 col-md-3 col-sm-4 col-xs-12 no_padding">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery2.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery2.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
                <div class="filterable-item all 4 2 9 col-md-3 col-sm-4 col-xs-12 no_padding')}}">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery3.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery3.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
                <div class="filterable-item all 9 8 7 col-md-3 col-sm-4 col-xs-12 no_padding">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery4.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery4.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
                <div class="filterable-item all 3 2 4 col-md-3 col-sm-4 col-xs-12 no_padding">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery5.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery5.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
                <div class="filterable-item all 4 5 7 col-md-3 col-sm-4 col-xs-12 no_padding">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery6.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery6.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
                <div class="filterable-item all 3 5 7 9 col-md-3 col-sm-4 col-xs-12 no_padding">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery7.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery7.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
                <div class="filterable-item all 2 4 6 8 col-md-3 col-sm-4 col-xs-12 no_padding">
                    <div class="edu2_gallery_des">
                        <figure>
                            <img alt="" src="{{asset('asset/extra-images/home-gallery3.jpg')}}">
                            <figcaption>
                                <a data-rel="prettyPhoto[gallery2]" href="extra-images/home-gallery3.jpg"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                                <h5>Lorem Ipsum Proin</h5>
                                <p>Convocation</p>
                            </figcaption>
                        </figure>
                    </div>	
                </div>
            </div>
            
        <!-- EDU2 GALLERY WRAP END-->
        </div>
        <div class="loadmore">
                <a href="#" class="btn-3">Load More</a>
            </div>
    </section>
    <!--GALLERY SECTION END-->

 

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
                <h3 class="">10,00</h3>
                <h5>STUDENTS </h5>
            </div>
            <!--EDU2 COUNTER DES END-->
            <!--EDU2 COUNTER DES START-->
            <div class="edu2_counter_des">
                <span><i class=" icon-user255"></i></span>
                <h3 class="">50+</h3>
                <h5>CERTIFIED TEACHERS</h5>
            </div>
            <!--EDU2 COUNTER DES END-->
        </div>
    </section>
    <!--COUNTER SECTION END-->

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
                                <figure><img src="{{asset('asset/extra-images/Artboard 1 copy 2.png')}}" alt=""/>
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
                                <figure><img src="{{asset('asset/extra-images/Artboard 1 copy.png')}}" alt=""/>
                                    <figcaption>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </figcaption>
                                </figure>
                                <div class="edu2_faculty_des2">
                                    <h6><a href="#">Mr. Haseeb Aleem</a></h6>
                                    <strong>Full stack developer </strong>
                                    <p>Reserved to crafting full-bodied, user-centric webs & apps that empower businesses in digital means. </p>
                                </div>
                            </div>
                            <!-- FACULTY DES END-->
                        </div>

                        <div class="item">
                            <!-- FACULTY DES START-->
                            <div class="edu2_faculty_des">
                                <figure><img src="{{asset('asset/extra-images/Artboard 1.png')}}" alt=""/>
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
                                <figure><img src="{{asset('asset/extra-images/Artboard 1 copy 3.png')}}" alt=""/>
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
                                <figure><img src="{{asset('asset/extra-images/faculty-mb1.jpg')}}" alt=""/>
                                    <figcaption>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </figcaption>
                                </figure>
                                <div class="edu2_faculty_des2">
                                    <h6><a href="#">Simon Grishaber</a></h6>
                                    <strong>Health Teacher</strong>
                                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh...</p>
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
    <!-- FACULTY WRAP START-->

    <!-- LATEST NEWS AND EVENT WRAP START-->
    <section class="edu2_new_wrap">
        <div class="container">
            <!-- HEADING 2 START-->
            <div class="col-md-12">
                <div class="kf_edu2_heading2">
                    <h3>Latest News &amp; Event</h3>
                </div>
            </div>
            <!-- HEADING 2 END-->
            <div class="row">
                <!-- EDU2 NEW DES START-->
                <div class="col-md-6">
                    <div class="edu2_new_des">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="edu2_event_des">
                                    <h4>Dec</h4>
                                    <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                    <ul class="post-option">
                                         <li>By<a href="#">Admin</a></li>
                                         <li>03/12/2015</li>
                                         <li><a href="#">21 Comments</a></li>
                                    </ul>
                                    <a href="#" class="readmore">read more<i class="fa fa-long-arrow-right"></i></a>
                                    <span>24</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 thumb">
                                <figure><img src="{{asset('asset/extra-images/news1.jpg')}}" alt=""/>
                                    <figcaption><a href="blog-detail.html"><i class="fa fa-plus"></i></a></figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EDU2 NEW DES END-->

                <!-- EDU2 NEW DES START-->
                <div class="col-md-6">
                    <div class="edu2_new_des">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 thumb">
                                <figure><img src="{{asset('asset/extra-images/news2.jpg')}}" alt=""/>
                                    <figcaption><a href="blog-detail.html"><i class="fa fa-plus"></i></a></figcaption>
                                </figure>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="edu2_event_des text-right">
                                    <h4>Dec</h4>
                                    <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                    <ul class="post-option">
                                         <li>By<a href="#">Admin</a></li>
                                         <li>03/12/2015</li>
                                         <li><a href="#">21 Comments</a></li>
                                    </ul>
                                    <a href="#" class="readmore">read more<i class="fa fa-long-arrow-right"></i></a>
                                    <span>03</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EDU2 NEW DES END-->

                <!-- EDU2 NEW DES START-->
                <div class="col-md-6">
                    <div class="edu2_new_des">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="edu2_event_des">
                                    <h4>Dec</h4>
                                    <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                    <ul class="post-option">
                                         <li>By<a href="#">Admin</a></li>
                                         <li>03/12/2015</li>
                                         <li><a href="#">21 Comments</a></li>
                                    </ul>
                                    <a href="#" class="readmore">read more<i class="fa fa-long-arrow-right"></i></a>
                                    <span>31</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 thumb">
                                <figure><img src="{{asset('asset/extra-images/news3.jpg')}}" alt=""/>
                                    <figcaption><a href="blog-detail.html"><i class="fa fa-plus"></i></a></figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EDU2 NEW DES END-->

                <!-- EDU2 NEW DES START-->
                <div class="col-md-6">
                    <div class="edu2_new_des">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 thumb">
                                <figure><img src="{{asset('asset/extra-images/news4.jpg')}}" alt=""/>
                                    <figcaption><a href="blog-detail.html"><i class="fa fa-plus"></i></a></figcaption>
                                </figure>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="edu2_event_des text-right">
                                    <h4>Dec</h4>
                                    <p>Lorem Lipsum Proin Gravide Nibh Vel Velit</p>
                                    <ul class="post-option">
                                         <li>By<a href="#">Admin</a></li>
                                         <li>03/12/2015</li>
                                         <li><a href="#">21 Comments</a></li>
                                    </ul>
                                    <a href="#" class="readmore">read more<i class="fa fa-long-arrow-right"></i></a>
                                    <span>11</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EDU2 NEW DES END-->
            </div>
        </div>
    </section>
    <!-- LATEST NEWS AND EVENT WRAP END-->


    <!--TRAINING WRAP START-->
    <section class="edu2_tarining_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="kf_edu2_training_des">
                        <figure>
                            <img src="{{asset('asset/extra-images/training-thumb.png')}}" alt=""/>
                        </figure>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="edu2_training_wrap">
                        <h2>Get The Coaching Training</h2>
                        <h3>By Simon Jones almost Free</h3>
                        <!--COUNTDOWN START-->
                        <ul class="countdown">
                            <li>
                                <span class="days">195</span>
                                <p class="days_ref">days</p>
                            </li>
                            <li>
                                <span class="hours">20</span>
                                <p class="hours_ref">hours</p>
                            </li>
                            <li>
                                <span class="minutes">34</span>
                                <p class="minutes_ref">minutes</p>
                            </li>
                            <li>
                                <span class="seconds last">17</span>
                                <p class="seconds_ref">seconds</p>
                            </li>
                        </ul>
                        <!--COUNTDOWN END-->
                        <strong>It’s limited Seating! Hurry up</strong>
                        <a href="{{route('registration-form')}}" class="btn-1">REGISTER NOW</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--TRAINING WRAP END-->

    <!--PLAN AND PRICE WRAP START-->
    {{-- <section class="kf_edu_price_bg">
        <div class="container">
            <!-- HEADING 2 START-->
            <div class="col-md-12">
                <div class="kf_edu2_heading2">
                    <h3>Plan and Pricing</h3>
                </div>
            </div>
            <!-- HEADING 2 END-->
            <!--PLAN AND PRICE WRAP START-->
            <div class="edu2_pricing_wrap">
                <div class="row">
                    <div class="col-md-4">
                        <!--PLAN AND PRICE DES START-->
                        <div class="edu2_pricing_des">
                            <h4>Trial</h4>
                            <div class="pckg-price"><strong><sup></sup>Free</strong><h3>30 Days</h3></div>
                            <ul>
                                <li><a href="#">300+ Audio Lesson mp3s</a></li>
                                <li><a href="#">50 one-hour long CD's</a></li>
                                <li><a href="#">This is the light version</a></li>
                                <li><a href="#">This is the light version</a></li>
                                <li><a href="#">50 one-hour long CD's</a></li>
                            </ul>
                            <button class="subscribe">subscribe Now</button>
                        </div>
                        <!--PLAN AND PRICE DES END-->
                    </div>

                    <div class="col-md-4">
                        <!--PLAN AND PRICE DES START-->
                        <div class="edu2_pricing_des">
                            <h4>Silver</h4>
                            <div class="pckg-price"><strong><sup>$</sup>149</strong><h3>30 Days</h3></div>
                            <ul>
                                <li><a href="#">300+ Audio Lesson mp3s</a></li>
                                <li><a href="#">50 one-hour long CD's</a></li>
                                <li><a href="#">This is the light version</a></li>
                                <li><a href="#">This is the light version</a></li>
                                <li><a href="#">50 one-hour long CD's</a></li>
                            </ul>
                            <button class="subscribe">subscribe Now</button>
                        </div>
                        <!--PLAN AND PRICE DES END-->
                    </div>

                    <div class="col-md-4">
                        <!--PLAN AND PRICE DES START-->
                        <div class="edu2_pricing_des">
                            <h4>Gold</h4>
                            <div class="pckg-price"><strong><sup>$</sup>299</strong><h3>30 Days</h3></div>
                            <ul>
                                <li><a href="#">300+ Audio Lesson mp3s</a></li>
                                <li><a href="#">50 one-hour long CD's</a></li>
                                <li><a href="#">This is the light version</a></li>
                                <li><a href="#">This is the light version</a></li>
                                <li><a href="#">50 one-hour long CD's</a></li>
                            </ul>
                            <button class="subscribe">subscribe Now</button>
                        </div>
                        <!--PLAN AND PRICE DES END-->
                    </div>
                </div>
            </div>
            <!--PLAN AND PRICE WRAP ENDTrial-->
        </div>
    </section> --}}
    <!--PLAN AND PRICE WRAP END-->

    <!--OUR TESTEMONIAL WRAP START-->
    <section>
        <div class="container">
            <div class="row">
                <!-- HEADING 2 START-->
                <div class="col-md-12">
                    <div class="kf_edu2_heading2">
                        <h3>Our Testimonial</h3>
                    </div>
                </div>
                <!-- HEADING 2 END-->
                <!-- TESTEMONIAL SLIDER WRAP START-->
                <div class="edu2_testemonial_slider_wrap">
                    <div id="owl-demo-9">
                        <div class="item">
                            <!-- TESTEMONIAL SLIDER WRAP START-->
                            <div class="edu_testemonial_wrap">
                                <figure><img src="{{asset('asset/extra-images/testemonial images 1.jpg')}}" alt=""/></figure>
                                <div class="kode-text">
                                    <p>INSTA Training transformed my IT knowledge completely! The instructors are not just experts but also incredibly supportive, making learning enjoyable and practical.</p>
                                    <a href="#">Abdul Basit 
                                        <span>- Happy Student</span></a>
                                </div>
                            </div>
                            <!-- TESTEMONIAL SLIDER WRAP END-->
                        </div>

                        <div class="item">
                            <!-- TESTEMONIAL SLIDER WRAP START-->
                            <div class="edu_testemonial_wrap">
                                <figure><img src="{{asset('asset/extra-images/testemonial images 2.jpg')}}" alt=""/></figure>
                                <div class="kode-text">
                                    <p>I highly recommend INSTA Trainings for anyone looking to excel in IT. Their courses are exhaustive, and the hands-on approach helped me gain real-world skills.</p>
                                    <a href="#">Shoaib Khan <span>- Happy Student</span></a>
                                </div>
                            </div>
                            <!-- TESTEMONIAL SLIDER WRAP END-->
                        </div>

                        <div class="item">
                            <!-- TESTEMONIAL SLIDER WRAP START-->
                            <div class="edu_testemonial_wrap">
                                <figure><img src="{{asset('asset/extra-images/testemonial images 3.jpg')}}" alt=""/></figure>
                                <div class="kode-text">
                                    <p>Enrolling at INSTA Trainings was one of the best decisions I made. The courses are structured to build a strong foundation, and the instructors are committed to student success.</p>
                                    <a href="#">Ameer Hamza <span>- Happy Student</span></a>
                                </div>
                            </div>
                            <!-- TESTEMONIAL SLIDER WRAP END-->
                        </div>
                        
                        <div class="item">
                            <!-- TESTEMONIAL SLIDER WRAP START-->
                            <div class="edu_testemonial_wrap">
                                <figure><img src="{{asset('asset/extra-images/testemonial images 4.jpg')}}" alt=""/></figure>
                                <div class="kode-text">
                                    <p>I'm impressed with the quality of education at INSTA Trainings. The curriculum is up-to-date, and the personalized attention from instructors made all the difference in my learning journey.</p>
                                    <a href="#">Omer Farooq <span>- Happy Student</span></a>
                                </div>
                            </div>
                            <!-- TESTEMONIAL SLIDER WRAP END-->
                        </div>

                        <div class="item">
                            <!-- TESTEMONIAL SLIDER WRAP START-->
                            <div class="edu_testemonial_wrap">
                                <figure><img src="{{asset('asset/extra-images/testemonial images 5.jpg')}}" alt=""/></figure>
                                <div class="kode-text">
                                    <p>INSTA Trainings transcended my expectations! The blend of theoretical knowledge and practical exercises prepared me well for a career in IT</p>
                                    <a href="#">Ahmad Gillani <span>- Happy Student</span></a>
                                </div>
                            </div>
                            <!-- TESTEMONIAL SLIDER WRAP END-->
                        </div>
                        
                        <div class="item">
                            <!-- TESTEMONIAL SLIDER WRAP START-->
                            <div class="edu_testemonial_wrap">
                                <figure><img src="{{asset('asset/extra-images/testemonial images 6.jpg')}}" alt=""/></figure>
                                <div class="kode-text">
                                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.aenean sollicitudin, lorem quis bibendum auctor...</p>
                                    <a href="#">John Doe<span>- Happy Student</span></a>
                                </div>
                            </div>
                            <!-- TESTEMONIAL SLIDER WRAP END-->
                        </div>
                    </div>
                </div>
                <!-- TESTEMONIAL SLIDER WRAP END-->
            </div>
        </div>
    </section>
    <!--OUR TESTEMONIAL WRAP END-->
</div>

<!--EDU2 FOOTER WRAP START-->
<!--NEWS LETTERS START-->
<div class="edu2_ft_topbar_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="edu2_ft_topbar_des">
                    <h5>Subcribe weekly newsletter</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="edu2_ft_topbar_des">
                    <form>
                        <input type="email" placeholder="Enter Valid Email Address">
                        <button><i class="fa fa-paper-plane"></i>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection