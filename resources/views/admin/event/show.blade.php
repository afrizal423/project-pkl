@extends('admin.master') @section('judul_halaman', 'Pengumuman')
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
                    <h5 class="breadcrumbs-title">Data Pengumuman</h5>
                    <ol class="breadcrumbs">
                        <li>
                            <a href="{{url('admin')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/pengumuman')}}">Pengumuman</a>
                        </li>
                        <li class="active">Lihat</li>
                        <li class="active">{{$inf->judul}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m9 l9">
            <div class="card">
                <h4>{{$inf->judul}}</h4>
                <div >
                        <img style="width:max-content;height:250px"class="responsive-img" src="{{url('storage',$inf->gambar)}}">
                        <div  style="font-size:9pt;" class="">By {{$inf->name}} • {{ \Carbon\Carbon::parse($inf->created_at)->format('j F, Y h:i:s A')}}</div>
                </div><hr style="margin:20px">
                <div>
                        {!!$inf->konten!!}
                </div>
            </div>
        </div>
        <div class="col s12 m3 l3">
            <div class="card">
                <div style="margin:10px">
                <b>Author</b>: {{$inf->name}} <br>
                <b>Created at</b>: {{ \Carbon\Carbon::parse($inf->created_at)->format('j F, Y h:i:s A')}} <br>
                <b>Update at</b>: {{ \Carbon\Carbon::parse($inf->updated_at)->format('j F, Y h:i:s A')}} <br>
                <a href="{{ route('event.edit',$inf->id)}}" class="blue waves-effect waves-light  btn">
                        <i class="material-icons left">settings_backup_restore</i>
                        Edit</a>
                        <form action="{{ route('event.destroy', $inf->id)}}"  onsubmit="return confirm('Hapus pengumuman {{ $inf->judul }} ?')" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="red btn waves-effect waves-light" type="submit" name="action" value="PUBLISH">Delete
                                        <i class="material-icons right">delete</i>
                                    </button>
                              </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</section>
<!-- END CONTENT -->
@endsection
