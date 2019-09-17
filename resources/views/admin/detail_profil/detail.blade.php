@extends('admin.master') @section('judul_halaman', 'Detail {{ $dt->nama }}')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Detail User {{ $dt->nama }}</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>

                        <li class="active">User {{ $dt->nama }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div class="row">
        <div class=" col s12 m9 l9">
                asdasd
        </div>
        <div class=" col s12 m3 l3">sssssss</div>
    </div>

    </section>
    @endsection
