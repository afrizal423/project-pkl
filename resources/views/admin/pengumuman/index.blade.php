@extends('admin.master') @section('judul_halaman', 'Pengumuman')
@section('konten')
<!-- START CONTENT -->
<section id="content">
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen --
        <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input
                type="text"
                name="Search"
                class="header-search-input z-depth-2"
                placeholder="Search">
        </div>-->
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
                    <!--<div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input type="text" name="Search" placeholder="Search"/>
                    </div>-->
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col s12">
                            <a href="{{route('pengumuman.create')}}" class="blue waves-effect waves-light  btn">
                                <i class="material-icons left">add</i>
                                Tambah Pengumuman</a>
                                <a href="{{url('admin/pengumuman/manage')}}" class="teal waves-effect waves-light  btn">
                                        <i class="material-icons left">folder</i>
                                        Kelola Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Responsive Table-->
        <div class="divider"></div>
        @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif
        <div class="row">
            @foreach ($info as $inf)


            <div class="col s12 m4 l4">
                    <div class="blog">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <a href="{{route('pengumuman.show',$inf->slug)}}"><img src="{{asset('storage/' . $inf->gambar)}}" alt="blog-img">
                                    </a>
                                </div>

                                <div class="card-content">
                                    <p class="row">
                                        <span class="left">
                                        <a href="#">{{ $inf->kategori }}</a>
                                        </span>
                                        <span class="right">{{ \Carbon\Carbon::parse($inf->created_at)->format('d/m/Y')}}</span>
                                    </p>
                                    <h4 class="card-title grey-text text-darken-4">
                                    <a href="{{route('pengumuman.show',$inf->slug)}}" class="grey-text text-darken-4">{{ $inf->judul }}</a>
                                    </h4>
                                <p class="blog-post-content">{!!Str::words($inf->konten, 15)
                                    !!}</p>
                                    <div class="row">
                                        <div class="col s2">
                                            <img
                                                src="{{asset('storage/' . Auth::user()->avatar)}}"
                                                alt=""
                                                class="circle responsive-img valign profile-image">
                                        </div>
                                        <div class="col s9">
                                            Penulis
                                            <a href="#">{{ $inf->username }}</a>
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
            @endforeach
        </div>

        <div class="center-align">
                @include('pagination.default', ['paginator' => $info])</div>
    </div>

</div>
</section>
<!-- END CONTENT -->
@endsection
