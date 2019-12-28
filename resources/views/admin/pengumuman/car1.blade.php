@foreach ($info as $inf)


            <div class="col s12 m4 l4">
                    <div class="blog">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <a href="{{route('pengumuman.show',$inf->slug)}}"><img src="{{asset('storage/' . $inf->gambar)}}" alt="blog-img">
                                    </a>
                                </div>

                                <div class="card-content">
                                    <p class="row">
                                        <span class="left">
                                        <a href="#">{{ $inf->kategori }}</a>
                                        </span>
                                        <span class="right">{{ \Carbon\Carbon::parse($inf->created_at)->format('d/m/Y')}}</span>
                                    </p>
                                    <h4 class="card-title grey-text text-darken-4">
                                    <a href="{{route('pengumuman.show',$inf->slug)}}" class="grey-text text-darken-4">{{ $inf->judul }}</a>
                                    </h4>
                                <p class="blog-post-content">{!!Str::words($inf->konten, 15)
                                    !!}</p>
                                    <div class="row">
                                        <div class="col s2">
                                            <img
                                                src="{{asset('storage/' . Auth::user()->avatar)}}"
                                                alt=""
                                                class="circle responsive-img valign profile-image">
                                        </div>
                                        <div class="col s9">
                                            Penulis
                                            <a href="#">{{ $inf->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">
                                        <i class="mdi-navigation-close right"></i>
                                        Apple MacBook Pro A1278 13"</span>
                                    <p>Here is some more information about this blog that is only revealed once
                                        clicked on.</p>
                                </div>
                            </div>
                        </div>
            </div>
            @endforeach
