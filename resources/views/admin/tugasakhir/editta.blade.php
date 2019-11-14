@extends('admin.master') @section('judul_halaman', 'Edit data TA')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Edit Data TA</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/ta')}}">List TA</a>
                        </li>
                        <li class="active">Edit Data TA</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Edit Data Tugas Akhir Mahasiswa Fakultas Ilmu Komputer</h4>
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
                      {{session('status')}} <br><a href="{{url('admin/ta')}}" class="waves-effect waves-light blue btn">
                        Kembali</a>
                    </div>
                  @endif
                <form action="{{ route('ta.update', $mhs->id) }}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <table style="margin:20px auto;">
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
                            <td>Program Studi</td>
                            <td>
                                    <div class="input-field">
                                            <select name="jurusan">
                                                <option value="" disabled="disabled">Program Studi</option>
                                                <option value="Teknik Informatika" @if($mhs->jurusan == "Teknik Informatika") selected="selected" @endif>Teknik Informatika</option>
                                                <option value="Sistem Informasi" @if($mhs->jurusan == "Sistem Informasi") selected="selected" @endif>Sistem Informasi</option>
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
                                    <input id="namakeg" name="judul" type="text" class="validate" value="{{$mhs->judul}}">
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
                                    <input id="namakeg" name="dospem1" type="text" class="validate" value="{{$mhs->dospem1}}">
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
                            <td>Nama Dosen Pembimbing 1</td>
                            <td>
                                <div class="input-field">
                                    <input id="namakeg" name="dospem2" type="text" class="validate" value="{{$mhs->dospem2}}">
                                    <label for="namakeg">Nama Dosen Pembimbing 2</label>
                                    @if($errors->has('dospem1'))
                                <div class="text-danger">
                                    {{ $errors->first('dospem1')}}
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
