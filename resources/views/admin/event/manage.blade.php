@extends('admin.master') @section('judul_halaman', 'Event')
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
                placeholder="Search">
        </div>
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Data Event</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/event')}}">Event</a>
                        </li>
                        <li class="active">Manage</li>
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

                            <a
                                href="{{route('event.create')}}"
                                class="waves-effect waves-light  btn">
                                <i class="material-icons left">add</i>
                                Add Data</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Responsive Table-->
        <div class="divider"></div>
        <div id="responsive-table">
            <h4 class="header">Data Event Fakultas Ilmu Komputer</h4>
            <div class="row">
                <div class="col s12">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th data-field="judul">judul</th>
                                <th data-field="kategori">kategori</th>
                                <th data-field="status">status</th>
                                <th data-field="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($info as $inf)

                            <tr>
                                <td><a
                                    href="{{ route('event.show', $inf->slug)}}">
                                    {{ $inf->judul }}</a> </td>
                                <td>{{ $inf->kategori }}</td>
                                <td>{{ $inf->status }}</td>

                                <td>
                                    <a
                                        href="{{ route('event.edit',$inf->id)}}"
                                        class="blue waves-effect waves-light  btn">
                                        <i class="material-icons left">settings_backup_restore</i>
                                        Edit</a>
                                    <form
                                        action="{{ route('event.destroy', $inf->id)}}"
                                        onsubmit="return confirm('Hapus data {{ $inf->judul }} ?')"
                                        method="post">
                                        @csrf @method('DELETE')
                                        <button
                                            class="red btn waves-effect waves-light"
                                            type="submit"
                                            name="action"
                                            value="PUBLISH">Delete
                                            <i class="material-icons right">delete</i>
                                        </button>
                                    </form>
                                    <!--<a class="waves-effect waves-light btn"> <i class="material-icons
                                    left">delete</i> Delete</a>-->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="center-align">
                            @include('pagination.default', ['paginator' => $info])</div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- END CONTENT -->
@endsection
