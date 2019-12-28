@foreach ($info as $inf)

                            <tr>
                                <td><a
                                    href="{{ route('pengumuman.show', $inf->slug)}}">
                                    {{ $inf->judul }}</a> </td>
                                <td>{{ $inf->kategori }}</td>
                                <td>{{ $inf->status }}</td>

                                <td>
                                    <a
                                        href="{{ route('pengumuman.edit',$inf->id)}}"
                                        class="blue waves-effect waves-light  btn">
                                        {{-- <i class="material-icons left">settings_backup_restore</i> --}}
                                        Edit</a>
                                    <form
                                        action="{{ route('pengumuman.destroy', $inf->id)}}"
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
