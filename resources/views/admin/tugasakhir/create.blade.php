@extends('admin.master') @section('judul_halaman', 'Tambah data Tugas akhir mahasiswa')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Tambah Data Tugas akhir Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/ta')}}">Daftar TA Mahasiswa</a>
                        </li>
                        <li class="active">Tambah Data TA Mahasiswa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Tambah Data Tugas akhir Mahasiswa Fakultas Ilmu Komputer</h4>
        <div class="row">
            <div class="col s12">
                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)
                <div class="alert alert-danger red-text">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                    @if(session('status'))
                    <div class="alert alert-success">
                      {{session('status')}} <br>
                      <a href="{{url('admin/ta')}}" class="waves-effect waves-light blue btn">
                        Kembali</a>
                    </div>
                  @endif
                <form action="{{ route('ta.store') }}" method="POST" enctype="multipart/form-data">
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
                            <td>Judul TA</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="judul" type="text" class="validate">
                                    <label for="namakeg">Judul TA</label>
                                    @if($errors->has('judul'))
                                <div class="text-danger">
                                    {{ $errors->first('judul')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Dosen Pembimbing 1</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="dospem1" type="text" class="validate">
                                    <label for="namakeg">Nama Dosen Pembimbing 1</label>
                                    @if($errors->has('dospem1'))
                                <div class="text-danger">
                                    {{ $errors->first('dospem1')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Dosen Pembimbing 2</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="dospem2" type="text" class="validate">
                                    <label for="namakeg">Nama Dosen Pembimbing 2</label>
                                    @if($errors->has('dospem2'))
                                <div class="text-danger">
                                    {{ $errors->first('dospem2')}}
                                </div>
                            @endif
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td></td>
                            <td>

                                <button class="blue btn waves-effect waves-light" type="submit" name="action" value="PUBLISH">Simpan
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
