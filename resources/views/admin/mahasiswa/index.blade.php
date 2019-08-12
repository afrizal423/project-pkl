@extends('admin.master')
@section('judul_halaman', 'Mahasiswa')
@section('konten')
<!-- START CONTENT -->

<section id = "content" >
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
                            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                            <textarea name="content" class="form-control my-editor"></textarea>
                            <script>
                                var editor_config = {
                                    path_absolute: "/",
                                    selector: "textarea.my-editor",
                                    plugins: [
                                        "advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern"
                                    ],
                                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter align" +
                                            "right alignjustify | bullist numlist outdent indent | link image media",
                                    relative_urls: false,
                                    file_browser_callback: function (field_name, url, type, win) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document
                                            .getElementsByTagName(
                                                'body'
                                            )[0]
                                            .clientWidth;
                                        var y = window.innerHeight || document.documentElement.clientHeight || document
                                            .getElementsByTagName(
                                                'body'
                                            )[0]
                                            .clientHeight;

                                        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' +
                                                field_name;
                                        if (type == 'image') {
                                            cmsURL = cmsURL + "&type=Images";
                                        } else {
                                            cmsURL = cmsURL + "&type=Files";
                                        }

                                        tinyMCE
                                            .activeEditor
                                            .windowManager
                                            .open({
                                                file: cmsURL,
                                                title: 'Filemanager',
                                                width: x * 0.8,
                                                height: y * 0.8,
                                                resizable: "yes",
                                                close_previous: "no"
                                            });
                                    }
                                };

                                tinymce.init(editor_config);
                            </script>

                            <a class="waves-effect waves-light  btn">
                                <i class="material-icons left">add</i>
                                Add Data</a>
                            <button data-target="modal1" class="btn modal-trigger">Tambah Record</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h5>Tambah Data Mahasiswa</h5>
                <form action="" method="post">
                    <table style="margin:20px auto;">
                        <tr>
                            <td>Waktu Transaksi</td>
                            <td>
                                <input type="date" name="waktu"></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>
                                    <div class="input-field">
                                        <input id="Keterangan" name="keterangan" type="text" class="validate">
                                            <label for="Keterangan">Keterangan</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>
                                        <div class="input-field">
                                            <select name="jenis">
                                                <option value="" disabled="disabled" selected="selected">Pilih Jenis</option>
                                                <option value="m">Pemasukkan</option>
                                                <option value="k">Keluaran</option>
                                            </select>
                                            <label>Jenis</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td>
                                        <input type="number" name="nominal"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" value="Tambah"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Exit</a>
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
                                                <th data-field="age">Age</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>S01</td>
                                                <td>Alfin</td>
                                                <td>alfin@email.com</td>
                                                <td>Surakarta, Central Java</td>
                                                <td>+62 8190 4073 250</td>
                                                <td>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">note</i>
                                                        Detail</a>
                                                </td>
                                                <td>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">settings_backup_restore</i>
                                                        Edit</a>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">delete</i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>S02</td>
                                                <td>Maulana</td>
                                                <td>maulana@email.com</td>
                                                <td>Boyolali, Central Java</td>
                                                <td>+62 8944 9112 095</td>
                                                <td>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">note</i>
                                                        Detail</a>
                                                </td>
                                                <td>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">settings_backup_restore</i>
                                                        Edit</a>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">delete</i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>S03</td>
                                                <td>Citra</td>
                                                <td>citra@email.com</td>
                                                <td>Jakarta, West Java</td>
                                                <td>+62 8572 6534 114</td>
                                                <td>34</td>
                                                <td>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">settings_backup_restore</i>
                                                        Edit</a>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">delete</i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>S04</td>
                                                <td>Rahma</td>
                                                <td>rahma@email.com</td>
                                                <td>Surabaya, East Java</td>
                                                <td>+62 8555 4145 279</td>
                                                <td>28</td>
                                                <td>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">settings_backup_restore</i>
                                                        Edit</a>
                                                    <a class="waves-effect waves-light  btn">
                                                        <i class="material-icons left">delete</i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END CONTENT -->
            @endsection
