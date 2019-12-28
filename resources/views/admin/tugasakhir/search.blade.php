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
