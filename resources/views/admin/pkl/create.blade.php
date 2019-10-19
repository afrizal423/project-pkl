@extends('admin.master') @section('judul_halaman', 'Tambah data PKL mahasiswa')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Tambah Data PKL Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/pkl')}}">List PKL Mahasiswa</a>
                        </li>
                        <li class="active">Tambah Data PKL Mahasiswa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Tambah Data PKL Mahasiswa Fakultas Ilmu Komputer</h4>
        <div class="row">
            <div class="col s12">
                    @if(session('status'))
                    <div class="alert alert-success">
                      {{session('status')}} <br>
                      <a href="{{url('admin/pkl')}}" class="waves-effect waves-light blue btn">
                        Kembali</a>
                    </div>
                  @endif
                <form action="{{ route('pkl.store') }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}

                    <table style="margin:20px auto;">
                        <tr>
                            <td>Nama Mahasiswa</td>
                            <td>
                                <div class="input-field">
                                    <input id="nama" name="nama" type="text" class="validate">
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
                            <td>NPM</td>
                            <td>
                                <div class="input-field">
                                    <input id="jurusan" name="npm" type="text" class="validate">
                                    <label for="jurusan">NPM</label>
                                    @if($errors->has('npm'))
                                <div class="text-danger">
                                    {{ $errors->first('npm')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>
                                    <div class="input-field">
                                            <select name="jurusan">
                                                <option value="" disabled="disabled" selected="selected">Program Studi</option>
                                                <option value="Teknik Informatika">Teknik Informatika</option>
                                                <option value="Sistem Informasi">Sistem Informasi</option>
                                            </select>
                                            <label>Program Studi</label>
                                            @if($errors->has('jurusan'))
                                        <div class="text-danger">
                                            {{ $errors->first('jurusan')}}
                                        </div>
                                    @endif
                                        </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Judul PKL</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="judulpkl" type="text" class="validate">
                                    <label for="namakeg">Judul PKL</label>
                                    @if($errors->has('judulpkl'))
                                <div class="text-danger">
                                    {{ $errors->first('judulpkl')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Instansi</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="namainstansi" type="text" class="validate">
                                    <label for="namakeg">Nama Instansi</label>
                                    @if($errors->has('namainstansi'))
                                <div class="text-danger">
                                    {{ $errors->first('namainstansi')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Instansi</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="alamatinstansi" type="text" class="validate">
                                    <label for="namakeg">Alamat Instansi</label>
                                    @if($errors->has('alamatinstansi'))
                                <div class="text-danger">
                                    {{ $errors->first('alamatinstansi')}}
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