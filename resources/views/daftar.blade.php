@extends('layouts.app') 

@section('content')
    <div class="form">
        {{-- menampilkan pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        {{-- menampilkan pesan error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- judul form --}}
        <div class="form-tittle">
            <h3><b>Daftar Beasiswa</b></h3>
        </div>
        {{-- form pendaftaran mahasiswa --}}
        <form action="/daftar" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- FIELD NAMA --}}
            <div class="form-content">
                {{-- label input nama --}}
                <h6 class="labelform"><b>Masukan Nama</b></h6>
                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                    aria-label="default input example" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIELD EMAIL --}}
            <div class="form-content">
                {{-- label input email --}}
                <h6 class="labelform"><b>Masukan Email</b></h6>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                    aria-label="default input example" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIELD NO HP --}}
            <div class="form-content">
                {{-- label input no hp --}}
                <h6 class="labelform"><b>No HP</b></h6>
                <input class="form-control @error('no_hp') is-invalid @enderror" type="text" name="no_hp"
                    aria-label="default input example" value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIELD SMT SAAT INI --}}
            <div class="form-content">
                {{-- label input smt saat ini --}}
                <h6 class="labelform"><b>Semester Saat Ini</b></h6>
                {{-- membuat dropdown menu untuk memilih semester --}}
                <select class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester">
                    <option value="" disabled selected>Pilih Semester</option>
                    {{-- looping untuk menghasilkan pilihan semester --}}
                    @for ($i = 1; $i <= 8; $i++)
                        {{-- nilai yg dikirimkan ke server saat opsi dipilih --}}
                        <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endfor
                </select>

                {{-- penanganan error validasi --}}
                @error('semester')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIELD IPK --}}
            <div class="form-content">
                {{-- label field IPK, diisi otomatis --}}
                <h6 class="labelform"><b>IPK Terakhir</b></h6>
                <input class="form-control @error('ipk') is-invalid @enderror" type="text" id="ipk" name="ipk"
                    aria-label="default input example" readonly value="{{ old('ipk') }}">
                @error('ipk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIELD BEASISWA --}}
            {{-- dropdown untuk memilih pilihan beasiswa --}}
            <div class="form-content">
                <h6 class="labelform"><b>Pilihan Beasiswa</b></h6>
                <select class="form-control @error('jenis_beasiswa') is-invalid @enderror" name="jenis_beasiswa" disabled>
                    <option value="" disabled selected>Pilihan Beasiswa</option>
                    <option value="Ekstensi D3-S1 Batch 1" {{ old('jenis_beasiswa') == 'Ekstensi D3-S1 Batch 1' ? 'selected' : '' }}>Ekstensi D3-S1 Batch 1</option>
                    <option value="Jalur Vokasi" {{ old('jenis_beasiswa') == 'Jalur Vokasi' ? 'selected' : '' }}>Jalur Vokasi</option>
                    <option value="UTG-1" {{ old('jenis_beasiswa') == 'UTG-1' ? 'selected' : '' }}>UTG-1</option>
                </select>
                @error('jenis_beasiswa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FIELD BERKAS --}}
            {{-- input untuk mengunggah berkas syarat --}}
            <div class="form-content">
                <h6 class="labelform"><b>Upload Berkas Syarat</b></h6>
                {{-- input untuk mengunggah berkas --}}
                <input class="form-control @error('berkas') is-invalid @enderror" type="file" id="fileUpload"
                    name="berkas" accept=".pdf,.jpg,.zip" disabled>
                @error('berkas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- BUTTON --}}
            {{-- tombol aksi --}}
            <div class="btn-form">
                <button type="button" class="btn btn-danger btn-custom">Batal</button>
                <button type="submit" class="btn btn-primary btn-custom" disabled>Daftar</button>
            </div>
        </form>
    </div>


    <!-- Script JavaScript untuk mengatur validasi dan input otomatis IPK berdasarkan pilihan semester -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ipkField = document.getElementById('ipk');
            const semesterSelect = document.getElementById('semester');
            const beasiswaSelect = document.querySelector('select[name="jenis_beasiswa"]');
            const berkasInput = document.getElementById('fileUpload');
            const submitButton = document.querySelector('button[type="submit"]');

            // Simulasi nilai IPK berdasarkan semester
            const ipkValues = {
                1: 2.8,
                2: 2.9,
                3: 3.0,
                4: 3.1,
                5: 3.2,
                6: 3.3,
                7: 3.4,
                8: 3.5
            };

            // Event listener untuk mengubah IPK saat semester dipilih
            semesterSelect.addEventListener('change', function() {
                const selectedSemester = parseInt(semesterSelect.value);
                const ipk = ipkValues[selectedSemester] || 0;
                ipkField.value = ipk;

                // Validasi apakah IPK memenuhi syarat minimal (>= 3.0)
                const isEligible = ipk >= 3.0;
                beasiswaSelect.disabled = !isEligible;
                berkasInput.disabled = !isEligible;
                submitButton.disabled = !isEligible;

                if (isEligible) {
                    beasiswaSelect.focus();
                }
            });

            // Memicu perubahan default saat halaman pertama kali dimuat
            semesterSelect.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
