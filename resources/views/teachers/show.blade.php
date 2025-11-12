@extends("layouts.app")

@section("title", $teacher->name . " - Guru & Staff - SMP Negeri 12 Gresik")

@section("content")
<style>
    /* --- Global & Base Styles --- */
    :root {
        --color-primary: #1e3c2a; /* Dark Green */
        --color-secondary: #2d5a3d; /* Medium Green */
        --color-accent: #8bc49c; /* Light Green/Mint */
        --color-background: linear-gradient(135deg, #1e3c2a 0%, #258346ff 25%, #207539ff 50%, #1f6b37a 75%, #8bc49c 100%);
        --shadow-light: 0 10px 30px rgba(30, 60, 42, 0.1);
        --shadow-heavy: 0 20px 60px rgba(30, 60, 42, 0.2);
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        background: var(--color-background);
        min-height: 100vh;
    }

    .container-fluid {
        padding: 0;
        background: transparent;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* --- Header & Breadcrumb --- */
    .header-section {
        background: rgba(30, 60, 42, 0.95);
        backdrop-filter: blur(10px);
        padding: 1rem 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--color-accent);
        font-size: 0.9rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
    }

    .breadcrumb-item a {
        color: var(--color-accent);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb-item a:hover {
        color: #ffffff;
    }

    .breadcrumb-item.active {
        color: #ffffff;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "•";
        color: #6b9b7a;
        margin: 0 10px;
    }

    /* --- Main Content --- */
    .main-content {
        padding: 3rem 0;
    }

    /* --- Teacher Card --- */
    .teacher-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        border-radius: 25px;
        box-shadow: var(--shadow-heavy);
        overflow: hidden;
        margin-bottom: 3rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        animation: fadeInUp 0.8s ease-out;
    }

    .teacher-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 80px rgba(30, 60, 42, 0.3);
    }

    .card-header {
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        border: none;
    }

    .teacher-photo, .photo-placeholder {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid rgba(139, 196, 156, 0.3);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
        position: relative;
        z-index: 2;
        margin: 0 auto;
    }
    
    .photo-placeholder {
        background: linear-gradient(135deg, #4a7c59, #6b9b7a);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .photo-placeholder i {
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .teacher-name {
        color: #ffffff;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 1.5rem 0 0.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 2;
    }

    .teacher-position {
        color: var(--color-accent);
        font-size: 1.3rem;
        font-weight: 500;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .card-body {
        padding: 3rem;
        background: transparent;
        border: none;
    }

    /* --- Info Grid (Contact & Bio) --- */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .contact-section, .bio-section {
        padding: 2rem;
        border-radius: 20px;
        box-shadow: var(--shadow-light);
    }

    .contact-section {
        background: linear-gradient(135deg, #f8fffe, #e8f5e8);
        border-left: 5px solid var(--color-secondary);
    }

    .bio-section {
        background: linear-gradient(135deg, #f0f8f0, #e0f0e0);
        border-left: 5px solid #4a7c59;
    }

    .contact-section h3, .bio-section h3, .additional-info h3 {
        color: var(--color-primary);
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 1rem;
        margin-bottom: 1rem;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        background: rgba(139, 196, 156, 0.1);
        transform: translateX(5px);
    }

    .contact-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .email-icon { background: linear-gradient(135deg, #4a7c59, #6b9b7a); }
    .phone-icon { background: linear-gradient(135deg, var(--color-secondary), #4a7c59); }
    .nip-icon { background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); }

    .contact-item a {
        color: var(--color-primary);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .contact-item a:hover {
        color: var(--color-secondary);
    }

    .bio-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--color-secondary);
        text-align: justify;
    }

    /* --- Additional Info --- */
    .additional-info {
        background: linear-gradient(135deg, #e8f5e8, #d0e8d0);
        padding: 2rem;
        border-radius: 20px;
        margin-top: 2rem;
        border-left: 5px solid #6b9b7a;
        box-shadow: var(--shadow-light);
    }

    .info-items {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
    }

    .info-item {
        background: rgba(255, 255, 255, 0.8);
        padding: 1.5rem;
        border-radius: 15px;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .info-item:hover {
        background: rgba(139, 196, 156, 0.1);
        border-color: #6b9b7a;
        transform: translateY(-3px);
    }

    .info-item-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
    }

    .education-icon { background: linear-gradient(135deg, #f39c12, #e67e22); }
    .experience-icon { background: linear-gradient(135deg, #3498db, #2980b9); }
    .subject-icon { background: linear-gradient(135deg, #e74c3c, #c0392b); }
    .achievement-icon { background: linear-gradient(135deg, #9b59b6, #8e44ad); }

    .info-item-content strong {
        color: var(--color-primary);
        font-weight: 600;
    }

    .info-item-content span {
        color: var(--color-secondary);
    }

    /* --- Navigation Buttons --- */
    .navigation {
        background: rgba(255, 255, 255, 0.9);
        padding: 2rem;
        border-radius: 20px;
        margin-top: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        box-shadow: var(--shadow-light);
        border-top: 1px solid rgba(107, 155, 122, 0.2);
    }

    .btn {
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        flex-grow: 1; /* Added for better mobile layout */
        justify-content: center; /* Added for better mobile layout */
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--color-secondary), #4a7c59);
        color: white;
        box-shadow: 0 5px 15px rgba(45, 90, 61, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(30, 60, 42, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-outline-secondary {
        background: linear-gradient(135deg, #6b9b7a, var(--color-accent));
        color: white;
        box-shadow: 0 5px 15px rgba(107, 155, 122, 0.3);
        border: none;
    }

    .btn-outline-secondary:hover {
        background: linear-gradient(135deg, #4a7c59, #6b9b7a);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(74, 124, 89, 0.4);
        color: white;
        text-decoration: none;
    }

    /* --- Related Teachers --- */
    .related-section {
        margin-top: 4rem;
    }

    .related-section h3 {
        color: var(--color-primary);
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
    }

    .related-section h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(135deg, var(--color-secondary), #6b9b7a);
        border-radius: 2px;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Adjusted minmax for better tablet view */
        gap: 2rem;
    }

    .related-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        box-shadow: var(--shadow-light);
        transition: all 0.3s ease;
        border: 2px solid transparent;
        animation: fadeInUp 0.8s ease-out;
    }

    .related-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(30, 60, 42, 0.2);
        border-color: #6b9b7a;
    }

    .related-photo, .related-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--color-accent);
        margin: 0 auto 1rem;
        transition: transform 0.3s ease;
    }
    
    .related-placeholder {
        background: linear-gradient(135deg, #6b9b7a, var(--color-accent));
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .related-placeholder i {
        font-size: 2.5rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .related-card h6 {
        color: var(--color-primary);
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .related-card p {
        color: #4a7c59;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .btn-outline-primary {
        background: transparent;
        color: var(--color-secondary);
        border: 2px solid var(--color-secondary);
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background: var(--color-secondary);
        color: white;
    }
    
    /* --- Animations --- */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* --- Responsive Overrides --- */
    /* Tablet & Mobile (max-width: 992px) - Targetting Bootstrap's LG breakpoint */
    @media (max-width: 992px) {
        .teacher-card {
            margin-bottom: 2rem;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .info-grid {
            grid-template-columns: 1fr; /* Stack contact and bio sections */
            gap: 1.5rem;
        }
        
        .navigation {
            flex-direction: column;
            gap: 0.75rem;
            padding: 1.5rem;
        }
        
        .btn {
            width: 100%; /* Full width buttons on tablet/mobile */
        }
        
        .related-section {
            margin-top: 3rem;
        }
    }

    /* Mobile (max-width: 576px) - Targetting Bootstrap's SM breakpoint */
    @media (max-width: 576px) {
        .container {
            padding: 0 15px;
        }
        
        .teacher-photo, .photo-placeholder {
            width: 140px;
            height: 140px;
        }
        
        .teacher-name {
            font-size: 2rem;
            margin-top: 1rem;
        }
        
        .teacher-position {
            font-size: 1.1rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .contact-section, .bio-section, .additional-info {
            padding: 1.5rem;
            border-radius: 15px;
        }
        
        .info-items {
            grid-template-columns: 1fr; /* Stack all info items */
        }
        
        .related-grid {
            grid-template-columns: 1fr; /* Stack related cards */
            gap: 1.5rem;
        }
        
        .related-card {
            padding: 1.5rem;
            border-radius: 15px;
        }
    }
</style>


@php
    // Pastikan related teachers selalu tersedia
    // Menggunakan take(3) untuk membatasi jumlah guru terkait
    $relatedTeachers = \App\Models\Teacher::where('id', '!=', $teacher->id)
        ->latest()
        ->take(3)
        ->get();
@endphp

<div class="container-fluid">

    <div class="main-content">
        <div class="container">
            <!-- Menggunakan kelas Bootstrap yang lebih modern dan responsif -->
            <div class="row justify-content-center">
                <!-- Mengganti col-lg-8 mx-auto dengan col-lg-8 untuk kontrol lebar yang lebih baik -->
                <div class="col-12 col-lg-8"> 
                    <!-- Teacher Card -->
                    <div class="teacher-card">
                        <div class="card-header text-center">
                            @if($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}" class="teacher-photo" alt="{{ $teacher->name }}">
                            @else
                                <div class="photo-placeholder"><i class="fas fa-user-circle"></i></div>
                            @endif
                            <h1 class="teacher-name">{{ $teacher->name }}</h1>
                            <p class="teacher-position">{{ $teacher->position }}</p>
                        </div>

                        <div class="card-body">
                            <div class="info-grid">
                                <!-- Contact Info -->
                                <div class="contact-section">
                                    <h3><i class="fas fa-address-book"></i> Informasi Kontak</h3>
                                    @if($teacher->email)
                                        <div class="contact-item">
                                            <div class="contact-icon email-icon"><i class="fas fa-envelope"></i></div>
                                            <div><strong>Email:</strong><br><a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></div>
                                        </div>
                                    @endif
                                    @if($teacher->phone)
                                        <div class="contact-item">
                                            <div class="contact-icon phone-icon"><i class="fas fa-phone"></i></div>
                                            <div><strong>Telepon:</strong><br><a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a></div>
                                        </div>
                                    @endif
                                    @if($teacher->nip)
                                        <div class="contact-item">
                                            <div class="contact-icon nip-icon"><i class="fas fa-id-card"></i></div>
                                            <div><strong>NIP:</strong><br>{{ $teacher->nip }}</div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Biography -->
                                @if($teacher->bio)
                                    <div class="bio-section">
                                        <h3><i class="fas fa-user"></i> Profil Singkat</h3>
                                        <div class="bio-content">{!! nl2br(e($teacher->bio)) !!}</div>
                                    </div>
                                @endif
                            </div>

                            <!-- Additional Info -->
                            <div class="additional-info">
                                <h3><i class="fas fa-info-circle"></i> Informasi Tambahan</h3>
                                <div class="info-items">
                                    <!-- Mengganti col-6 dengan struktur grid murni CSS -->
                                    <div class="info-item">
                                        <div class="info-item-icon education-icon"><i class="fas fa-graduation-cap"></i></div>
                                        <div class="info-item-content"><strong>Pendidikan:</strong><br><span>{{ $teacher->education ?? 'S1 Pendidikan' }}</span></div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-item-icon experience-icon"><i class="fas fa-calendar-alt"></i></div>
                                        <div class="info-item-content"><strong>Pengalaman:</strong><br><span>{{ $teacher->experience ?? '10+ Tahun' }}</span></div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-item-icon subject-icon"><i class="fas fa-book"></i></div>
                                        <div class="info-item-content"><strong>Mata Pelajaran:</strong><br><span>{{ $teacher->subject ?? $teacher->position }}</span></div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-item-icon achievement-icon"><i class="fas fa-trophy"></i></div>
                                        <div class="info-item-content"><strong>Status:</strong><br><span>{{ ucfirst($teacher->status ?? 'Aktif') }}</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation -->
                            <!-- Menghapus d-flex justify-content-between mt-4 karena sudah diatur di CSS .navigation -->
                            <div class="navigation">
                                <a href="{{ route('teachers') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Guru</a>
                                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fas fa-home"></i> Beranda</a>
                            </div>
                        </div>
                    </div>

                    <!-- Related Teachers -->
                    @if($relatedTeachers->count())
                        <div class="related-section mt-5">
                            <h3>Guru & Staff Lainnya</h3>
                            <!-- Menghapus d-flex gap-3 flex-wrap karena sudah diatur di CSS .related-grid -->
                            <div class="related-grid">
                                @foreach($relatedTeachers as $related)
                                    <!-- Mengganti col-md-4 dengan struktur grid murni CSS -->
                                    <div class="related-card">
                                        @if($related->photo)
                                            <img src="{{ asset('storage/' . $related->photo) }}" class="related-photo" alt="{{ $related->name }}">
                                        @else
                                            <div class="related-placeholder"><i class="fas fa-user-circle"></i></div>
                                        @endif
                                        <!-- Menghapus card-body karena tidak diperlukan dan menyebabkan padding ganda -->
                                        <h6 class="card-title">{{ $related->name }}</h6>
                                        <p class="card-text small text-muted">{{ $related->position }}</p>
                                        <a href="{{ route('teachers.show', $related->slug) }}" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

