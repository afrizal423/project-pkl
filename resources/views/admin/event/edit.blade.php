@extends('admin.master') @section('judul_halaman', 'Edit data')
@section('konten')
<section id="content">
    <!--breadcrumbs start-->

    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->

        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Edit Data Event</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/event')}}">Event</a>
                        </li>
                        <li class="active">Edit</li>
                        <li class="active">{{$ev->judul}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Edit Event</h4>
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
                    <a href="{{url('admin/event')}}" class="waves-effect waves-light blue btn">
                        Kembali</a>
                </div>
                @endif
                <form
                    action="{{ route('event.update', $ev->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <table style="margin:20px auto;">
                        <tr>
                            <td>Judul Event</td>
                            <td>
                                <div class="input-field">
                                    <input
                                        id="judul"
                                        name="judul"
                                        type="text"
                                        class="validate"
                                        value="{{$ev->judul}}">
                                    <label for="judul">Judul Event</label>
                                    @if($errors->has('judul'))
                                    <div class="text-danger">
                                        {{ $errors->first('judul')}}
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Konten Event</td>
                            <td>
                                <div class="input-field">
                                    <textarea name="konten" class="form-control my-editor">{{$ev->konten}}</textarea>
                                    @if($errors->has('konten'))
                                    <div class="text-danger">
                                        {{ $errors->first('konten')}}
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori event</td>
                            <td>
                                <div class="input-field">
                                    <select name="kategori">
                                        <option value="" disabled="disabled" selected="selected">Kategori event</option>
                                        <option value="Seminar">Seminar</option>
                                        <option value="Lomba">Lomba</option>
                                        <option value="Workshop">Workshop</option>
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
                                    @if($ev->gambar)
                                      <img src="{{asset('storage/' . $ev->gambar)}}" width="96px"/>
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
