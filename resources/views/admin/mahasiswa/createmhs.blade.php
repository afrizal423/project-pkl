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
                            <a href="{{url('admin/mahasiswa')}}">List Mahasiswa</a>
                        </li>
                        <li class="active">Tambah Data Mahasiswa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <div id="responsive-table">
        <h4 class="header">Tambah Data Mahasiswa Fakultas Ilmu Komputer</h4>
        <div class="row">
            <div class="col s12">
                <form action="" method="post">
                    @csrf
                    <table style="margin:20px auto;">
                        <tr>
                            <td>NPM Mahasiswa</td>
                            <td>
                                <div class="input-field">
                                    <input id="npm" name="npm" type="text" class="validate">
                                    <label for="npm">NPM Mahasiswa</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Mahasiswa</td>
                            <td>
                                <div class="input-field">
                                    <input id="nama" name="nama" type="text" class="validate">
                                    <label for="nama">Nama Mahasiswa</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>
                                <div class="input-field">
                                    <input id="jurusan" name="jurusan" type="text" class="validate">
                                    <label for="jurusan">Jurusan</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Angkatan</td>
                            <td>
                                <div class="input-field">
                                    <input id="angkatan" name="angkatan" type="text" class="validate">
                                    <label for="angkatan">Angkatan</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Asal Kota</td>
                            <td>
                                <div class="input-field">
                                    <input id="asal" name="asal" type="text" class="validate">
                                    <label for="asal">Asal Kota</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <div class="input-field">
                                    <select name="jenis_kelamin">
                                        <option value="" disabled="disabled" selected="selected">Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label>Jenis</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal lahir</td>
                            <td>
                                <input type="date" name="tgl_lahir"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>

                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
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
