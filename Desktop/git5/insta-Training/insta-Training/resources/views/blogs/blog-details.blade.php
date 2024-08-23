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
                        <h3>Blog Detail</h3>
                    </div>
                   
                    <div class="kf_inr_breadcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog Detail</a></li>
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <!--KF_BLOG DETAIL_WRAP START-->
                    <div class="kf_blog_detail_wrap">

                        <!-- BLOG DETAIL THUMBNAIL START-->
                        <div class="blog_detail_thumbnail">
                            <figure>
                                <img src="{{asset('asset/extra-images/blogthumbnail.jpg')}}" alt=""/>
                                <figcaption><a href="#">education</a></figcaption>
                            </figure>
                        </div>
                        <!-- BLOG DETAIL THUMBNAIL END-->

                        <!--KF_BLOG DETAIL_DES START-->
                        <div class="kf_blog_detail_des">
                            <div class="blog-detl_heading">
                                <h5>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</h5>
                            </div>

                            <ul class="blog_detail_meta">
                                <li><i class="fa fa-calendar"></i><a href="#">31 Dec, 2015</a></li>
                                <li><i class="fa fa-heart-o"></i><a href="#">69 Likes</a></li>
                                <li><i class="fa fa-comments-o"></i><a href="#">27 Comments</a></li>
                            </ul>

                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. </p>
                            <p class="margin-bottom">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.</p>


                            <blockquote>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. </p>
                            </blockquote>


                            <p class="margin-bottom">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. </p>

                            <!--KF_BLOG THUMB wRAP START-->
                            <div class="blog_thumb_wrap">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 ">
                                        <figure>
                                            <img src="{{asset('asset/extra-images/blog_detail1.jpg')}}" alt=""/>
                                            <figcaption><a href="#"><i class="fa fa-search"></i></a></figcaption>
                                        </figure>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <figure>
                                            <img src="{{asset('asset/extra-images/blog_detail2.jpg')}}" alt=""/>
                                            <figcaption><a href="#"><i class="fa fa-search"></i></a></figcaption>
                                        </figure>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <figure>
                                            <img src="{{asset('asset/extra-images/blog_detail3.jpg')}}" alt=""/>
                                            <figcaption><a href="#"><i class="fa fa-search"></i></a></figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <!--KF_BLOG THUMB wRAP END-->

                            <p class="margin-bottom">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. </p>
                        </div>
                        <!--KF_BLOG DETAIL_DES END-->

                        <!--KF_BLOG ABOUT AUTHOR START-->
                        <div class="about_autor">
                            <figure><img src="{{asset('asset/extra-images/author.jpg')}}" alt=""></figure>
                            <div class="about-autor_des">
                                <h6><a href="#">Alfred Marshal</a></h6>
                                <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum quis bibendum.</p>
                                <ul class="autor_social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--KF_BLOG ABOUT AUTHOR END-->

                        <!--SECTION COMMENT START-->
                        <div class="section-comment">
                            <div class="blog-detl_heading">
                                <h5>3 Comments</h5>
                            </div>

                            <!-- COMMENT LIST START-->
                            <ul class="coment_list">
                                <li>
                                    <!-- COMMENT WRAP START-->
                                    <div class="comment_wrap">
                                        <figure><img src="{{asset('asset/extra-images/comment-1.jpg')}}" alt=""/></figure>
                                        <div class="comment_des">
                                            <div class="comment_des_hed">
                                                <cite><a href="#">Anna Doe</a><span>Dec 25, 2015</span></cite>
                                                <a class="comment_reply" href="#"><i class="fa fa-mail-reply"></i>Reply</a>
                                            </div>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean sollicitudin, lorem quis bibendum auctor, nisi elit .</p>
                                        </div>
                                    </div>
                                    <!-- COMMENT WRAP END-->

                                    <ul class="secnd_coment_list">
                                        <li>
                                            <!-- COMMENT WRAP START-->
                                            <div class="comment_wrap">
                                                <figure><img src="{{asset('asset/extra-images/comment-2.jpg')}}" alt=""/></figure>
                                                <div class="comment_des">
                                                    <div class="comment_des_hed">
                                                        <cite><a href="#">Anna Doe</a><span>Dec 25, 2015</span></cite>
                                                        <a class="comment_reply" href="#"><i class="fa fa-mail-reply"></i>Reply</a>
                                                    </div>
                                                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean sollicitudin, lorem quis bibendum auctor, nisi elit .</p>
                                                </div>
                                            </div>
                                            <!-- COMMENT WRAP END-->
                                        </li>
                                    </ul>

                                </li>

                                <li>
                                    <!-- COMMENT WRAP START-->
                                    <div class="comment_wrap">
                                        <figure><img src="{{asset('asset/extra-images/comment-3.jpg')}}" alt=""/></figure>
                                        <div class="comment_des">
                                            <div class="comment_des_hed">
                                                <cite><a href="#">Anna Doe</a><span>Dec 25, 2015</span></cite>
                                                <a class="comment_reply" href="#"><i class="fa fa-mail-reply"></i>Reply</a>
                                            </div>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean sollicitudin, lorem quis bibendum auctor, nisi elit .</p>
                                        </div>
                                    </div>
                                    <!-- COMMENT WRAP END-->
                                </li>

                                <li>
                                    <!-- COMMENT WRAP START-->
                                    <div class="comment_wrap">
                                        <figure><img src="{{asset('asset/extra-images/comment-1.jpg')}}" alt=""/></figure>
                                        <div class="comment_des">
                                            <div class="comment_des_hed">
                                                <cite><a href="#">Anna Doe</a><span>Dec 25, 2015</span></cite>
                                                <a class="comment_reply" href="#"><i class="fa fa-mail-reply"></i>Reply</a>
                                            </div>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean sollicitudin, lorem quis bibendum auctor, nisi elit .</p>
                                        </div>
                                    </div>
                                    <!-- COMMENT WRAP END-->
                                </li>
                            </ul>
                            <!-- COMMENT LIST END-->
                        </div>
                        <!--SECTION COMMENT END-->

                        <!-- BLOG PG FORM START-->
                        <div class="blog_pg_form">
                            <div class="blog-detl_heading">
                                <h5>Leave A Message</h5>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <button>Send Comment</button>
                            </form>
                        </div>
                        <!-- BLOG PG FORM END-->

                    </div>
                    <!--KF_BLOG DETAIL_WRAP END-->
                </div>

                <!--KF_EDU_SIDEBAR_WRAP START-->
                <div class="col-md-4">
                    <div class="kf-sidebar">

                        <!--KF_SIDEBAR_SEARCH_WRAP START-->
                        <div class="widget widget-search">
                            <h2>Search Course</h2>
                            <form>
                                <input type="search" placeholder="Keyword...">
                            </form>
                        </div>
                        <!--KF_SIDEBAR_SEARCH_WRAP END-->

                        <!--KF_SIDEBAR_ARCHIVE_WRAP START-->
                        <div class="widget widget-archive ">
                            <h2>Archives</h2>
                            <ul class="sidebar_archive_des">
                                <li>
                                    <a href=""><i class="fa fa-angle-right"></i>January</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-angle-right"></i>February</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-angle-right"></i>March</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-angle-right"></i>April</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-angle-right"></i>May</a>
                                </li>
                            </ul>
                        </div>
                        <!--KF_SIDEBAR_ARCHIVE_WRAP END-->


                        <!--KF SIDEBAR RECENT POST WRAP START-->
                        <div class="widget widget-recent-posts">
                            <h2>Recent Posts</h2>
                            <ul class="sidebar_rpost_des">
                                <!--LIST ITEM START-->
                                   <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/archive-1.jpg')}}" alt="">
                                        <figcaption><a href="#"><i class="fa fa-search-plus"></i></a></figcaption>
                                    </figure>
                                    <div class="kode-text">
                                        <h6><a href="#">Lorem ipsum dolor sit amet sint occaecat cupidatat</a></h6>
                                        <span><i class="fa fa-clock-o"></i>10 Jan, 2016</span>
                                    </div>
                                </li>
                                <!--LIST ITEM START-->
                                <!--LIST ITEM START-->
                                   <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/archive-2.jpg')}}" alt="">
                                        <figcaption><a href="#"><i class="fa fa-search-plus"></i></a></figcaption>
                                    </figure>
                                    <div class="kode-text">
                                        <h6><a href="#">Lorem ipsum dolor sit amet sint occaecat cupidatat</a></h6>
                                        <span><i class="fa fa-clock-o"></i>10 Jan, 2016</span>
                                    </div>
                                </li>
                                <!--LIST ITEM START-->
                                <!--LIST ITEM START-->
                                   <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/archive-3.jpg')}}" alt="">
                                        <figcaption><a href="#"><i class="fa fa-search-plus"></i></a></figcaption>
                                    </figure>
                                    <div class="kode-text">
                                        <h6><a href="#">Lorem ipsum dolor sit amet sint occaecat cupidatat</a></h6>
                                        <span><i class="fa fa-clock-o"></i>10 Jan, 2016</span>
                                    </div>
                                </li>
                                <!--LIST ITEM START-->
                            </ul>
                        </div>
                        <!--KF SIDEBAR RECENT POST WRAP END-->

                        <!--KF EDU SIDEBAR COURSES CATEGORieS WRAP START-->
                        <div class="widget widget-categories">
                            <h2>categories</h2>
                            <ul>
                                <li><a href=""><i class="fa fa-caret-right"></i>Business &amp; Economics</a></li>
                                <li><a href=""><i class="fa fa-caret-right"></i>Politics &amp; History</a></li>
                                <li><a href=""><i class="fa fa-caret-right"></i>Medical Sciences &amp; Health</a></li>
                                <li><a href=""><i class="fa fa-caret-right"></i>Fine Arts</a></li>
                                <li><a href=""><i class="fa fa-caret-right"></i>Tourism &amp; Culture</a></li>
                                <li><a href=""><i class="fa fa-caret-right"></i>Sports</a></li>
                            </ul>
                        </div>
                        <!--KF EDU SIDEBAR COURSES CATEGORieS WRAP END-->

                        <!--KF SIDE BAR COURSES LIST WRAP START WRAP START-->
                        <div class="widget widget-courses-list">
                            <h2>Latest Courses</h2>
                            <ul>
                                <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/courseslist1.jpg')}}" alt=""/>
                                        <a href="#">View Detail</a>
                                    </figure>
                                </li>

                                <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/courseslist2.jpg')}}" alt=""/>
                                        <a href="#">View Detail</a>
                                    </figure>
                                </li>

                                <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/courseslist3.jpg')}}" alt=""/>
                                        <a href="#">View Detail</a>
                                    </figure>
                                </li>

                                <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/courseslist4.jpg')}}" alt=""/>
                                        <a href="#">View Detail</a>
                                    </figure>
                                </li>

                                <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/courseslist5.jpg')}}" alt=""/>
                                        <a href="#">View Detail</a>
                                    </figure>
                                </li>

                                <li>
                                    <figure>
                                        <img src="{{asset('asset/extra-images/courseslist6.jpg')}}" alt=""/>
                                        <a href="#">View Detail</a>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                        <!--KF SIDE BAR COURSES LIST WRAP START WRAP END-->

                        <!--KF SIDE BAR TAG CLOUD WRAP START-->
                        <div class="widget widget-tag-cloud">
                            <h2>Tags Cloud</h2>
                            <ul>
                                <li><a href="#">Science</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Fine Arts</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Admissions</a></li>
                                <li><a href="#">PHD</a></li>
                                <li><a href="#">History &amp; Politics</a></li>
                                <li><a href="#">Sports</a></li>
                            </ul>

                        </div>
                        <!--KF SIDE BAR TAG CLOUD WRAP END-->

                    </div>
                </div>
                <!--KF EDU SIDEBAR WRAP END-->

            </div>
        </div>
    </section>
</div>
<!--Content Wrap End-->
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
<!--NEWS LETTERS END-->
@endsection
