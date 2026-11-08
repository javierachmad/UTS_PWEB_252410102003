@extends('layouts.app')

@section('content')
<!-- Import Font 'Plus Jakarta Sans' -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

<div style="font-family: 'Plus Jakarta Sans', sans-serif;">
    
    <!-- Header Dashboard -->
    <div style="margin-bottom: 25px;">
        <h2 style="margin: 0 0 5px 0; font-size: 26px; color: rgb(65, 122, 230); font-weight: 800;">
            Dashboard  
        <img src="{{ asset('images/logoTracker.jpg') }}" alt="Logo Tracker" style="height: 60px; width: auto; mix-blend-mode: multiply;  margin: 0 -12px; transform: translateY(20px);"> 
            Tracker
        </h2>
        <p style="margin: 0; color: gray; font-size: 14px; font-weight: 500;">Ringkasan mata kuliah aktif kamu.</p>
    </div>

    @include('banner')

    <!-- Grid Kartu Mata Kuliah Tanpa Ringkasan -->
    @if(count($courses) > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; margin-bottom: 30px;">
            
            @foreach($courses as $c)
            <div style="background-color: #eff6ff; border-radius: 16px; padding: 22px; border: 1.5px solid #bfdbfe; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <!-- Judul Matkul & SKS -->
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                        <h3 style="margin: 0; color: #1e293b; font-size: 18px; font-weight: 800;">{{ $c['nama'] }}</h3>
                        <span style="font-weight: 800; color: #1e293b; font-size: 15px; white-space: nowrap; margin-left: 10px;">{{ $c['sks'] }}</span>
                    </div>

                    <!-- Information Dosen & Kelas (Ringkasan Dihapus) -->
                    <div style="display: flex; gap: 30px; margin-bottom: 20px; font-size: 13px;">
                        <div>
                            <span style="display: block; color: rgb(65, 122, 230); font-weight: 700; margin-bottom: 2px;">Dosen</span>
                            <span style="color: gray; font-weight: 600;">{{ $c['dosen'] }}</span>
                        </div>
                        <div>
                            <span style="display: block; color: rgb(65, 122, 230); font-weight: 700; margin-bottom: 2px;">Kelas</span>
                            <span style="color: gray; font-weight: 600;">{{ $c['kelas'] }}</span>
                        </div>
                    </div>
                </div>

                @php
                    // Hitung progres khusus untuk ditampilkan di Dashboard
                    $totalTugas = count($c['tugas'] ?? []);
                    $tugasSelesai = collect($c['tugas'] ?? [])->where('selesai', true)->count();
                    $persentase = $totalTugas > 0 ? round(($tugasSelesai / $totalTugas) * 100) : 0;
                @endphp

                <!-- Card Progres Tugas (Gaya Minimalis) -->
                <div style="background-color: white; border: 1px solid #e2e8f0; border-radius: 12px; padding: 15px; margin-bottom: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 8px;">
                        <span style="font-size: 14px; font-weight: 700; color: #0f172a;">Progres tugas</span>
                        <span style="font-size: 12px; color: gray;">{{ $tugasSelesai }} dari {{ $totalTugas }} tugas</span>
                    </div>
                    
                    <div style="font-size: 24px; font-weight: 800; color: #0f172a; margin-bottom: 10px;">
                        {{ $persentase }}<span style="font-size: 16px; color: gray; font-weight: 600;">%</span>
                    </div>

                    <!-- Bar Track & Fill -->
                    <div style="background-color: #f1f5f9; border-radius: 10px; height: 8px; width: 100%; overflow: hidden;">
                        <div style="background-color: #0f172a; height: 100%; width: {{ $persentase }}%; border-radius: 10px;"></div>
                    </div>
                </div>

                <!-- Tombol Detail -->
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" 
                   style="display: block; text-align: center; padding: 10px; background-color: transparent; border: 2px solid #3b82f6; color: #3b82f6; text-decoration: none; border-radius: 10px; font-weight: 700; font-size: 15px; transition: 0.2s;">
                    Detail
                </a>
            </div>
            @endforeach
            
        </div>
    @else
        <div style="background: white; border-radius: 16px; padding: 40px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.03); border: 1.5px solid #e2e8f0; margin-bottom: 30px;">
            <p style="color: gray; font-size: 16px; margin-bottom: 15px; font-weight: 500;">Belum ada mata kuliah.</p>
        </div>
    @endif
</div>
@endsection