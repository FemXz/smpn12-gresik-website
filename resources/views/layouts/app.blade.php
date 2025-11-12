<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SMP Negeri 12 Gresik - Smart School Unggul dalam Prestasi')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'SMP Negeri 12 Gresik adalah Smart School unggulan yang mengutamakan kualitas pendidikan dengan teknologi modern dan tenaga pengajar profesional.')">
    <meta name="keywords" content="SMP Negeri 12 Gresik, smart school, sekolah digital, pendidikan teknologi, Gresik">
    <meta name="author" content="SMP Negeri 12 Gresik">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'SMP Negeri 12 Gresik - Smart School')">
    <meta property="og:description" content="@yield('description', 'Smart School dengan pendidikan berkualitas dan teknologi modern di Gresik')">
    <meta property="og:image" content="{{ asset('assets/logo-smp.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/logo-smp.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* ========================================
           SMART SCHOOL CSS - MODERN & RESPONSIVE
           ======================================== */

           @import url('https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap');


        /* ========================================
           CSS VARIABLES - SMART SCHOOL THEME
           ======================================== */
        :root {
            /* Smart School Color Palette */

/*  BLUE STYLE OFF 


            --primary-50: #eff6ff;
            --primary-100: #dbeafe;
            --primary-200: #bfdbfe;
            --primary-300: #93c5fd;
            --primary-400: #60a5fa;
            --primary-500: #3b82f6;
            --primary-600: #2563eb;
            --primary-700: #1d4ed8;
            --primary-800: #1e40af;
            --primary-900: #1e3a8a;
            */

            
/* Primary - Modern Green */
--primary-50:  #9b9b9bff;
--primary-100: #dcfce7;
--primary-200: #bbf7d0;
--primary-300: #86efac;
--primary-400: #4ade80;
--primary-500: #16a34a; /* green-500 */
--primary-600: #16a34a;
--primary-700: #15803d;
--primary-800: #166534;
--primary-900: #14532d;

            
            /* Secondary Colors - Tech Green */
            --secondary-50: #ecfdf5;
            --secondary-100: #d1fae5;
            --secondary-200: #a7f3d0;
            --secondary-300: #6ee7b7;
            --secondary-400: #34d399;
            --secondary-500: #10b981;
            --secondary-600: #059669;
            --secondary-700: #047857;
            --secondary-800: #065f46;
            --secondary-900: #064e3b;
            
            /* Accent Colors - Orange */
            --accent-50: #fff7ed;
            --accent-100: #ffedd5;
            --accent-200: #fed7aa;
            --accent-300: #fdba74;
            --accent-400: #fb923c;
            --accent-500: #f97316;
            --accent-600: #ea580c;
            --accent-700: #c2410c;
            --accent-800: #9a3412;
            --accent-900: #7c2d12;
            
            /* Neutral Colors */
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            
            /* Smart Gradients */
            --gradient-primary: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-500) 50%, var(--secondary-500) 100%);
            --gradient-secondary: linear-gradient(135deg, var(--secondary-500) 0%, var(--secondary-400) 100%);
            --gradient-accent: linear-gradient(135deg, var(--accent-500) 0%, var(--accent-400) 100%);
            --gradient-hero: linear-gradient(135deg, var(--primary-900) 0%, var(--primary-700) 30%, var(--primary-600) 70%, var(--secondary-500) 100%);
            --gradient-glass: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.1) 100%);
            
            /* Modern Shadows */
            --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --shadow-glow: 0 0 20px rgba(37, 99, 235, 0.3);
            --shadow-glow-green: 0 0 20px rgba(16, 185, 129, 0.3);
            
            /* Smooth Transitions */
            --transition-fast: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-normal: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-bounce: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            --transition-elastic: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            
            /* Border Radius */
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-3xl: 2rem;
            --radius-full: 9999px;
            
            /* Spacing */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-5: 1.25rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-10: 2.5rem;
            --space-12: 3rem;
            --space-16: 4rem;
            --space-20: 5rem;
            --space-24: 6rem;
        }

        /* ========================================
           RESET & BASE STYLES
           ======================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
             font-family: 'Montserrat', sans-serif;
              font-weight: 400;
            line-height: 1.6;
            color: var(--gray-800);
            background: var(--gray-50);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

/* ===================================================================
    CSS NAVIGASI VERSI PERBAIKAN (FIXED)
    Navbar desktop sekarang akan muncul kembali.
   =================================================================== */

/* 1. Navbar Utama (Header) */
.navbar {
 font-family: 'Nunito', sans-serif;
        font-weight: 600; 
        font-size: 16px;    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    padding: var(--space-3) 0;
    transition: all 0.3s ease-in-out;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.navbar.scrolled {
    background: rgba(255, 255, 255, 0.95);
    box-shadow: var(--shadow-lg);
    height: 70px;
}
.navbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
}
.navbar-brand {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    text-decoration: none;
}
.navbar-brand img {
    height: 50px;
    width: 50px;
    border-radius: var(--radius-lg);
    object-fit: cover;
}
.brand-text {
    line-height: 1.2;
}
.brand-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary-700);
    font-family: 'Poppins', sans-serif;
}
.brand-subtitle {
    font-size: 0.7rem;
    color: var(--gray-500);
}

/* 2. Menu Desktop */
.navbar-nav {
    align-items: center;
    gap: var(--space-2);
    list-style: none;
    margin: 0; /* Tambahkan ini untuk reset */
    padding: 0; /* Tambahkan ini untuk reset */
}
.nav-link {
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--gray-700);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center; /* biar teksnya rata tengah */
    gap: var(--space-1);

    min-width: 90px; /* atur sesuai kebutuhan */
}

.nav-link:hover, .nav-link.active {
    color: white;
    background: var(--gradient-primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}
.dropdown-icon {
    font-size: 0.7em;
    transition: transform 0.3s ease;
}

/* 3. Dropdown Desktop */
.nav-item.dropdown {
    position: relative;
}
.dropdown-menu {
    display: none;
    position: absolute;
    top: calc(100% + 10px);
    left: 0;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
    list-style: none;
    padding: var(--space-2);
    min-width: 220px;
    z-index: 1010;
    border: 1px solid var(--gray-100);
    opacity: 0;
    transform: translateY(10px);
    visibility: hidden;
    transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s;
}
.dropdown-menu a {
    display: block;
    padding: var(--space-2) var(--space-4);
    font-size: 0.85rem;
    color: var(--gray-700);
    text-decoration: none;
    transition: all 0.2s ease;
    border-radius: var(--radius-md);
}
.dropdown-menu a:hover {
    background: var(--primary-50);
    color: var(--primary-700);
    transform: translateX(2px);
}
.nav-item.dropdown:hover > .dropdown-menu {
    display: block;
    opacity: 1;
    transform: translateY(0);
    visibility: visible;
}
.nav-item.dropdown:hover > .nav-link .dropdown-icon {
    transform: rotate(180deg);
}

/* 4. Tombol Hamburger */
.navbar-toggler {
    background: transparent;
    border: none;
    padding: var(--space-2);
    cursor: pointer;
    z-index: 1020;
    width: 40px;
    height: 40px;
}
.hamburger {
    position: relative;
    width: 24px;
    height: 18px;
}
.hamburger span {
    display: block;
    position: absolute;
    height: 3px;
    width: 100%;
    background: var(--primary-600);
    border-radius: 3px;
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.hamburger span:nth-child(1) { top: 0; }
.hamburger span:nth-child(2) { top: 50%; transform: translateY(-50%); }
.hamburger span:nth-child(3) { bottom: 0; }

/* 5. Sidebar Mobile (Off-canvas) - TIDAK ADA PERUBAHAN DI SINI */
.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 1030;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.4s ease, visibility 0.4s ease;
}
.sidebar-overlay.active {
    opacity: 1;
    visibility: visible;
}
.mobile-sidebar {
    position: fixed;
    top: 0;
    right: -320px;
    width: 100%;
    max-width: 320px;
    height: 100%;
    background-color: #ffffff;
    z-index: 1040;
    box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
    transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    display: flex;
    flex-direction: column;
}
.mobile-sidebar.active {
    transform: translateX(-100%);
}
.sidebar-header, .sidebar-body, .sidebar-footer {
    /* Tidak ada perubahan, biarkan seperti sebelumnya */
}
/* ... (semua style sidebar lainnya tetap sama) ... */
.sidebar-header { display: flex; align-items: center; justify-content: space-between; padding: var(--space-4); border-bottom: 1px solid var(--gray-100); }
.sidebar-brand { display: flex; align-items: center; gap: var(--space-3); text-decoration: none; font-weight: 600; color: var(--gray-800); }
.sidebar-brand img { height: 40px; width: 30px; }
.close-btn { background: none; border: none; font-size: 1.8rem; color: var(--gray-500); cursor: pointer; }
.sidebar-body { padding: var(--space-4); overflow-y: auto; flex-grow: 1; }
.sidebar-info { font-size: 0.9rem; color: var(--gray-600); margin-bottom: var(--space-6); line-height: 1.6; }
.sidebar-nav { list-style: none; padding: 0; margin: 0; }
.sidebar-item { border-bottom: 1px solid var(--gray-100); }
.sidebar-link { display: flex; justify-content: space-between; align-items: center; padding: var(--space-4) 0; text-decoration: none; color: var(--gray-800); font-weight: 500; }
.sidebar-link i { transition: transform 0.3s ease; }
.sidebar-submenu { list-style: none; padding-left: var(--space-4); max-height: 0; overflow: hidden; transition: max-height 0.4s ease-in-out; }
.sidebar-submenu a { display: block; padding: var(--space-3) 0; text-decoration: none; color: var(--gray-600); font-size: 0.9rem; }
.sidebar-item.dropdown.active > .sidebar-link i { transform: rotate(45deg); }
.sidebar-item.dropdown.active > .sidebar-submenu { max-height: 500px; }
.sidebar-footer { padding: var(--space-4); border-top: 1px solid var(--gray-100); }
.sidebar-footer a { display: flex; align-items: center; gap: var(--space-3); text-decoration: none; color: var(--gray-700); font-size: 0.9rem; margin-bottom: var(--space-2); }


/* ======================================================
   6. UTILITY CLASSES RESPONSIVE (INI BAGIAN PERBAIKANNYA)
   ====================================================== */

.d-lg-none {
    display: none;
}

@media (max-width: 991.98px) {
    .d-lg-none {
        display: block;
    }

    .d-none.d-lg-flex {
        display: none !important;
    }

    .brand-text {
        display: none;
    }
}

/* Aturan untuk layar besar (992px dan di atasnya) */
@media (min-width: 992px) {
    .navbar-nav.d-lg-flex {
        display: flex;
    }
}




        



        /* ========================================
           HERO SECTION - SMART SCHOOL
           ======================================== */
        .hero {
            min-height: 100vh;
            background: var(--gradient-hero);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 90px; 
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="50%" height="60%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--space-6);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-16);
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            line-height: 1.1;
            margin-bottom: var(--space-6);
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-text .highlight {
            background: var(--gradient-secondary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-text p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: var(--space-8);
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: var(--space-4);
            flex-wrap: wrap;
        }
            




        .btn {
            padding: var(--space-4) var(--space-8);
            border-radius: var(--radius-full);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-bounce);
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--gradient-secondary);
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: var(--shadow-xl);
            color: white;
        }

        .btn-secondary {
            background: var(--gradient-accent);
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: var(--shadow-xl);
            color: white;
        }

        .btn-outline {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-3px) scale(1.05);
            color: white;
        }

      

        
        /* Floating Elements */
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-2xl);
            padding: var(--space-4);
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(2) {
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(4) {
            top: 50%;
            right: 5%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        /* ========================================
           FEATURES SECTION
           ======================================== */
        .features {
            padding: var(--space-24) 0;
            background: white;
        }

        .features .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--space-6);
        }

        .section-header {
            text-align: center;
            margin-bottom: var(--space-16);
        }

        .section-header h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: var(--space-4);
        }

        .section-header p {
            font-size: 1.1rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--space-8);
        }

        .feature-card {
            background: white;
            border-radius: var(--radius-2xl);
            padding: var(--space-8);
            box-shadow: var(--shadow-md);
            transition: var(--transition-bounce);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: var(--transition-normal);
        }

        .feature-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-xl);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--space-6);
            box-shadow: var(--shadow-glow);
        }

        .feature-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .feature-card h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: var(--space-3);
        }

        .feature-card p {
            color: var(--gray-600);
            line-height: 1.7;
        }

        /* ========================================
           FOOTER
           ======================================== */
        .footer {
            background: var(--gray-900);
            color: white;
            padding: var(--space-16) 0 var(--space-8);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--space-8);
            margin-bottom: var(--space-8);
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            margin-bottom: var(--space-4);
        }

        .footer-brand img {
            height: 50px;
            width: 50px;
            border-radius: var(--radius-lg);
            object-fit: cover;
        }

        .footer-brand h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: var(--space-1);
        }

        .footer-brand p {
            font-size: 0.8rem;
            color: var(--gray-400);
        }

        .footer-description {
            color: var(--gray-300);
            line-height: 1.7;
        }

        .footer-section h4 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: var(--space-4);
            color: white;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            color: var(--gray-300);
        }

        .contact-item i {
            color: var(--primary-400);
            width: 20px;
        }

        .social-links {
            display: flex;
            gap: var(--space-3);
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: var(--primary-600);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: var(--transition-bounce);
        }

        .social-link:hover {
            background: var(--primary-500);
            transform: translateY(-3px) scale(1.1);
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-700);
            padding-top: var(--space-6);
            text-align: center;
            color: var(--gray-400);
        }

        /* ========================================
           RESPONSIVE DESIGN - FIXED
           ======================================== */

           @media (max-width: 380px) {
             body{
                padding-top: 30px !important;
             }
        }

        @media (max-width: 768px) {
            body{
                padding-top: 10px;
            }
            .navbar-toggler {
                display: block;
            }
            

            .navbar-nav {

                position: fixed;
                top: 80px;
                left: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(25px);
                flex-direction: column;
                padding: var(--space-6);
                box-shadow: var(--shadow-2xl);
                opacity: 0;
                visibility: hidden;
                transform: translateY(-20px);
                transition: var(--transition-bounce);
                max-height: calc(100vh - 80px);
                overflow-y: auto;
                z-index: 999;
            }

            .navbar-nav.show {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .navbar-nav li {
                width: 100%;
                margin-bottom: var(--space-2);
            }

            .nav-link {
                width: 100%;
                padding: var(--space-4);
                text-align: center;
                justify-content: center;
            }

            .nav-link:hover {
                transform: translateX(0) scale(1.02);
            }

            .brand-text {
                display: none;
            }



            .hero-content {
                grid-template-columns: 1fr;
                gap: var(--space-8);
                text-align: center;
                padding-top: var(--space-8);
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image {
                transform: none;
                max-width: 400px;
                height: 300px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .floating-element {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .contact-info {
                align-items: center;
            }

            .social-links {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {


            .navbar-brand {
    display: flex;
    align-items: center;
    gap: 8px;
}

.navbar-brand img {
    height: 40px;
    width: 40px;
    object-fit: cover;
}

.brand-text {
    display: block; /* pastikan tidak hilang */
    line-height: 1.1;
}

.brand-title {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--primary-700);
}

.brand-subtitle {
    font-size: 0.65rem;
    color: var(--gray-500);
}



            .navbar .container {
                padding: 0 var(--space-4);
            }

            

            .hero-text h1 {
                font-size: 2rem;
            }

            .hero-text p {
                font-size: 1rem;
            }

            .btn {
                padding: var(--space-3) var(--space-6);
                font-size: 0.9rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .hero-content {
                padding: 0 var(--space-4);
            }
        }

        /* ========================================
           UTILITY CLASSES
           ======================================== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--space-6);
        }

        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }

        .mt-1 { margin-top: var(--space-1); }
        .mt-2 { margin-top: var(--space-2); }
        .mt-3 { margin-top: var(--space-3); }
        .mt-4 { margin-top: var(--space-4); }
        .mt-5 { margin-top: var(--space-5); }
        .mt-6 { margin-top: var(--space-6); }

        .mb-1 { margin-bottom: var(--space-1); }
        .mb-2 { margin-bottom: var(--space-2); }
        .mb-3 { margin-bottom: var(--space-3); }
        .mb-4 { margin-bottom: var(--space-4); }
        .mb-5 { margin-bottom: var(--space-5); }
        .mb-6 { margin-bottom: var(--space-6); }

        .d-none { display: none; }
        .d-block { display: block; }
        .d-flex { display: flex; }
        .d-grid { display: grid; }

        /* ========================================
           ANIMATIONS
           ======================================== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-fade-in-left {
            animation: fadeInLeft 0.6s ease-out;
        }

        .animate-fade-in-right {
            animation: fadeInRight 0.6s ease-out;
        }
    </style>

    @stack('styles')
</head>
<body>
<!-- 1. Navbar Utama (Header) -->
<nav class="navbar" id="mainNavbar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo-smp.png') }}" alt="Logo SMPN 12 Gresik">
            <div class="brand-text">
                <div class="brand-title">SMP NEGERI 12 GRESIK</div>
                <small class="brand-subtitle">Unggul & Berkarakter</small>
            </div>
        </a>

        <!-- Menu untuk Desktop (disembunyikan di mobile) -->
        <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
            </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->routeIs('about*') ? 'active' : '' }}" href="#">
                        Profil <i class="fas fa-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="{{ request()->routeIs('about.organization') ? 'active' : '' }}" href="{{ route('about.organization') }}">Profil Singkat</a></li>
                        <li><a class="{{ request()->routeIs('about.history') ? 'active' : '' }}" href="{{ route('about.history') }}">Sejarah</a></li>
                        <li><a class="{{ request()->routeIs('about.vision-mission') ? 'active' : '' }}" href="{{ route('about.vision-mission') }}">Visi & Misi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->routeIs('programs*') || request()->routeIs('academic*') ? 'active' : '' }}" href="#">
                        Akademik <i class="fas fa-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="{{ request()->routeIs('programs*') ? 'active' : '' }}" href="{{ route('programs') }}">
                                Program Keahlian
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('academic.extracurricular*') ? 'active' : '' }}" href="{{ route('academic.extracurricular') }}">
                                Ekstrakurikuler
                            </a>
                        </li>
                    </ul>
                </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('teachers') }}">Guru & Staff</a>
            </li>
           <li class="nav-item dropdown">
  <a class="nav-link {{ request()->routeIs('information.*') || request()->routeIs('academic*') ? 'active' : '' }}" href="#">
    Informasi <i class="fas fa-chevron-down dropdown-icon"></i>
  </a>
  <ul class="dropdown-menu">
    <li>
      <a class="{{ request()->routeIs('information.news') ? 'active' : '' }}" href="{{ route('information.news') }}">
        Berita
      </a>
    </li>
    <li>
      <a class="{{ request()->routeIs('information.ppdb*') ? 'active' : '' }}" href="{{ route('information.ppdb') }}">
        Informasi PPDB
      </a>
    </li>
  </ul>
</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
            </li>
        </ul>

        <!-- Tombol Hamburger (hanya tampil di mobile) -->
        <button class="navbar-toggler d-lg-none" id="navbarToggler" type="button" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
    </div>
</nav>

<!-- 2. Sidebar Mobile (Off-canvas) -->
<div class="mobile-sidebar" id="mobileSidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo-smp.png') }}" alt="Logo SMPN 12 Gresik">
            <span>SMPN 12 Gresik</span>
        </a>
        <button id="closeSidebarBtn" class="close-btn" aria-label="Close menu">&times;</button>
    </div>
    <div class="sidebar-body">
        <div class="sidebar-info">
            <p>Membentuk generasi unggul, cerdas, dan berkarakter melalui pendidikan modern.</p>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('home') }}">Beranda</a></li>
            <li class="sidebar-item dropdown">
                <a class="sidebar-link" href="#">Profil <i class="fas fa-plus"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('about') }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('about.history') }}">Sejarah</a></li>
                    <li><a href="{{ route('about.vision-mission') }}">Visi & Misi</a></li>
                </ul>
            </li>
            <li class="sidebar-item dropdown">
                <a class="sidebar-link" href="#">Akademik <i class="fas fa-plus"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('programs') }}">Program Keahlian</a></li>
                    <li><a href="{{ route('academic.extracurricular') }}">Ekstrakurikuler</a></li>
                </ul>
            </li>
             <li class="sidebar-item dropdown">
                <a class="sidebar-link" href="#">Informasi <i class="fas fa-plus"></i></a>
                <ul class="sidebar-submenu">
                   <li class="sidebar-item"><a class="sidebar-link" href="{{ route('information.news') }}">Berita</a></li>
                    <li><a href="{{ route('academic.extracurricular') }}">PPDB</a></li>
                </ul>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('teachers') }}">Guru & Staff</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('gallery') }}">Galeri</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('contact') }}">Kontak</a></li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <a href="mailto:info@smpn12gresik.sch.id"><i class="fas fa-envelope"></i> info@smpn12gresik.sch.id</a>
        <a href="tel:+62311234567"><i class="fas fa-phone"></i> (031) 123-4567</a>
    </div>
</div>

<!-- 3. Overlay untuk Sidebar -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-brand">
                        <img src="{{ asset('assets/logo-smp.png') }}" alt="Logo SMP Negeri 12 Gresik">
                        <div>
                            <h3>SMP Negeri 12 Gresik</h3>
                            <p>Smart School Unggul dalam Prestasi</p>
                        </div>
                    </div>
                    <p class="footer-description">
                        Sekolah unggulan yang mengintegrasikan teknologi modern dengan pendidikan berkualitas 
                        untuk menciptakan generasi yang cerdas, berkarakter, dan berwawasan global.
                    </p>
                </div>

                <div class="footer-section">
                    <h4>Kontak Kami</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Pendidikan No. 123, Gresik, Jawa Timur</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>(031) 123-4567</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@smpn12gresik.sch.id</span>
                        </div>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Ikuti Kami</h4>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} SMP Negeri 12 Gresik. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
       // ===================================================================
// JAVASCRIPT LENGKAP UNTUK SEMUA FITUR
// Cukup salin-tempel semua kode di dalam blok ini.
// ===================================================================
document.addEventListener('DOMContentLoaded', function() {

    // --- Inisialisasi AOS (Animasi saat scroll) ---
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }

    // --- Cache (Simpan) Elemen DOM untuk Performa Lebih Baik ---
    const mainNavbar = document.getElementById('mainNavbar');
    const navbarToggler = document.getElementById('navbarToggler');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebarBtn');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarDropdowns = document.querySelectorAll('.mobile-sidebar .sidebar-item.dropdown');

    // --- Fungsi untuk Mengontrol Sidebar ---
    const openSidebar = () => {
        if (mobileSidebar && sidebarOverlay) {
            mobileSidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };

    const closeSidebar = () => {
        if (mobileSidebar && sidebarOverlay) {
            mobileSidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    };

    // --- Event Listener untuk Sidebar ---
    if (navbarToggler) {
        navbarToggler.addEventListener('click', openSidebar);
    }
    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', closeSidebar);
    }
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }

    // --- Event Listener untuk Dropdown/Accordion di dalam Sidebar ---
    sidebarDropdowns.forEach(dropdown => {
        const link = dropdown.querySelector('.sidebar-link');
        if (link) {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const parentItem = e.currentTarget.parentElement;
                
                // Tutup dropdown lain jika ada yang aktif
                if (!parentItem.classList.contains('active')) {
                    sidebarDropdowns.forEach(d => {
                        if (d !== parentItem) {
                            d.classList.remove('active');
                        }
                    });
                }
                
                // Toggle (buka/tutup) dropdown yang diklik
                parentItem.classList.toggle('active');
            });
        }
    });

    // --- Efek Scroll pada Navbar Desktop ---
    const handleNavbarScroll = () => {
        if (mainNavbar) {
            if (window.scrollY > 50) {
                mainNavbar.classList.add('scrolled');
            } else {
                mainNavbar.classList.remove('scrolled');
            }
        }
    };
    window.addEventListener('scroll', handleNavbarScroll, { passive: true });

    // --- Pesan Konfirmasi di Console ---
    console.log("✅ Navigasi Modern (Desktop & Mobile) Siap Digunakan!");
});

    </script>

    @stack('scripts')
</body>
</html>

