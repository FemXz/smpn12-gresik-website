@extends("layouts.app")

@section("title", "Sejarah Sekolah - SMP Negeri 12 Gresik")

@section("content")
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Sekolah - SMP Negeri 12 Gresik</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100% );
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23fff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23fff" stop-opacity="0"/></radialGradient></defs><rect width="100%" height="100%" fill="url(%23a )"/></svg>');
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 2px,
                rgba(255,255,255,0.03) 2px,
                rgba(255,255,255,0.03) 4px
            );
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: slideInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 30px;
            font-weight: 300;
            animation: slideInUp 1s ease-out 0.2s both;
        }

        .hero-icon {
            font-size: 5rem;
            color: rgba(255,255,255,0.2);
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Main Content */
        .main-content {
            padding: 60px 0;
            background: white;
            position: relative;
        }

        .content-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.1);
            padding: 40px;
            margin: 40px 0;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 300% 100%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .content-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 35px 70px rgba(0,0,0,0.15);
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .content-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4a5568;
            margin-bottom: 20px;
            text-align: justify;
        }

        .quote-section {
            background: #f7fafc;
            border-left: 5px solid #667eea;
            padding: 25px;
            margin: 30px 0;
            border-radius: 15px;
            position: relative;
        }

        .quote-section::before {
            content: '"';
            font-size: 3.5rem;
            color: #667eea;
            position: absolute;
            top: -5px;
            left: 15px;
            font-family: serif;
            opacity: 0.8;
        }

        .quote-text {
            font-style: italic;
            font-size: 1.15rem;
            color: #2d3748;
            margin-left: 35px;
        }

        /* Decorative Elements */
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            display: none; /* Hidden on mobile for performance */
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: floatShapes 15s infinite linear;
        }

        .shape:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { top: 60%; right: 10%; animation-delay: 5s; }
        .shape:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 10s; }

        @keyframes floatShapes {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Timeline Design */
        .timeline-section {
            position: relative;
            padding: 20px 0;
        }

        .timeline-item {
            display: flex;
            align-items: center;
            margin: 40px 0;
            position: relative;
        }

        .timeline-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            margin-right: 30px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            flex-shrink: 0;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .timeline-content {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-left: 4px solid #667eea;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
                padding: 0 10px;
            }

            .hero-icon {
                font-size: 4rem;
            }
            
            .main-content {
                padding: 40px 0;
            }

            .content-card {
                padding: 25px;
                margin: 20px 0;
            }
            
            .section-title {
                font-size: 1.8rem;
            }

            .content-text {
                font-size: 1rem;
                line-height: 1.7;
            }
            
            .timeline-item {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }
            
            .timeline-icon {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .timeline-content {
                border-left: none;
                border-top: 4px solid #667eea;
                padding: 20px;
                text-align: center;
            }

            .section-title::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .quote-text {
                font-size: 1rem;
                margin-left: 0;
                text-align: center;
            }

            .quote-section::before {
                left: 50%;
                transform: translateX(-50%);
                top: -15px;
            }
        }

        @media (min-width: 769px) {
            .floating-shapes {
                display: block;
            }
        }

        /* Scroll Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
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
                <div class="hero-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <h1 class="hero-title">Sejarah Sekolah</h1>
                <p class="hero-subtitle">Perjalanan panjang SMP Negeri 12 Gresik dari masa ke masa</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="floating-shapes">
                <div class="shape"><i class="fas fa-graduation-cap fa-3x"></i></div>
                <div class="shape"><i class="fas fa-school fa-3x"></i></div>
                <div class="shape"><i class="fas fa-book fa-3x"></i></div>
            </div>

            <article class="content-card">
                <div class="timeline-section">
                    <div class="timeline-item fade-in">
                        <div class="timeline-icon">
                            <i class="fas fa-flag"></i>
                        </div>
                        <div class="timeline-content">
                            <h2 class="section-title">Awal Mula Berdiri</h2>
                            <p class="content-text">
                                SMP Negeri 12 Gresik didirikan pada tanggal 17 Agustus 1980, berlokasi strategis di pusat kota Gresik. Pendirian sekolah ini merupakan inisiatif pemerintah daerah untuk memenuhi kebutuhan pendidikan menengah pertama yang terus meningkat di wilayah tersebut. Dengan semangat kemerdekaan, sekolah ini diharapkan menjadi wadah bagi generasi muda untuk meraih cita-cita dan berkontribusi bagi bangsa.
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item fade-in">
                        <div class="timeline-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="timeline-content">
                            <h2 class="section-title">Perkembangan dan Prestasi</h2>
                            <p class="content-text">
                                Sejak awal berdirinya, SMP Negeri 12 Gresik terus berbenah dan berkembang. Pada tahun-tahun awal, fokus utama adalah pembangunan infrastruktur dan peningkatan kualitas tenaga pengajar. Berbagai program inovatif mulai diterapkan, termasuk pengembangan kurikulum yang relevan dengan kebutuhan zaman. Hasilnya, sekolah ini mulai menorehkan berbagai prestasi, baik di bidang akademik maupun non-akademik.
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item fade-in">
                        <div class="timeline-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="timeline-content">
                            <h2 class="section-title">Era Modern & Masa Depan</h2>
                            <p class="content-text">
                                Memasuki era digital, SMP Negeri 12 Gresik tidak ketinggalan dalam mengadopsi teknologi. Fasilitas komputer dan akses internet diperbarui, serta pembelajaran berbasis teknologi diintegrasikan ke dalam kurikulum. Tantangan ke depan adalah mempersiapkan siswa untuk menjadi warga negara yang adaptif dan berdaya saing tinggi di tengah persaingan global.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="quote-section fade-in">
                    <p class="quote-text">
                        "Pendidikan adalah senjata paling ampuh yang bisa Anda gunakan untuk mengubah dunia." - Nelson Mandela
                    </p>
                </div>
            </article>
        </div>
    </section>

    <script>
        // Scroll Animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); // Stop observing after animation
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>



@endsection


