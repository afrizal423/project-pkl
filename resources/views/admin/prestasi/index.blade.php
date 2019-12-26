@extends('admin.master')
@section('judul_halaman', 'Prestasi Mahasiswa')
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
                    <h5 class="breadcrumbs-title">Data Prestasi Mahasiswa</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li class="active">Prestasi Mahasiswa</li>
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

                            <a href="{{url('admin/prestasi/create')}}" class="blue waves-effect waves-light  btn">
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
            <h4 class="header">Data Prestasi Mahasiswa Fakultas Ilmu Komputer</h4>
            <div class="row">
                <div class="col s12">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th data-field="no">Nama Mahasiswa</th>
                                <th data-field="id">Nama Kegiatan/Acara</th>
                                <th data-field="name">Waktu Penyelenggaraan</th>
                                <th data-field="email">Prestasi Yang dicapai</th>
                                <th data-field="address">Individu/Team</th>
                                <th data-field="age">View</th>
                                <th data-field="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mhs as $mahasiswa)

                            <tr>
                                <td>{{ $mahasiswa->nama_mhs }}</td>
                                <td>{{ $mahasiswa->nama_kegiatan }}</td>
                                <td>{{ $mahasiswa->waktu_kegiatan }}</td>
                                <td>{{ $mahasiswa->prestasi_kejuaraan }}</td>
                                <td>{{ $mahasiswa->kelompok }}</td>
                                <td>
                                    <button data-target="{{ $mahasiswa->id }}" class="green btn modal-trigger">Detail</button>
                                    <!-- Modal Structure -->
                                    <div id="{{ $mahasiswa->id }}" class="modal">
                                        <div class="modal-content">
                                            <div id="responsive-table">
                                                <h4 class="header">Data Prestasi Mahasiswa</h4>
                                                <div class="row">
                                                    <div class="col s12">
                                                            <table>

                                                                <tr>
                                                                    <td>Nama Mahasiswa</td>
                                                                    <td>
                                                                        {{ $mahasiswa->nama_mhs }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jurusan</td>
                                                                    <td>
                                                                        {{ $mahasiswa->jurusan }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Kegiatan</td>
                                                                    <td>
                                                                        {{ $mahasiswa->nama_kegiatan }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Prestasi Juara</td>
                                                                    <td>
                                                                        {{ $mahasiswa->prestasi_kejuaraan }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Tim/Individu</td>
                                                                    <td>
                                                                        {{ $mahasiswa->kelompok }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Waktu Kegiatan</td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($mahasiswa->waktu_kegiatan)->format('d/m/Y')}}</td>
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
                                    <!--<a href="{{ route('mahasiswa.edit',$mahasiswa->id)}}" class="blue waves-effect waves-light  btn">
                                        <i class="material-icons left">settings_backup_restore</i>
                                        Edit</a>-->
                                        <form action="{{ route('prestasi.destroy', $mahasiswa->id)}}"  onsubmit="return confirm('Hapus data {{ $mahasiswa->id }} ?')" method="post">
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
