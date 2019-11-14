@extends('admin.master') @section('judul_halaman', 'Tambah Pengumuman')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Tambah Pengumuman</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/pengumuman')}}">List Pengumuman</a>
                        </li>
                        <li class="active">Tambah Pengumuman</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div class="row">
        <div class=" col s12 m9 l9">
                <div id="responsive-table">
                        <h4 class="header">Tambah Pengumuman</h4>
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
                                      {{session('status')}}
                                      <br>
                                      <a href="{{url('admin/pengumuman')}}" class="waves-effect waves-light blue btn">
                                        Kembali</a>
                                    </div>
                                  @endif
                                <form action="{{ url('admin/pengumuman/') }}" method="POST" enctype="multipart/form-data">
                                    {{ method_field('POST') }}
                                    {{ csrf_field() }}

                                    <table style="margin:20px auto;">
                                        <tr>
                                            <td>Judul Pengumuman</td>
                                            <td>
                                                <div class="input-field">
                                                    <input id="judul" name="judul" type="text" class="validate">
                                                    <label for="judul">Judul Pengumuman</label>
                                                    @if($errors->has('judul'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('judul')}}
                                                    </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Konten Pengumuman</td>
                                            <td>
                                                <div class="input-field">
                                                    <textarea name="konten" class="form-control my-editor"></textarea>
                                                    @if($errors->has('konten'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('konten')}}
                                                    </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kategori Pengumuman</td>
                                            <td>
                                                <div class="input-field">
                                                    <select name="kategori">
                                                        <option value="" disabled="disabled" selected="selected">Kategori Pengumuman</option>
                                                        <option value="PKM">PKM</option>
                                                        <option value="Lowongan">Lowongan</option>
                                                        <option value="Kewirausahaan">Kewirausahaan</option>
                                                        <option value="Beasiswa">Beasiswa</option>
                                                        <option value="Sertifikasi">Sertifikasi</option>
                                                    </select>
                                                    <label>Jenis Kategori</label>
                                                    @if($errors->has('kategori'))
                                                <div class="text-danger">
                                                    {{ $errors->first('kategori')}}
                                                </div>
                                            @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Foto Banner</td>
                                            <td>
                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                      <span>File</span>
                                                      <input type="file" name="gambar">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                      <input class="file-path validate" name="gambar" type="text">
                                                    </div>
                                                    @if($errors->has('gambar'))
                                                <div class="text-danger">
                                                    {{ $errors->first('gambar')}}
                                                </div>
                                            @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                <button class="blue btn waves-effect waves-light" type="submit" name="action" value="DRAFT">Draft
                                                    <i class="material-icons right">assignment</i>
                                                </button>
                                                <button class="btn waves-effect waves-light" type="submit" name="action" value="PUBLISH">Publish
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
        <div class=" col s12 m3 l3">sssssss</div>
    </div>

    </section>
    @endsection
