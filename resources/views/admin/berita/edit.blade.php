@extends('admin.master') @section('judul_halaman', 'Tambah data mahasiswa')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Ubah Berita</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/pengumuman')}}">Berita</a>
                        </li>
                        <li class="active">Ubah</li>
                        <li class="active">{{$inf->judul}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Ubah Berita</h4>
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
                <form
                    action="{{ route('berita.update', $inf->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <table style="margin:20px auto;">
                        <tr>
                            <td>Judul Berita</td>
                            <td>
                                <div class="input-field">
                                    <input
                                        id="judul"
                                        name="judul"
                                        type="text"
                                        class="validate"
                                        value="{{$inf->judul}}">
                                        <input hidden id="kategori" name="kategori" value="Berita" type="text" class="validate">
                                    <label for="judul">Judul berita</label>
                                    @if($errors->has('judul'))
                                    <div class="text-danger">
                                        {{ $errors->first('judul')}}
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Konten Berita</td>
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
                        {{-- <tr>
                            <td>Kategori Berita</td>
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
                        </tr> --}}
                        <tr>
                                <td>Foto Banner</td>
                                <td>
                                        <small class="text-muted">Cover saat ini</small><br>
                                        @if($inf->gambar)
                                          <img src="{{asset('storage/' . $inf->gambar)}}" width="96px"/>
                                        @endif
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>berkas</span>
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
                                    class="amber darken-3 btn waves-effect waves-light"
                                    type="submit"
                                    name="action"
                                    value="DRAFT">Konsep
                                    <i class="material-icons right">assignment</i>
                                </button>
                                <button
                                    class="blue btn waves-effect waves-light"
                                    type="submit"
                                    name="action"
                                    value="PUBLISH">Publikasi
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
