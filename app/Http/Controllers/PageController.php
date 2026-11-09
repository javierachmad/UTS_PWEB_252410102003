<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login() {
        return view('login');
    }

    public function dashboard(Request $request) {
        $username = $request->input('username', 'Guest');

        if ($request->isMethod('post')) {
            $password = $request->input('password');
            if ($password !== 'rahasia123') {
                return redirect('/')->with('error', 'Password salah!');
            }
        }
        session(['courses' => [
            [
                'nama' => 'Pemrograman Berbasis Web', 
                'sks' => '3 SKS', 
                'dosen' => 'Mohammad Zarkasi, S.Kom., M.Kom.', 
                'kelas' => 'A',
                'ringkasan' => 'Pengantar konsep dan praktik pengembangan aplikasi berbasis web menggunakan arsitektur MVC.',
                'tugas' => [
                    ['nama' => 'Instalasi Laravel & Laragon', 'selesai' => true],
                    ['nama' => 'Membuat Layout UI dengan Blade', 'selesai' => true],
                    ['nama' => 'Implementasi Session Array', 'selesai' => true],
                    ['nama' => 'Finishing & Dokumentasi README.md', 'selesai' => true]
                ]
 
            ],
            [
                'nama' => 'Embedded System', 
                'sks' => '2 SKS', 
                'dosen' => 'Dr. Dwiretno Istiyadi, S.T., M.Kom.', 
                'kelas' => 'B',
                'ringkasan' => 'Perancangan hardware mikrokontroler dan arsitektur sistem tertanam.',
                'tugas' => [
                    ['nama' => 'Setup IDE & Library ESP32', 'selesai' => true],
                    ['nama' => 'Merangkai Sensor Gas MQ', 'selesai' => true],
                    ['nama' => 'Kalibrasi Sensor & Motor Driver', 'selesai' => true],
                    ['nama' => 'Merakit Sasis Mobile Robot', 'selesai' => true],
                    ['nama' => 'Presentasi Video Interaktif', 'selesai' => false]
                ]
                
            ],
            [
                'nama' => 'UI/UX', 
                'sks' => '3 SKS', 
                'dosen' => 'Narandha Arya Ranggianto S.Kom., M.Kom.', 
                'kelas' => 'B',
                'ringkasan' => 'Perancangan antarmuka (User Interface) dan pengalaman pengguna (User Experience).',
                'tugas' => [
                    ['nama' => 'User Research & Wireframing', 'selesai' => true],
                    ['nama' => 'Desain High-Fidelity di Figma', 'selesai' => true],
                    ['nama' => 'Prototyping & Usability Testing', 'selesai' => false]
                ]
                
            ]
        ]]);

        $courses = session('courses', []);

        return view('dashboard', [
            'username' => $username,
            'courses' => $courses
        ]);
    }

    public function pengelolaan(Request $request) {
        $username = $request->input('username', 'Guest');
        
        $courses = session('courses', []);

        return view('pengelolaan', [
            'username' => $username,
            'courses' => $courses
        ]);
    }


    public function profile(Request $request) {
        $username = $request->input('username', 'Guest');

        $data_profil = [
            'role' => 'Mahasiswa',
            'email' => strtolower(str_replace(' ', '', $username)) . '@student.ac.id',
            'bio' => 'Berkomitmen untuk menyelesaikan semua tugas kuliah tepat waktu dan rapi.',
            'total_tugas_selesai' => count(session('courses', []))
        ];

        return view('profile', [
            'username' => $username,
            'profil' => $data_profil
        ]);
    }


    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}