@extends("layouts.app")

@section("title", "Struktur Organisasi - SMP Negeri 12 Gresik")

@section("content")
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - SMP Negeri 12 Gresik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f4f7f6; /* Changed background for content visibility */
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.95 ) 0%, rgba(118, 75, 162, 0.95) 100%);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            color: white;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            font-weight: 300;
            opacity: 0.9;
        }

        .hero-icon {
            font-size: 5rem;
            color: rgba(255,255,255,0.3);
            margin-bottom: 20px;
        }

        /* Main Content */
        .main-content {
            padding: 60px 0;
            background: white;
        }

        /* Kepala Sekolah Section */
        .principal-section {
            text-align: center;
            margin-bottom: 60px;
        }

        .principal-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 25px;
            padding: 40px;
            color: white;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
            max-width: 450px;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .principal-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.4);
        }

        .principal-avatar {
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            border: 4px solid rgba(255,255,255,0.3);
        }

        .principal-avatar i {
            font-size: 3.5rem;
        }

        .principal-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .principal-title {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        .principal-nip {
            font-size: 1rem;
            opacity: 0.8;
        }

        /* General Section Title */
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        /* Vice Principals & Staff Section */
        .vice-principals, .staff-section {
            margin-bottom: 60px;
        }

        .vice-grid, .staff-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .vice-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border-top: 5px solid var(--card-color);
        }
        
        .vice-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .vice-card:nth-child(1) { --card-color: #28a745; }
        .vice-card:nth-child(2) { --card-color: #17a2b8; }
        .vice-card:nth-child(3) { --card-color: #ffc107; }
        .vice-card:nth-child(4) { --card-color: #dc3545; }

        .vice-avatar {
            width: 80px;
            height: 80px;
            background: var(--card-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }

        .vice-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .vice-position {
            font-size: 1rem;
            color: #718096;
            line-height: 1.4;
        }

        /* Staff Card */
        .staff-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .staff-header {
            padding: 20px 25px;
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .staff-header i { font-size: 1.4rem; }
        .staff-header h3 { font-size: 1.2rem; }

        .staff-card:nth-child(1) .staff-header { background: linear-gradient(135deg, #667eea, #764ba2); }
        .staff-card:nth-child(2) .staff-header { background: linear-gradient(135deg, #28a745, #20c997); }
        .staff-card:nth-child(3) .staff-header { background: linear-gradient(135deg, #17a2b8, #20c997); }
        .staff-card:nth-child(4) .staff-header { background: linear-gradient(135deg, #ffc107, #fd7e14); }
        .staff-card:nth-child(5) .staff-header { background: linear-gradient(135deg, #6c757d, #495057); }
        .staff-card:nth-child(6) .staff-header { background: linear-gradient(135deg, #343a40, #495057); }

        .staff-body { padding: 25px; }
        .staff-list { list-style: none; }
        .staff-list li {
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 0.95rem;
        }
        .staff-list li:last-child { border-bottom: none; }
        .staff-list li::before {
            content: '\f00c'; /* Font Awesome check icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: #667eea;
        }
        .staff-role { font-weight: 600; color: #2d3748; }
        .staff-name { color: #4a5568; }

        /* Committee Section */
        .committee-section {
            background: #f8f9fa;
            border-radius: 25px;
            padding: 50px;
            text-align: center;
        }

        .committee-title {
            font-size: 2.2rem;
            margin-bottom: 40px;
        }

        .committee-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .committee-member {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            transition: all 0.3s ease;
        }
        .committee-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .committee-role {
            font-size: 1rem;
            font-weight: 600;
            color: #667eea;
            margin-bottom: 8px;
        }
        .committee-name {
            font-size: 1.1rem;
            font-weight: 500;
            color: #2d3748;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem; }
            .hero-subtitle { font-size: 1.1rem; padding: 0 10px; }
            .main-content { padding: 40px 0; }
            .principal-card { padding: 30px; margin: 0 15px; }
            .principal-name { font-size: 1.5rem; }
            .section-title { font-size: 2rem; }
            
            .vice-grid, .staff-grid, .committee-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .committee-section { padding: 40px 20px; }
        }

        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-icon"><i class="fas fa-sitemap"></i></div>
                <h1 class="hero-title">Struktur Organisasi</h1>
                <p class="hero-subtitle">Susunan kepemimpinan dan manajemen sekolah</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <!-- Kepala Sekolah -->
            <div class="principal-section fade-in">
                <div class="principal-card">
                    <div class="principal-avatar"><i class="fas fa-user-tie"></i></div>
                    <h2 class="principal-name">Drs. Ahmad Suryanto, M.Pd</h2>
                    <p class="principal-title">Kepala Sekolah</p>
                    <p class="principal-nip">NIP: 196505121990031007</p>
                </div>
            </div>

            <!-- Wakil Kepala Sekolah -->
            <div class="vice-principals fade-in">
                <h2 class="section-title">Wakil Kepala Sekolah</h2>
                <div class="vice-grid">
                    <div class="vice-card"><div class="vice-avatar"><i class="fas fa-user-graduate"></i></div><h3 class="vice-name">Dra. Siti Aminah</h3><p class="vice-position">Bidang Kurikulum</p></div>
                    <div class="vice-card"><div class="vice-avatar"><i class="fas fa-users"></i></div><h3 class="vice-name">Drs. Bambang Wijaya</h3><p class="vice-position">Bidang Kesiswaan</p></div>
                    <div class="vice-card"><div class="vice-avatar"><i class="fas fa-building"></i></div><h3 class="vice-name">Dra. Endang Sulistyowati</h3><p class="vice-position">Bidang Sarana Prasarana</p></div>
                    <div class="vice-card"><div class="vice-avatar"><i class="fas fa-handshake"></i></div><h3 class="vice-name">Drs. Agus Priyanto</h3><p class="vice-position">Bidang Humas</p></div>
                </div>
            </div>

            <!-- Koordinator dan Staff -->
            <div class="staff-section fade-in">
                <h2 class="section-title">Koordinator dan Staff</h2>
                <div class="staff-grid">
                    <div class="staff-card">
                        <div class="staff-header"><i class="fas fa-clipboard-list"></i><h3>Tata Usaha</h3></div>
                        <div class="staff-body"><ul class="staff-list"><li><span class="staff-role">Kepala TU:</span> <span class="staff-name">Dra. Rina Kusumawati</span></li><li><span class="staff-role">Staff:</span> <span class="staff-name">Siti Nurjanah, S.Pd</span></li></ul></div>
                    </div>
                    <div class="staff-card">
                        <div class="staff-header"><i class="fas fa-book"></i><h3>Perpustakaan</h3></div>
                        <div class="staff-body"><ul class="staff-list"><li><span class="staff-role">Kepala:</span> <span class="staff-name">Dra. Yuni Astuti</span></li><li><span class="staff-role">Staff:</span> <span class="staff-name">Eko Prasetyo, S.Pd</span></li></ul></div>
                    </div>
                    <div class="staff-card">
                        <div class="staff-header"><i class="fas fa-laptop"></i><h3>Laboratorium</h3></div>
                        <div class="staff-body"><ul class="staff-list"><li><span class="staff-role">Lab. IPA:</span> <span class="staff-name">Drs. Hadi Susanto</span></li><li><span class="staff-role">Lab. Komputer:</span> <span class="staff-name">Andi Wijaya, S.Kom</span></li></ul></div>
                    </div>
                    <div class="staff-card">
                        <div class="staff-header"><i class="fas fa-user-nurse"></i><h3>UKS & Konseling</h3></div>
                        <div class="staff-body"><ul class="staff-list"><li><span class="staff-role">Guru BK:</span> <span class="staff-name">Dra. Lestari Wulandari</span></li><li><span class="staff-role">Petugas UKS:</span> <span class="staff-name">Ns. Sari Indrawati</span></li></ul></div>
                    </div>
                </div>
            </div>

            <!-- Komite Sekolah -->
            <div class="committee-section fade-in">
                <h2 class="committee-title"><i class="fas fa-users-cog"></i> Komite Sekolah</h2>
                <div class="committee-grid">
                    <div class="committee-member"><div class="committee-role">Ketua</div><div class="committee-name">H. Sutrisno, S.E</div></div>
                    <div class="committee-member"><div class="committee-role">Wakil Ketua</div><div class="committee-name">Dra. Indira Sari</div></div>
                    <div class="committee-member"><div class="committee-role">Sekretaris</div><div class="committee-name">Ahmad Yusuf, S.Pd</div></div>
                    <div class="committee-member"><div class="committee-role">Bendahara</div><div class="committee-name">Hj. Fatimah, S.E</div></div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>
@endsection
