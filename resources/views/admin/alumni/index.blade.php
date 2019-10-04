@extends('admin.master')
@section('judul_halaman', 'Data Alumni')
@section('konten')
<!-- START CONTENT -->

<section id="content">
<!--breadcrumbs start-->

<div id="breadcrumbs-wrapper">
    <!-- Search for small screen -->
    <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
        <input
            type="text"
            name="Search"
            class="header-search-input z-depth-2"
            placeholder="Search"></div>
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Data Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li class="active">Mahasiswa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <!--start container-->
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input type="text" name="Search" placeholder="Search"/>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col s12">

                            <a href="{{url('admin/alumni/create')}}" class="waves-effect waves-light  btn">
                                <i class="material-icons left">add</i>
                                Add Data</a>
                            <!--<button data-target="modal1" class="btn modal-trigger">Tambah Record</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Responsive Table-->
        <div class="divider"></div>
        <div id="responsive-table">
            <h4 class="header">Data Mahasiswa Fakultas Ilmu Komputer</h4>
            <div class="row">
                <div class="col s12">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th data-field="id">NPM</th>
                                <th data-field="name">Nama</th>
                                <th data-field="email">Jurusan</th>
                                <th data-field="address">Angkatan</th>
                                <th data-field="no">Asal</th>
                                <th data-field="age">View</th>
                                <th data-field="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mhs as $mahasiswa)

                            <tr>
                                <td>{{ $mahasiswa->npm }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->jurusan }}</td>
                                <td>{{ $mahasiswa->angkatan }}</td>
                                <td>{{ $mahasiswa->asal }}</td>
                                <td>
                                    <button data-target="{{ $mahasiswa->npm }}" class="btn modal-trigger">Detail</button>
                                    <!-- Modal Structure -->
                                    <div id="{{ $mahasiswa->npm }}" class="modal">
                                        <div class="modal-content">
                                            <div id="responsive-table">
                                                <h4 class="header">Data Mahasiswa {{ $mahasiswa->nama }}</h4>
                                                <div class="row">
                                                    <div class="col s12">
                                                            <table>
                                                                <tr>
                                                                    <td>NPM Mahasiswa</td>
                                                                    <td>
                                                                        {{ $mahasiswa->npm }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Mahasiswa</td>
                                                                    <td>
                                                                        {{ $mahasiswa->nama }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jurusan</td>
                                                                    <td>
                                                                        {{ $mahasiswa->jurusan }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Angkatan</td>
                                                                    <td>
                                                                        {{ $mahasiswa->angkatan }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Asal Kota</td>
                                                                    <td>
                                                                        {{ $mahasiswa->asal }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Jenis Kelamin</td>
                                                                    <td>
                                                                        {{ $mahasiswa->jenis_kelamin }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tanggal lahir</td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($mahasiswa->tgl_lahir)->format('d/m/Y')}}</td>
                                                                </tr>
                                                            </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Exit</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('alumni.edit',$mahasiswa->id)}}" class="blue waves-effect waves-light  btn">
                                        <i class="material-icons left">settings_backup_restore</i>
                                        Edit</a>
                                        <form action="{{ route('alumni.destroy', $mahasiswa->id)}}"  onsubmit="return confirm('Hapus data {{ $alumni->nama }} ?')" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="red btn waves-effect waves-light" type="submit" name="action" value="PUBLISH">Delete
                                                        <i class="material-icons right">delete</i>
                                                    </button>
                                              </form>
                                    <!--<a class="waves-effect waves-light  btn">
                                        <i class="material-icons left">delete</i>
                                        Delete</a>-->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="center-align">
                            @include('pagination.default', ['paginator' => $mhs])</div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- END CONTENT -->
@endsection
