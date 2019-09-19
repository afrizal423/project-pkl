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
        <div class=" col s12 m9 l9 card">

                <div class="center-align"><img src="{{asset('storage/' . $dt->avatar)}}" width="150px"/></div>
                <table style="margin:2px auto;">
                    <tr>
                        <td>Nama:</td>
                        <td>
                            {{ $dt->nama }}
                        </td>
                    </tr>
                    <tr>
                        <td>NIP / NPM:</td>
                        <td>
                            {{ $dt->nip }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jabatan:</td>
                        <td>
                            {{ $dt->jabatan }}
                        </td>
                    </tr>
                    <tr>
                        <td>No HP:</td>
                        <td>
                            {{ $dt->nohp }}
                        </td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td>
                             {{ $dt->email }}
                        </td>
                        </tr>
                    </table>
        </div>
        <div class=" col s12 m3 l3">
                <div class="card">
                        <div style="margin:10px">
                        <b>Created at</b>: {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('j F, Y h:i:s A')}} <br>
                        <b>Update at</b>: {{ \Carbon\Carbon::parse(Auth::user()->updated_at)->format('j F, Y h:i:s A')}} <br>
                        <a href="" class="blue waves-effect waves-light  btn">
                                <i class="material-icons left">settings_backup_restore</i>
                                Edit</a>

                        </div>
                    </div>

        </div>
    </div>

    </section>
    @endsection
