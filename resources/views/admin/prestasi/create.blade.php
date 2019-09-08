@extends('admin.master') @section('judul_halaman', 'Tambah data mahasiswa')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Tambah Data Prestasi Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/prestasi')}}">List Prestasi Mahasiswa</a>
                        </li>
                        <li class="active">Tambah Data Prestasi Mahasiswa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Tambah Data Prestasi Mahasiswa Fakultas Ilmu Komputer</h4>
        <div class="row">
            <div class="col s12">
                    @if(session('status'))
                    <div class="alert alert-success">
                      {{session('status')}}
                    </div>
                  @endif
                <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}

                    <table style="margin:20px auto;">
                        <tr>
                            <td>Nama Mahasiswa</td>
                            <td>
                                <div class="input-field">
                                    <input id="nama" name="nama_mhs" type="text" class="validate">
                                    <label for="nama">Nama Mahasiswa</label>
                                    @if($errors->has('nama_mhs'))
                                    <div class="text-danger">
                                        {{ $errors->first('nama_mhs')}}
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                                <td>Jurusan</td>
                                <td>
                                    <div class="input-field">
                                        <input id="jurusan" name="jurusan" type="text" class="validate">
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
                            <td>Nama Kegiatan</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="nama_kegiatan" type="text" class="validate">
                                    <label for="namakeg">Nama Kegiatan</label>
                                    @if($errors->has('nama_kegiatan'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_kegiatan')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Waktu Kegiatan</td>
                            <td>
                                <div class="input-field">
                                    <input id="waktu" name="waktu_kegiatan" type="date" class="validate">

                                    @if($errors->has('waktu_kegiatan'))
                                <div class="text-danger">
                                    {{ $errors->first('waktu_kegiatan')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Prestasi Yang dicapai</td>
                            <td>
                                <div class="input-field">
                                    <input id="prestasi_kejuaraan" name="prestasi_kejuaraan" type="text" class="validate">
                                    <label for="prestasi_kejuaraan">Prestasi Yang dicapai</label>
                                    @if($errors->has('prestasi_kejuaraan'))
                                <div class="text-danger">
                                    {{ $errors->first('prestasi_kejuaraan')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Individu/Tim</td>
                            <td>
                                <div class="input-field">
                                    <select name="kelompok">
                                        <option value="" disabled="disabled" selected="selected">Individu/Tim</option>
                                        <option value="Individu">Individu</option>
                                        <option value="Tim">Tim</option>
                                    </select>
                                    <label>Jenis</label>
                                    @if($errors->has('kelompok'))
                                <div class="text-danger">
                                    {{ $errors->first('kelompok')}}
                                </div>
                            @endif
                                </div>
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
