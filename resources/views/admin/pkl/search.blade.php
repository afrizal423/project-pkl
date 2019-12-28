@foreach ($mhs as $mahasiswa)

                            <tr>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->npm }}</td>
                                <td>{{ $mahasiswa->jurusan }}</td>
                                <td>{{ $mahasiswa->namainstansi }}</td>
                                <td>
                                    <button data-target="{{ $mahasiswa->id }}" class="green btn modal-trigger">Detail</button>
                                    <!-- Modal Structure -->
                                    <div id="{{ $mahasiswa->id }}" class="modal">
                                        <div class="modal-content">
                                            <div id="responsive-table">
                                                <h4 class="header">Data PKL Mahasiswa</h4>
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
                                                                    <td>Judul PKL</td>
                                                                    <td>
                                                                        {{ $mahasiswa->judulpkl }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Instansi</td>
                                                                    <td>
                                                                        {{ $mahasiswa->namainstansi }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Alamat Instansi</td>
                                                                    <td>
                                                                        {{ $mahasiswa->alamatinstansi }}
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
                                    <a href="{{ route('pkl.edit',$mahasiswa->id)}}" class="yellow darken-2 waves-effect waves-light  btn">
                                        <i class="material-icons left">settings_backup_restore</i>
                                        Ubah</a>
                                        <form action="{{ route('pkl.destroy', $mahasiswa->id)}}"  onsubmit="return confirm('Hapus data {{ $mahasiswa->id }} ?')" method="post">
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
