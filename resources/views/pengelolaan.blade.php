@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

<div style="font-family: 'Plus Jakarta Sans', sans-serif;">
    
    <div style="margin-bottom: 25px;">
        <h2 style="margin: 0 0 5px 0; font-size: 26px; color: rgb(65, 122, 230); font-weight: 800;">Detail Mata Kuliah & Tugas</h2>
        <p style="margin: 0; color: gray; font-size: 14px;">Detail keseluruhan informasi mata kuliah beserta ringkasan dan rincian tugas.</p>
    </div>

    <div style="background: white; padding: 20px; border-radius: 16px; border: 1.5px solid #93c5fd; box-shadow: 0 10px 25px rgba(59, 130, 246, 0.08); width: 100%; overflow-x: auto;">
        
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; min-width: 900px;">
            <thead>
                <tr style="background-color: #eff6ff; border-bottom: 2px solid #bfdbfe;">
                    <th style="padding: 15px; color: rgb(65, 122, 230); width: 20%;">Mata Kuliah</th>
                    <th style="padding: 15px; color: rgb(65, 122, 230); width: 15%;">Dosen & Kelas</th>
                    <th style="padding: 15px; color: rgb(65, 122, 230); width: 35%;">Ringkasan Materi</th>
                    <th style="padding: 15px; color: rgb(65, 122, 230); width: 30%;">Rincian Tugas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $c)
                <tr style="border-bottom: 1px solid #e2e8f0;">
                    
                    <td style="padding: 15px; font-weight: 700; color: black; vertical-align: top;">
                        {{ $c['nama'] }}
                        <span style="display: block; font-size: 12px; color: rgb(65, 122, 230); margin-top: 4px;">{{ $c['sks'] }}</span>
                    </td>
                    
                    <td style="padding: 15px; color: black; vertical-align: top;">
                        <strong>{{ $c['dosen'] }}</strong><br>
                        <span style="font-size: 12px;">Kelas: {{ $c['kelas'] }}</span>
                    </td>
                    
                    <td style="padding: 15px; color: rgb(75, 72, 72); line-height: 1.6; vertical-align: top;">
                        {{ $c['ringkasan'] }}
                    </td>
                    
                    
                    <td style="padding: 15px; vertical-align: top;">
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            @foreach($c['tugas'] ?? [] as $t)
                                <div style="display: flex; align-items: flex-start; gap: 10px; font-size: 13px;">
                                    <div style="margin-top: 2px;">
                                        @if($t['selesai'])
                                            <span style="color: green;">✅</span>
                                        @else
                                            <span style="color: grey;">⬜</span>
                                        @endif
                                    </div>
                               
                                    <span style="color: black; font-weight: 600;">
                                        {{ $t['nama'] }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </td>
                    
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 30px; text-align: center; color: #64748b;">Belum ada data mata kuliah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection