@extends('layouts.app')

@section('content')
    <div class="hasil">
        {{-- judul tabel --}}
        <h3 class="form-tittle mb-4"><b>Pantau Progres Pendaftaran Beasiswamu!</b></h3>
        <hr>
        <table class="table">
            {{-- konten pada tabel --}}
            <thead>
                <tr>
                    {{-- header tiap kolom pada tabel --}}
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Semester Saat Ini</th>
                    <th scope="col">IPK Terakhir</th>
                    <th scope="col">Pilihan Beasiswa</th>
                    <th scope="col">Berkas Syarat</th>
                    <th scope="col">Status Ajuan</th>
                </tr>
            </thead>
            <tbody>
                {{-- data yang akan ditampilkan dalam tabel --}}
                @forelse ($beasiswa as $index => $data)
                    <tr>
                        {{-- menampilkan data pendaftar --}}
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->semester }}</td>
                        <td>{{ $data->ipk }}</td>
                        <td>{{ $data->jenis_beasiswa }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $data->berkas) }}" _target="blank">Lihat Berkas</a>
                        </td>
                        <td>{{ $data->status_ajuan }}</td>

                        <td>
                            <span>

                                <div class="badge">
                                    {{ $data->status_ajuan == 'belum di verifikasi' ? 'bg-warning' : 'bg-success' }}">
                                    {{ ucfirst($data->status_ajuan) }}</div>
                            </span>
                        </td>


                    </tr>

                @empty
                {{-- jika tidak ada data pendaftaran, tampilkan pesan... --}}
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data pendaftaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
