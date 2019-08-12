@extends('admin.master') @section('judul_halaman', 'Pengumuman')
@section('konten')
<!-- START CONTENT -->
<section id="content">
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input
                type="text"
                name="Search"
                class="header-search-input z-depth-2"
                placeholder="Search">
        </div>
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Data Pengumuman</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li class="active">Pengumuman</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <!--start container-->
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input type="text" name="Search" placeholder="Search"/>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col s12">
                            <a class="waves-effect waves-light  btn">
                                <i class="material-icons left">add</i>
                                Add Pengumuman</a>
                                <a class="waves-effect waves-light  btn">
                                        <i class="material-icons left">add</i>
                                        Manage Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Responsive Table-->
        <div class="divider"></div>
        <div class="row">
            <div class="col s12 m4 l4">
                    <div class="blog">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <a href="#"><img src="https://images.pexels.com/photos/67636/rose-blue-flower-rose-blooms-67636.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="blog-img">
                                    </a>
                                </div>

                                <div class="card-content">
                                    <p class="row">
                                        <span class="left">
                                            <a href="">Web Design</a>
                                        </span>
                                        <span class="right">18th June, 2015</span>
                                    </p>
                                    <h4 class="card-title grey-text text-darken-4">
                                        <a href="#" class="grey-text text-darken-4">Material Design Card - For Blog Post Article</a>
                                    </h4>
                                    <p class="blog-post-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="row">
                                        <div class="col s2">
                                            <img
                                                src="images/avatar.jpg"
                                                alt=""
                                                class="circle responsive-img valign profile-image">
                                        </div>
                                        <div class="col s9">
                                            By
                                            <a href="#">John Doe</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">
                                        <i class="mdi-navigation-close right"></i>
                                        Apple MacBook Pro A1278 13"</span>
                                    <p>Here is some more information about this blog that is only revealed once
                                        clicked on.</p>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="col s12 m4 l4">
                    <div class="blog">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <a href="#"><img src="https://www.upnjatim.ac.id/wp-content/uploads/2018/05/logoupnbaru.png" alt="blog-img">
                                    </a>
                                </div>

                                <div class="card-content">
                                    <p class="row">
                                        <span class="left">
                                            <a href="">Web Design</a>
                                        </span>
                                        <span class="right">18th June, 2015</span>
                                    </p>
                                    <h4 class="card-title grey-text text-darken-4">
                                        <a href="#" class="grey-text text-darken-4">Material Design Card - For Blog Post Article</a>
                                    </h4>
                                    <p class="blog-post-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="row">
                                        <div class="col s2">
                                            <img
                                                src="images/avatar.jpg"
                                                alt=""
                                                class="circle responsive-img valign profile-image">
                                        </div>
                                        <div class="col s9">
                                            By
                                            <a href="#">John Doe</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">
                                        <i class="mdi-navigation-close right"></i>
                                        Apple MacBook Pro A1278 13"</span>
                                    <p>Here is some more information about this blog that is only revealed once
                                        clicked on.</p>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="col s12 m4 l4">
                    <div class="blog">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <a href="#"><img src="images/img4.jpg" alt="blog-img">
                                    </a>
                                </div>
                                <ul class="card-action-buttons">
                                    <li>
                                        <a class="btn-floating waves-effect waves-light green accent-4">
                                            <i class="mdi-social-share"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn-floating waves-effect waves-light light-blue">
                                            <i class="mdi-action-info activator"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-content">
                                    <p class="row">
                                        <span class="left">
                                            <a href="">Web Design</a>
                                        </span>
                                        <span class="right">18th June, 2015</span>
                                    </p>
                                    <h4 class="card-title grey-text text-darken-4">
                                        <a href="#" class="grey-text text-darken-4">Material Design Card - For Blog Post Article</a>
                                    </h4>
                                    <p class="blog-post-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="row">
                                        <div class="col s2">
                                            <img
                                                src="images/avatar.jpg"
                                                alt=""
                                                class="circle responsive-img valign profile-image">
                                        </div>
                                        <div class="col s9">
                                            By
                                            <a href="#">John Doe</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">
                                        <i class="mdi-navigation-close right"></i>
                                        Apple MacBook Pro A1278 13"</span>
                                    <p>Here is some more information about this blog that is only revealed once
                                        clicked on.</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>


    </div>

</div>
</section>
<!-- END CONTENT -->
@endsection
