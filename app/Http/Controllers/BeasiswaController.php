<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function beranda() {

        return view('beranda');
    }

    public function daftar() {

        return view('daftar');
    }


    public function store(Request $request)
    {
        // Validasi input pendaftaran
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'semester' => 'required|integer|between:1,8',
            'jenis_beasiswa' => 'required',
            'ipk' => 'required',
            'berkas' => 'required|file|mimes:pdf,jpg,png',
        ]);

        // Set nilai IPK berdasarkan semester yang dipilih
        $ipkValues = [
            1 => 2.8,
            2 => 2.9,
            3 => 3.0,
            4 => 3.1,
            5 => 3.2,
            6 => 3.3,
            7 => 3.4,
            8 => 3.5,
        ];

        // Mengambil nilai IPK sesuai semester dari array
        $semester = $request->input('semester');
        $ipk = isset($ipkValues[$semester]) ? $ipkValues[$semester] : 0;

        // Menyimpan berkas ke dalam direktori 'storage/app/public/berkas'
        $berkasPath = $request->file('berkas')->store('berkas', 'public');

        // Menyimpan data pendaftaran ke dalam database menggunakan model Beasiswa
        Beasiswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'semester' => $request->semester,
            'ipk' => $ipk,
            'jenis_beasiswa' => $request->jenis_beasiswa,
            'berkas' => $berkasPath,
            'status_ajuan' => 'belum di verifikasi',
        ]);

        // Redirect ke halaman hasil dengan pesan sukses
        return redirect('/hasil')->with('success', 'Pendaftaran berhasil!');
    }

    //Menampilkan data hasil pendaftaran beasiswa
    public function hasil()
    {
        // Mengambil data pendaftaran beasiswa dari database
        $beasiswa = Beasiswa::all();

        // Mengirim variabel ke view 'hasil'
        return view('hasil', compact('beasiswa'));
    }

    // Menampilkan grafik pendaftaran beasiswa
    public function grafik()
    {
        // Mengambil data pendaftaran beasiswa dari database
        $beasiswa = Beasiswa::all();

        // Mengirim variabel ke view 'grafik'
        return view('grafik', compact('beasiswa'));
    }

}
