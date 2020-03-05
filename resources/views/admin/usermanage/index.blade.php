@extends('admin.master')
@section('judul_halaman', 'User Manage')
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
                    <h5 class="breadcrumbs-title">Data User</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li class="active">User Manage</li>
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

                            <a href="{{url('admin/user/create')}}" class="waves-effect waves-light  btn">
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
                                <th data-field="id">NIP</th>
                                <th data-field="name">Nama</th>
                                <th data-field="email">Username</th>
                                <th data-field="address">Email</th>
                                <th data-field="no">Role</th>
                                <th data-field="age">View</th>
                                <th data-field="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dt as $mahasiswa)

                            <tr>
                                <td>{{ $mahasiswa->nip }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->username }}</td>
                                <td>{{ $mahasiswa->email }}</td>
                                <td>@foreach (json_decode($mahasiswa->roles) as $role)
                                        &middot; {{$role}} <br>
                                    @endforeach</td>
                                <td>
                                    <button data-target="{{ $mahasiswa->id }}" class="btn modal-trigger">Detail</button>
                                    <!-- Modal Structure -->
                                    <div id="{{ $mahasiswa->id }}" class="modal">
                                        <div class="modal-content">
                                            <div id="responsive-table">
                                                <h4 class="header">Data User {{ $mahasiswa->nama }}</h4>
                                                <div class="center-align"><img src="{{asset('storage/' . $mahasiswa->avatar)}}" width="120px"/></div>
                                                <div class="row">
                                                    <div class="col s12">
                                                            <table>
                                                                <tr>
                                                                    <td>NIP User</td>
                                                                    <td>
                                                                        {{ $mahasiswa->nip }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>
                                                                        {{ $mahasiswa->nama }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>email</td>
                                                                    <td>
                                                                        {{ $mahasiswa->email }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jabatan</td>
                                                                    <td>
                                                                        {{ $mahasiswa->jabatan }}
                                                                    </td>
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
                                    <a href="{{ route('user.edit',$mahasiswa->id)}}" class="blue waves-effect waves-light  btn">
                                        <i class="material-icons left">settings_backup_restore</i>
                                        Edit</a>
                                        <form action="{{ route('user.destroy', $mahasiswa->id)}}"  onsubmit="return confirm('Hapus data {{ $mahasiswa->nama }} ?')" method="post">
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
                            @include('pagination.default', ['paginator' => $dt])</div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- END CONTENT -->
@endsection
