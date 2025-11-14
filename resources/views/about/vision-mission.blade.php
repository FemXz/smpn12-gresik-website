@extends("layouts.app")

@section("title", "Visi & Misi - SMP Negeri 12 Gresik")

@section("content")
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi - SMP Negeri 12 Gresik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }




        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #0b6346ff 0%, #2c7922ff 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section - FIXED: Changed from fixed to relative position */
        .hero-section {
           background: linear-gradient(135deg, #059263ff 0%, #2c7922ff 100%),
            url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><defs><linearGradient id='grad' x1='0%' y1='0%' x2='100%' y2='100%'><stop offset='0%' style='stop-color:rgba(255,255,255,0.1);stop-opacity:1' /><stop offset='100%' style='stop-color:rgba(255,255,255,0);stop-opacity:1' /></linearGradient></defs><rect width='100%' height='100%' fill='url(%23grad)'/></svg>");

            padding: 80px 0; /* Increased padding for better header size */
            text-align: center;
            position: relative; /* FIXED: Changed from fixed to relative */
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(255,255,255,0.1) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(255,255,255,0.1) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(255,255,255,0.05) 0%, transparent 60%);
            animation: breathe 6s ease-in-out infinite;
        }

        @keyframes breathe {
            0%, 100% { opacity: 0.7; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.02); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        /* FIXED: Increased hero title size for better header appearance */
        .hero-title {
            font-size: 4rem; /* Increased from 3.2rem */
            font-weight: 800;
            color: white;
            margin-bottom: 20px; /* Increased margin */
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: zoomIn 1.2s ease-out;
        }

        /* FIXED: Increased hero subtitle size */
        .hero-subtitle {
            font-size: 1.5rem; /* Increased from 1.3rem */
            color: rgba(255,255,255,0.9);
            margin-bottom: 40px; /* Increased margin */
            font-weight: 300;
            animation: fadeInUp 1.2s ease-out 0.3s both;
        }

        .hero-icons {
            display: flex;
            justify-content: center;
            gap: 30px; /* Increased gap */
            margin-bottom: 30px; /* Increased margin */
        }

        /* FIXED: Increased hero icon size */
        .hero-icon {
            font-size: 3.2rem; /* Increased from 2.8rem */
            color: rgba(255,255,255,0.4); /* Slightly more visible */
            animation: float 3s ease-in-out infinite;
        }

        .hero-icon:nth-child(1) { animation-delay: 0s; }
        .hero-icon:nth-child(2) { animation-delay: 1s; }
        .hero-icon:nth-child(3) { animation-delay: 2s; }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        /* Main Content - FIXED: Removed margin-top since hero is no longer fixed */
        .main-content {
            padding: 70px 0;
            background: white;
            position: relative;
            z-index: 2;
        }

        /* Visi Section */
        .visi-section {
            margin-bottom: 70px;
            text-align: center;
        }

        .visi-card {
            background: linear-gradient(135deg, #059263ff 0%, #2c7922ff 100%);
            border-radius: 25px;
            padding: 50px 40px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.3);
            transform: perspective(1000px) rotateY(-2deg);
            transition: all 0.5s ease;
        }

        .visi-card:hover {
            transform: perspective(1000px) rotateY(0deg) translateY(-10px);
            box-shadow: 0 35px 70px rgba(102, 126, 234, 0.4);
        }

        .visi-card::before {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            width: 300%;
            height: 300%;
            background: conic-gradient(from 0deg, transparent, rgba(255,255,255,0.1), transparent, rgba(255,255,255,0.1), transparent);
            animation: rotate 8s linear infinite;
        }

        @keyframes rotate {
            100% { transform: rotate(360deg); }
        }

        .visi-icon {
            font-size: 3.5rem;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .visi-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 25px;
            position: relative;
            z-index: 2;
        }

        .visi-text {
            font-size: 1.2rem;
            line-height: 1.8;
            font-weight: 300;
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Misi Section */
        .misi-section {
            margin-bottom: 70px;
        }

        /* FIXED: Section title with proper icon positioning */
        .section-title {
            text-align: center;
            font-size: 2.8rem; /* Increased size */
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 60px; /* Increased margin */
            position: relative;
            padding-top: 80px; /* Increased padding to accommodate larger icon */
        }

        /* FIXED: Icon positioning to prevent overlap with text */
        .section-title::before {
            content: '\f0e7'; /* Lightning bolt icon */
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px; /* Increased size */
            height: 80px; /* Increased size */
             background: linear-gradient(135deg, #059263ff 0%, #2c7922ff 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: white;
            font-size: 2rem; /* Increased icon size */
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3); /* Added shadow */
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -20px; /* Adjusted position */
            left: 50%;
            transform: translateX(-50%);
            width: 100px; /* Increased width */
            height: 5px; /* Increased height */
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 3px;
        }

        .misi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .misi-card {
            background: white;
            border-radius: 18px;
            padding: 35px 25px;
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            border-top: 5px solid transparent;
        }

        .misi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--card-gradient));
            transition: all 0.3s ease;
        }

        .misi-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .misi-card:hover::before {
            height: 100%;
            opacity: 0.05;
        }

        .misi-card:nth-child(1) { --card-gradient: #667eea, #764ba2; }
        .misi-card:nth-child(2) { --card-gradient: #f093fb, #f5576c; }
        .misi-card:nth-child(3) { --card-gradient: #4facfe, #00f2fe; }
        .misi-card:nth-child(4) { --card-gradient: #43e97b, #38f9d7; }
        .misi-card:nth-child(5) { --card-gradient: #fa709a, #fee140; }
        .misi-card:nth-child(6) { --card-gradient: #a8edea, #fed6e3; }

        .misi-number {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, var(--card-gradient));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-12px); }
            60% { transform: translateY(-6px); }
        }

        .misi-card:nth-child(1) .misi-number { animation-delay: 0s; }
        .misi-card:nth-child(2) .misi-number { animation-delay: 0.2s; }
        .misi-card:nth-child(3) .misi-number { animation-delay: 0.4s; }
        .misi-card:nth-child(4) .misi-number { animation-delay: 0.6s; }
        .misi-card:nth-child(5) .misi-number { animation-delay: 0.8s; }
        .misi-card:nth-child(6) .misi-number { animation-delay: 1s; }

        .misi-text {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #4a5568;
            text-align: justify;
        }

        /* Tujuan Section */
        .tujuan-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 25px;
            padding: 50px 40px;
            position: relative;
            overflow: hidden;
        }

        .tujuan-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 20px,
                rgba(102, 126, 234, 0.03) 20px,
                rgba(102, 126, 234, 0.03) 40px
            );
            animation: slide 15s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(-50%, -50%); }
            100% { transform: translate(-30%, -30%); }
        }

        .tujuan-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 40px;
            position: relative;
            z-index: 2;
        }

        .tujuan-list {
            list-style: none;
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .tujuan-item {
            background: white;
            margin: 18px 0;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .tujuan-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .tujuan-item:hover::before {
            transform: scaleY(1);
        }

        .tujuan-item:hover {
            transform: translateX(6px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .tujuan-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .tujuan-text {
            font-size: 0.95rem;
            color: #4a5568;
            line-height: 1.6;
        }

        /* Responsive Design */
        
        /* Large Desktop (1200px and up) */
        @media (min-width: 1200px) {
            .hero-title {
                font-size: 4.5rem; /* Increased */
            }
            
            .hero-subtitle {
                font-size: 1.6rem; /* Increased */
            }
            
            .visi-title {
                font-size: 2.8rem;
            }
            
            .section-title {
                font-size: 3rem; /* Increased */
            }
            
            .tujuan-title {
                font-size: 2.5rem;
            }
        }

        /* Tablet (768px to 1024px) */
        @media (max-width: 1024px) and (min-width: 769px) {
            .hero-title {
                font-size: 3.5rem; /* Increased */
            }
            
            .hero-subtitle {
                font-size: 1.3rem; /* Increased */
            }
            
            .hero-icons {
                gap: 25px;
            }
            
            .hero-icon {
                font-size: 2.8rem; /* Increased */
            }
            
            .visi-card {
                padding: 45px 35px;
            }
            
            .visi-title {
                font-size: 2.3rem;
            }
            
            .section-title {
                font-size: 2.5rem; /* Increased */
                padding-top: 70px; /* Adjusted */
            }
            
            .section-title::before {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }
            
            .misi-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 22px;
            }
            
            .tujuan-title {
                font-size: 2rem;
            }
        }

        /* Mobile (768px and below) */
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0; /* Increased */
            }
            
            .hero-title {
                font-size: 2.8rem; /* Increased */
            }
            
            .hero-subtitle {
                font-size: 1.2rem; /* Increased */
            }
            
            .hero-icons {
                gap: 20px;
            }
            
            .hero-icon {
                font-size: 2.5rem; /* Increased */
            }
            
            .main-content {
                padding: 50px 0;
            }
            
            .visi-section {
                margin-bottom: 50px;
            }
            
            .visi-card {
                padding: 35px 20px;
                transform: none;
                border-radius: 18px;
            }
            
            .visi-icon {
                font-size: 2.8rem;
            }
            
            .visi-title {
                font-size: 2rem;
            }
            
            .visi-text {
                font-size: 1.05rem;
            }
            
            .section-title {
                font-size: 2.2rem; /* Increased */
                margin-bottom: 40px;
                padding-top: 60px; /* Adjusted */
            }
            
            .section-title::before {
                width: 60px; /* Increased */
                height: 60px; /* Increased */
                font-size: 1.5rem; /* Increased */
            }
            
            .misi-section {
                margin-bottom: 50px;
            }
            
            .misi-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            
            .misi-card {
                padding: 25px 18px;
            }
            
            .misi-number {
                width: 55px;
                height: 55px;
                font-size: 1.4rem;
            }
            
            .misi-text {
                font-size: 0.95rem;
            }
            
            .tujuan-section {
                padding: 35px 20px;
                border-radius: 18px;
            }
            
            .tujuan-title {
                font-size: 1.8rem;
                margin-bottom: 35px;
            }
            
            .tujuan-item {
                flex-direction: column;
                text-align: center;
                padding: 18px;
            }
            
            .tujuan-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            
            .tujuan-text {
                font-size: 0.9rem;
            }
        }

        /* Small Mobile (480px and below) */
        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .hero-title {
                font-size: 2.5rem; /* Increased */
            }
            
            .hero-subtitle {
                font-size: 1.1rem; /* Increased */
            }
            
            .visi-card {
                padding: 30px 18px;
            }
            
            .visi-title {
                font-size: 1.8rem;
            }
            
            .visi-text {
                font-size: 0.95rem;
            }
            
            .section-title {
                font-size: 2rem; /* Increased */
            }
            
            .tujuan-title {
                font-size: 1.6rem;
            }
        }

        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-100px);
            transition: all 0.8s ease;
        }

        .slide-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(100px);
            transition: all 0.8s ease;
        }

        .slide-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .scale-in {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.8s ease;
        }

        .scale-in.visible {
            opacity: 1;
            transform: scale(1);
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-icons">
                    <div class="hero-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="hero-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="hero-icon">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <h1 class="hero-title">Visi & Misi</h1>
                <p class="hero-subtitle">Panduan dan arah pengembangan SMP Negeri 12 Gresik</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <!-- Visi Section -->
            <div class="visi-section fade-in">
                <div class="visi-card">
                    <div class="visi-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h2 class="visi-title">VISI</h2>
                    <p class="visi-text">
                        "Terwujudnya peserta didik yang beriman, bertakwa, berakhlak mulia, cerdas, terampil, dan berwawasan lingkungan serta mampu bersaing di era global"
                    </p>
                </div>
            </div>

            <!-- Misi Section -->
            <div class="misi-section">
                <h2 class="section-title fade-in">MISI</h2>
                <div class="misi-grid">
                    <div class="misi-card scale-in">
                        <div class="misi-number">1</div>
                        <p class="misi-text">
                            Menyelenggarakan pendidikan yang berkualitas dengan mengintegrasikan nilai-nilai keimanan dan ketakwaan dalam setiap kegiatan pembelajaran.
                        </p>
                    </div>
                    <div class="misi-card scale-in">
                        <div class="misi-number">2</div>
                        <p class="misi-text">
                            Mengembangkan potensi akademik dan non-akademik peserta didik melalui pembelajaran yang inovatif dan berbasis teknologi.
                        </p>
                    </div>
                    <div class="misi-card scale-in">
                        <div class="misi-number">3</div>
                        <p class="misi-text">
                            Membentuk karakter peserta didik yang berakhlak mulia, disiplin, dan memiliki rasa tanggung jawab terhadap diri sendiri dan lingkungan.
                        </p>
                    </div>
                    <div class="misi-card scale-in">
                        <div class="misi-number">4</div>
                        <p class="misi-text">
                            Menciptakan lingkungan sekolah yang kondusif, aman, nyaman, dan berwawasan lingkungan untuk mendukung proses pembelajaran.
                        </p>
                    </div>
                    <div class="misi-card scale-in">
                        <div class="misi-number">5</div>
                        <p class="misi-text">
                            Membangun kemitraan yang harmonis dengan orang tua, masyarakat, dan stakeholder untuk mendukung pencapaian tujuan pendidikan.
                        </p>
                    </div>
                    <div class="misi-card scale-in">
                        <div class="misi-number">6</div>
                        <p class="misi-text">
                            Mempersiapkan peserta didik yang mampu bersaing dan beradaptasi dengan perkembangan zaman serta tantangan global.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tujuan Section -->
            <div class="tujuan-section fade-in">
                <h2 class="tujuan-title">TUJUAN SEKOLAH</h2>
                <ul class="tujuan-list">
                    <li class="tujuan-item slide-in-left">
                        <div class="tujuan-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <p class="tujuan-text">
                            Meningkatkan prestasi akademik peserta didik dengan rata-rata nilai ujian nasional di atas standar nasional
                        </p>
                    </li>
                    <li class="tujuan-item slide-in-right">
                        <div class="tujuan-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <p class="tujuan-text">
                            Mengembangkan bakat dan minat peserta didik melalui kegiatan ekstrakurikuler yang beragam dan berprestasi
                        </p>
                    </li>
                    <li class="tujuan-item slide-in-left">
                        <div class="tujuan-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="tujuan-text">
                            Membentuk peserta didik yang memiliki karakter kuat, sopan santun, dan mampu bersosialisasi dengan baik
                        </p>
                    </li>
                    <li class="tujuan-item slide-in-right">
                        <div class="tujuan-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <p class="tujuan-text">
                            Menciptakan sekolah yang peduli lingkungan dan menerapkan prinsip-prinsip pembangunan berkelanjutan
                        </p>
                    </li>
                    <li class="tujuan-item slide-in-left">
                        <div class="tujuan-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <p class="tujuan-text">
                            Mengintegrasikan teknologi informasi dalam proses pembelajaran untuk meningkatkan kualitas pendidikan
                        </p>
                    </li>
                    <li class="tujuan-item slide-in-right">
                        <div class="tujuan-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <p class="tujuan-text">
                            Membangun kerjasama yang solid dengan semua stakeholder untuk kemajuan pendidikan di sekolah
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <script>
        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right, .scale-in').forEach(el => {
            observer.observe(el);
        });

        // Add staggered animation to misi cards
        const misiCards = document.querySelectorAll('.misi-card');
        misiCards.forEach((card, index) => {
            card.style.transitionDelay = `${index * 0.1}s`;
        });

        // Add staggered animation to tujuan items
        const tujuanItems = document.querySelectorAll('.tujuan-item');
        tujuanItems.forEach((item, index) => {
            item.style.transitionDelay = `${index * 0.1}s`;
        });

        // Smooth scrolling
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
</body>
</html>

@endsection

