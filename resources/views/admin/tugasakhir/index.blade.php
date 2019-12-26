@extends('admin.master')
@section('judul_halaman', 'Tugas Akhir Mahasiswa')
@section('konten')
<!-- START CONTENT -->

<section id="content">
<!--breadcrumbs start-->

<div id="breadcrumbs-wrapper">
    <!-- Search for small screen --
    <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
        <input
            type="text"
            name="Search"
            class="header-search-input z-depth-2"
            placeholder="Search"></div>-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Data Tugas Akhir Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li class="active">Tugas Akhir Mahasiswa</li>
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

                </div>
                <div class="row">
                    <div class="container">
                        <div class="col s12">

                            <a href="{{url('admin/ta/create')}}" class="blue waves-effect waves-light  btn">
                                <i class="material-icons left">add</i>
                                Tambah Data</a>
                            <!--<button data-target="modal1" class="btn modal-trigger">Tambah Record</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!--Responsive Table-->
         <div class="divider"></div>
         @if(session('status'))
         <div class="alert alert-success">
           {{session('status')}}
         </div>
       @endif
        <!--Responsive Table-->
        <div class="divider"></div>
        <div id="responsive-table">
            <h4 class="header">Data Tugas Akhir Mahasiswa Fakultas Ilmu Komputer</h4>
            <div class="row">
                <div class="col s12">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th data-field="no">Nama Mahasiswa</th>
                                <th data-field="id">NPM Mahasiswa</th>
                                <th data-field="name">Jurusan</th>
                                <th data-field="email">Judul</th>
                                <th data-field="age">Lihat</th>
                                <th data-field="action">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mhs as $mahasiswa)

                            <tr>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->npm }}</td>
                                <td>{{ $mahasiswa->jurusan }}</td>
                                <td>{{ $mahasiswa->judul }}</td>
                                <td>
                                    <button data-target="{{ $mahasiswa->id }}" class="green btn modal-trigger">Detail</button>
                                    <!-- Modal Structure -->
                                    <div id="{{ $mahasiswa->id }}" class="modal">
                                        <div class="modal-content">
                                            <div id="responsive-table">
                                                <h4 class="header">Data TA Mahasiswa</h4>
                                                <div class="row">
                                                    <div class="col s12">
                                                            <table>

                                                                <tr>
                                                                    <td>Nama Mahasiswa</td>
                                                                    <td>
                                                                        {{ $mahasiswa->nama }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NPM</td>
                                                                    <td>
                                                                        {{ $mahasiswa->npm }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jurusan</td>
                                                                    <td>
                                                                        {{ $mahasiswa->jurusan }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Judul TA</td>
                                                                    <td>
                                                                        {{ $mahasiswa->judul }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Dosen Pembimbing 1</td>
                                                                    <td>
                                                                        {{ $mahasiswa->dospem1 }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Nama Dosen Pembimbing 2</td>
                                                                    <td>
                                                                        {{ $mahasiswa->dospem2 }}
                                                                    </td>
                                                                </tr>

                                                            </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Keluar</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('ta.edit',$mahasiswa->id)}}" class="yellow darken-2 waves-effect waves-light  btn">
                                        <i class="material-icons left">settings_backup_restore</i>
                                        Ubah</a>
                                        <form action="{{ route('ta.destroy', $mahasiswa->id)}}"  onsubmit="return confirm('Hapus data {{ $mahasiswa->id }} ?')" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="red btn waves-effect waves-light" type="submit" name="action" value="PUBLISH">Hapus
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
