@props(['username' => 'Guest'])

<div class="nav-wrapper">
    <div class="nav-container">
        
        <!-- Logo / Nama Aplikasi -->
        <a href="{{ route('dashboard', ['username' => $username ?? 'Guest']) }}" style="display: flex; align-items: center; gap: 0px; color: white; text-decoration: none; font-size: 34px; font-weight: 900; letter-spacing: 1px;">
            <img src="{{ asset('images/logo_tracker.png') }}" alt="Logo T Tracker" style="height: 80px; width: auto; border-radius: 6px; mix-blend-mode: screen; margin: 0 -12px;">
            Tracker
        </a>

        <button class="mobile-btn" id="menuToggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="5" r="1.5"></circle>
                <circle cx="12" cy="12" r="1.5"></circle>
                <circle cx="12" cy="19" r="1.5"></circle>
            </svg>
        </button>
        <!-- Menu Navigasi -->
       <div class="nav-menu" id="navMenu">
            <a href="{{ route('dashboard', ['username' => $username ?? 'Guest']) }}" style="color: white; text-decoration: none; font-weight: 600; font-size: 15px; transition: opacity 0.2s;">Dashboard</a>
            <a href="{{ route('pengelolaan', ['username' => $username ?? 'Guest']) }}" style="color: white; text-decoration: none; font-weight: 600; font-size: 15px; transition: opacity 0.2s;">Detail Matkul</a>
            <a href="{{ route('profile', ['username' => $username ?? 'Guest']) }}" style="color: white; text-decoration: none; font-weight: 600; font-size: 15px; transition: opacity 0.2s;">Profil</a>
        </div>

    </div>
</div>

<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('navMenu').classList.toggle('show');
    });
</script>
