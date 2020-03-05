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
