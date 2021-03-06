@extends('admin.master')
@section('konten')
<!-- START CONTENT -->
<section id="content">
    <!--start container-->
    <div class="container">
        <!--card stats start-->
        <div id="card-widgets">
            <div class="row ">
                <div class="col s12 m12 l12 center">
                    <h5>Welcome
                        {{ Auth::user()->name }}
                        to the admin panel page. Have a nice day Sir!😊.</h5>
                </div>
            </div>
        </div>
        <div id="card-stats">
            <div class="row mt-1">
                <div class="col s12 m6 l3">
                    <div
                        class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                        <div class="padding-4">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">people</i>
                                <p>Total Mahasiswa Skripsi</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0">20</h5>
                                <p class="no-margin">Tahun 2019</p>
                                <p>120</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div
                        class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                        <div class="padding-4">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">perm_identity</i>
                                <p>Total Mahasiswa PKL</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0">130</h5>
                                <p class="no-margin">Tahun 2019</p>
                                <p>68</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div
                        class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                        <div class="padding-4">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">timeline</i>
                                <p>Total Mahasiswa Berprestasi</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0">14</h5>
                                <p class="no-margin">Tahun 2019</p>
                                <p>120</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div
                        class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                        <div class="padding-4">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">tag_faces</i>
                                <p>Data Alumni</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0">20</h5>
                                <p class="no-margin">Tahun 2019</p>
                                <p>1.200</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- -->
        <!--work collections end-->

        <!--
        //////////////////////////////////////////////////////////////////////////// -->
    </div>
    <!--end container-->
</section>
<!-- END CONTENT -->
@endsection
