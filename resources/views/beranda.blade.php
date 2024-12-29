@extends('layouts.app')


@section('content')

    {{-- Headline --}}
    <div class="headline row">
        <div class="col-4 d-flex" style="justify-content: center; align-items: center; margin-top: 100px;">
            <h1 style="color: #740124;">Wujudkan Mimpi dengan Telkom University Purwokerto</h1>
        </div>

        {{-- gambar headline --}}
        <div class="col-8"> 
            <img src="https://smb.telkomuniversity.ac.id/wp-content/uploads/2024/08/Mahasiswa-Telkom-University-Wajib-Asrama-Ini-Aturannya-1.jpg" class="headline-img img-fluid" style="margin-top: 100px;" alt="...">         </div>
    </div>

    <div class="konten">
        {{-- judul konten --}}
        <div class="konten-header">
            <h3><b>Raih Kesempatan Emas dengan Beasiswa yang Tepat</b></h3>
        </div>

        <hr>

      <div class="card-beasiswa d-flex" style="gap: 30px; justify-content: center;">

          {{-- Pilihan Beasiswa 1 --}}
          <div class="card" style="width: 18rem;">
              {{-- gambar u/ card --}}
              <img src="https://smb.telkomuniversity.ac.id/wp-content/uploads/2023/03/featured-image-jalur-seleksi-ekstensi-batch-1-telkom-university-2025.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                {{-- nama beasiswa & desc singkat --}}
                <h5 class="card-title">Ekstensi D3-S1 Batch 1</h5>
                <p class="card-text">Telkom University membuka program Direct Track Ekstensi untuk program Ekstensi dari Diploma (D3) ke Sarjana (S1)</p>
                <a href="#" class="read-more body-2" style="margin-top: auto; font-size: smaller;">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

            {{-- Pilihan Beasiswa 2 --}}
            <div class="card" style="width: 18rem;">
              {{-- gambar u/ card --}}
              <img src="https://smb.telkomuniversity.ac.id/wp-content/uploads/2023/02/featured-image-jalur-seleksi-vokasi-november-telkom-university-2025-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                {{-- nama beasiswa & desc singkat --}}
                <h5 class="card-title">Jalur Vokasi</h5>
                <p class="card-text">Jalur Vokasi adalah jalur seleksi yang dibuka oleh Telkom University khusus untuk Program Diploma (D3) dan Sarjana Terapan (S1 Terapan). </p>
                <a href="#" class="read-more body-2" style="margin-top: auto; font-size: smaller;">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>

            {{-- Pilihan Beasiswa 3 --}}
            <div class="card" style="width: 18rem;">
              {{-- gambar u/ card --}}
              <img src="https://smb.telkomuniversity.ac.id/wp-content/uploads/2023/02/featured-image-jalur-seleksi-utg-1-telkom-university-2025.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                {{-- nama beasiswa & desc singkat --}}
                <h5 class="card-title">UTG-1</h5>
                <p class="card-text">Pada jalur seleksi UTG 1 ini, peserta dengan usia maksimal 25 tahun dapat menjadi mahasiswa Telkom University dengan mengikuti seleksi tes tulis yang ada pada UTG 1 ini.</p>
                <a href="#" class="read-more body-2" style="margin-top: auto; font-size: smaller;">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
      </div>
    </div>
@endsection