@foreach ($mhs as $mahasiswa)

<tr>
    <td>{{ $mahasiswa->npm }}</td>
    <td>{{ $mahasiswa->nama }}</td>
    <td>{{ $mahasiswa->jurusan }}</td>
    <td>{{ $mahasiswa->angkatan }}</td>
    <td>{{ $mahasiswa->asal }}</td>
    <td>
        <button data-target="{{ $mahasiswa->npm }}" class="green btn modal-trigger">Detail</button>
        <!-- Modal Structure -->
        <div id="{{ $mahasiswa->npm }}" class="modal">
            <div class="modal-content">
                <div id="responsive-table">
                    <h4 class="header">Data Mahasiswa {{ $mahasiswa->nama }}</h4>
                    <div class="row">
                        <div class="col s12">
                                <table>
                                    <tr>
                                        <td>NPM Mahasiswa</td>
                                        <td>
                                            {{ $mahasiswa->npm }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Mahasiswa</td>
                                        <td>
                                            {{ $mahasiswa->nama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>
                                            {{ $mahasiswa->jurusan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan</td>
                                        <td>
                                            {{ $mahasiswa->angkatan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Asal Kota</td>
                                        <td>
                                            {{ $mahasiswa->asal }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            {{ $mahasiswa->jenis_kelamin }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal lahir</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($mahasiswa->tgl_lahir)->format('d/m/Y')}}</td>
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
        <a href="{{ route('mahasiswa.edit',$mahasiswa->id)}}" class="yellow darken-2 waves-effect waves-light  btn">
            <i class="material-icons left">settings_backup_restore</i>
            Edit</a>
            <form action="{{ route('alumni.destroy', $mahasiswa->id)}}"  onsubmit="return confirm('Hapus data {{ $mahasiswa->nama }} ?')" method="post">
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
