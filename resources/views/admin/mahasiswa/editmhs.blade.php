@extends('admin.master') @section('judul_halaman', 'Edit data mahasiswa')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Tambah Data Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/mahasiswa')}}">List Mahasiswa</a>
                        </li>
                        <li class="active">Tambah Data Mahasiswa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Tambah Data Mahasiswa Fakultas Ilmu Komputer</h4>
        <div class="row">
            <div class="col s12">
                    @if(session('status'))
                    <div class="alert alert-success">
                      {{session('status')}} <br><a href="{{url('admin/mahasiswa')}}" class="waves-effect waves-light blue btn">
                        Kembali</a>
                    </div>
                  @endif
                <form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <table style="margin:20px auto;">
                        <tr>
                            <td>NPM Mahasiswa</td>
                            <td>
                                <div class="input-field">
                                    <input id="npm" name="npm" type="text" class="validate" value="{{$mhs->npm}}">
                                    <label for="npm">NPM Mahasiswa</label>
                                    @if($errors->has('npm'))
                                    <div class="text-danger">
                                        {{ $errors->first('npm')}}
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Mahasiswa</td>
                            <td>
                                <div class="input-field">
                                    <input id="nama" name="nama" type="text" class="validate" value="{{$mhs->nama}}">
                                    <label for="nama">Nama Mahasiswa</label>
                                    @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>
                                <div class="input-field">
                                    <input id="jurusan" name="jurusan" type="text" class="validate" value="{{$mhs->jurusan}}">
                                    <label for="jurusan">Jurusan</label>
                                    @if($errors->has('jurusan'))
                                <div class="text-danger">
                                    {{ $errors->first('jurusan')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Angkatan</td>
                            <td>
                                <div class="input-field">
                                    <input id="angkatan" name="angkatan" type="text" class="validate" value="{{$mhs->angkatan}}">
                                    <label for="angkatan">Angkatan</label>
                                    @if($errors->has('angkatan'))
                                <div class="text-danger">
                                    {{ $errors->first('angkatan')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Asal Kota</td>
                            <td>
                                <div class="input-field">
                                    <input id="asal" name="asal" type="text" class="validate" value="{{$mhs->asal}}">
                                    <label for="asal">Asal Kota</label>
                                    @if($errors->has('asal'))
                                <div class="text-danger">
                                    {{ $errors->first('asal')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <div class="input-field">
                                    <select name="jenis_kelamin" value="{{$mhs->jenis_kelamin}}">
                                        <option value="" disabled="disabled" selected="selected">Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label>Jenis</label>
                                    @if($errors->has('jenis_kelamin'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis_kelamin')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal lahir</td>
                            <td>
                                <input type="date" name="tgl_lahir" value="{{$mhs->tgl_lahir}}">
                                @if($errors->has('tgl_lahir'))
                                <div class="text-danger">
                                    {{ $errors->first('tgl_lahir')}}
                                </div>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Status Mahasiswa</td>
                            <td>
                                    <div class="input-field">
                                            <select name="status">
                                                <option value="" disabled="disabled" selected="selected">Status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Alumni">Alumni</option>
                                            </select>
                                            <label>Status</label>
                                            @if($errors->has('status'))
                                        <div class="text-danger">
                                            {{ $errors->first('status')}}
                                        </div>
                                    @endif
                                        </div>
<!--
                                <div class="input-field">
                                    <input id="jurusan" name="jurusan" type="text" class="validate">
                                    <label for="jurusan">Jurusan</label>
                                    @if($errors->has('jurusan'))
                                <div class="text-danger">
                                    {{ $errors->first('jurusan')}}
                                </div>
                            @endif
                                </div>-->
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>

                                <button class="btn waves-effect waves-light" type="submit" name="action" value="PUBLISH">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection
