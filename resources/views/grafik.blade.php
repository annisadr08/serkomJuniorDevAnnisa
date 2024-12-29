@extends('layouts.app')

@section('content')

    

    <div class="w-full mx-auto max-w-5xl overflow-visible pl-64" style="margin-top: 100px">
        <div class="bg-white rounded-md shadow-md mb-10 px-5 pb-5">
            <!-- Judul halaman -->
            <h3 class="text-3xl font-bold text-gray-800 mt-24 text-center pt-10"><b>Grafik Pendaftaran Beasiswa</b></h3>
            <div class="flex justify-center items-center relative overflow-hidden sm:rounded-lg">
                <div class="w-full pt-10">
                    <!-- Kanvas menampilkan grafik Chart.js -->
                    <canvas id="beasiswaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mengambil context dari elemen canvas untuk Chart.js
        const ctx = document.getElementById('beasiswaChart').getContext('2d');

        // Menginisialisasi jumlah pendaftaran berdasarkan kategori beasiswa
        // Membuat objek untuk menyimpan jumlah pendaftar untuk setiap kategori beasiswa.
        const beasiswaCounts = {
            'Ekstensi D3-S1 Batch 1': 0,
            'Jalur Vokasi': 0,
            'UTG-1': 0,
        };

        // Looping untuk menghitung jumlah pendaftar setiap jenis beasiswa
        @foreach ($beasiswa as $bea)
            if (beasiswaCounts.hasOwnProperty('{{ ucfirst($bea->jenis_beasiswa) }}')) {
                // Menambah jumlah pendaftar untuk jenis beasiswa yang sesuai
                beasiswaCounts['{{ ucfirst($bea->jenis_beasiswa) }}']++;
            }
        @endforeach

        // Inisialisasi dan konfigurasi grafik Chart.js
        const myChart = new Chart(ctx, {
            type: 'line', // Jenis grafik yang digunakan (line chart)
            data: {
                // Menentukan label berdasarkan kunci dari objek beasiswaCounts
                labels: Object.keys(beasiswaCounts),
                datasets: [{
                    label: 'Jumlah Pendaftar', // Label dataset
                    data: Object.values(beasiswaCounts), // Data jumlah pendaftar untuk setiap beasiswa
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Warna latar Ekstensi D3-S1 Batch 1
                        'rgba(255, 99, 132, 0.2)', // Warna latar Jalur Vokasi
                        'rgba(255, 206, 86, 0.2)', // Warna latar UTG-1
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Warna border Ekstensi D3-S1 Batch 1
                        'rgba(255, 99, 132, 1)', // Warna border Jalur Vokasi
                        'rgba(255, 206, 86, 1)', // Warna border UTG-1
                    ],
                    borderWidth: 1 // Ketebalan border grafik
                }]
            },
            options: {
                scales: {
                    // Konfigurasi sumbu Y
                    y: {
                        beginAtZero: true, // Mulai dari 0 pada sumbu Y
                        ticks: {
                            font: {
                                family: 'Poppins', // Font untuk sumbu Y
                                size: 14, // Ukuran font
                            }
                        }
                    },
                    // Konfigurasi sumbu X
                    x: {
                        ticks: {
                            font: {
                                family: 'Poppins', // Font untuk sumbu X
                                size: 14, // Ukuran font
                            }
                        }
                    }
                },
                plugins: {
                    // Konfigurasi legenda grafik
                    legend: {
                        labels: {
                            font: {
                                family: 'Poppins', // Font untuk label di legenda
                                size: 14, // Ukuran font
                            }
                        }
                    },
                },
                layout: {
                    // Mengatur padding di sekitar grafik
                    padding: {
                        left: 10,
                        right: 40
                    }
                }
            }
        });
    </script>
@endsection