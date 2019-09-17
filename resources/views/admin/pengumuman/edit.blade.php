@extends('admin.master') @section('judul_halaman', 'Tambah data mahasiswa')
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
                            <a href="{{url('admin/pengumuman')}}">Pengumuman</a>
                        </li>
                        <li class="active">Edit</li>
                        <li class="active">{{$inf->judul}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Edit pengumuman</h4>
        <div class="row">
            <div class="col s12">
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                    <br>
                    <a href="{{url('admin/pengumuman')}}" class="waves-effect waves-light blue btn">
                        Kembali</a>
                </div>
                @endif
                <form
                    action="{{ route('pengumuman.update', $inf->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <table style="margin:20px auto;">
                        <tr>
                            <td>Judul Pengumuman</td>
                            <td>
                                <div class="input-field">
                                    <input
                                        id="judul"
                                        name="judul"
                                        type="text"
                                        class="validate"
                                        value="{{$inf->judul}}">
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
                                    <textarea name="konten" class="form-control my-editor">{{$inf->konten}}</textarea>
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
                                        <small class="text-muted">Current cover</small><br>
                                        @if($inf->gambar)
                                          <img src="{{asset('storage/' . $inf->gambar)}}" width="96px"/>
                                        @endif
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
                                    <small>Kosongkan jika tidak ingin mengubah cover</small>
                                </td>
                            </tr>

                        <tr>
                            <td></td>
                            <td>
                                <button
                                    class="blue btn waves-effect waves-light"
                                    type="submit"
                                    name="action"
                                    value="DRAFT">Draft
                                    <i class="material-icons right">assignment</i>
                                </button>
                                <button
                                    class="btn waves-effect waves-light"
                                    type="submit"
                                    name="action"
                                    value="PUBLISH">Publish
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
