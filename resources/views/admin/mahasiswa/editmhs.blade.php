@extends('admin.master') @section('judul_halaman', 'Edit data mahasiswa')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Ubah Data Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/mahasiswa')}}">Daftar Mahasiswa</a>
                        </li>
                        <li class="active">Ubah Data Mahasiswa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Ubah Data Mahasiswa Fakultas Ilmu Komputer</h4>
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
                                        <option value="" disabled="disabled">Jenis Kelamin</option>
                                        <option value="Laki-laki" @if($mhs->jenis_kelamin == "Laki-laki") selected="selected" @endif>Laki-laki</option>
                                        <option value="Perempuan" @if($mhs->jenis_kelamin == "Perempuan") selected="selected" @endif>Perempuan</option>
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
                                                <option value="" disabled="disabled" >Status</option>
                                                <option value="Aktif" @if($mhs->status == "Aktif") selected="selected" @endif>Aktif</option>
                                                <option value="Alumni" @if($mhs->status == "Alumni") selected="selected" @endif>Alumni</option>
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
