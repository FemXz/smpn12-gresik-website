<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "Admin Dashboard - SMPN 12 Gresik")</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #f59e0b;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #06b6d4;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --sidebar-bg: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            --gradient-primary: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            --gradient-secondary: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: var(--dark-color);
            overflow-x: hidden;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

       /* 🌙 Sidebar Styling (full fixed + scrollable + responsive) */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    height: 100vh;
    background: var(--sidebar-bg);
    color: white;
    box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    overflow-y: auto;              /* ✅ Bisa di-scroll */
    overflow-x: hidden;
    scrollbar-width: thin;
    scrollbar-color: rgba(255,255,255,0.2) transparent;
}

/* ✅ Scrollbar smooth & elegan */
.sidebar::-webkit-scrollbar {
    width: 6px;
}
.sidebar::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.2);
    border-radius: 10px;
}
.sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255,255,255,0.3);
}

/* 🌈 Header Sidebar */
.sidebar-header {
    padding: 25px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    flex-shrink: 0;
}

.sidebar-header h4 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 1.3rem;
    margin: 0;
    background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.sidebar-header small {
    color: #cbd5e1;
    font-size: 0.85rem;
    font-weight: 500;
}

/* 🌟 Sidebar Navigation */
.sidebar-nav {
    flex-grow: 1;
    padding: 20px 0 80px; /* ✅ Tambah ruang bawah biar gak ketutup */
}

.sidebar-nav .nav-item {
    margin: 5px 15px;
}

.sidebar-nav .nav-link {
    color: #cbd5e1;
    padding: 15px 20px;
    text-decoration: none;
    display: flex;
    align-items: center;
    border-radius: 12px;
    transition: all 0.3s ease;
    font-weight: 500;
    font-size: 0.95rem;
    position: relative;
    overflow: hidden;
}

.sidebar-nav .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s ease;
}

.sidebar-nav .nav-link:hover::before {
    left: 100%;
}

.sidebar-nav .nav-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateX(5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.sidebar-nav .nav-link.active {
    background: var(--gradient-primary);
    color: white;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    transform: translateX(5px);
}

.sidebar-nav .nav-link i {
    width: 20px;
    margin-right: 12px;
    text-align: center;
    font-size: 1.1rem;
}

.sidebar-nav .badge {
    margin-left: auto;
    background: var(--gradient-secondary);
    border: none;
    font-size: 0.75rem;
    padding: 4px 8px;
}

/* 📱 Responsif di mobile (360px ke bawah) */
@media (max-width: 480px) {
    .sidebar {
        width: 240px;
        font-size: 0.9rem;
    }

    .sidebar-header {
        padding: 20px 15px;
    }

    .sidebar-nav .nav-link {
        padding: 12px 16px;
        font-size: 0.9rem;
    }
}

/* 🧩 Jika pakai toggle sidebar (optional) */
.sidebar.hide {
    transform: translateX(-100%);
}
.sidebar.show {
    transform: translateX(0);
}


        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Top Navbar */
        .navbar-admin {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-admin .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.3rem;
        }

        .navbar-admin .nav-link {
            color: var(--dark-color);
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .navbar-admin .nav-link:hover {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
        }

        .navbar-admin .dropdown-menu {
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            padding: 10px;
            margin-top: 10px;
        }

        .navbar-admin .dropdown-item {
            border-radius: 10px;
            padding: 10px 15px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .navbar-admin .dropdown-item:hover {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
        }

        /* Content Area */
        .content-area {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1rem;
            font-weight: 500;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            padding: 20px 25px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 25px;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-card.primary::before {
            background: var(--gradient-primary);
        }

        .stat-card.success::before {
            background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        }

        .stat-card.warning::before {
            background: var(--gradient-secondary);
        }

        .stat-card.info::before {
            background: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 0.95rem;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .stat-change {
            font-size: 0.85rem;
            font-weight: 500;
        }

        .stat-change.positive {
            color: var(--success-color);
        }

        .stat-change.negative {
            color: var(--danger-color);
        }

        .stat-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.primary {
            background: var(--gradient-primary);
        }

        .stat-icon.success {
            background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        }

        .stat-icon.warning {
            background: var(--gradient-secondary);
        }

        .stat-icon.info {
            background: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%);
        }

        /* Buttons */
        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: var(--gradient-primary);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .btn-warning {
            background: var(--gradient-secondary);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }

        .btn-info {
            background: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%);
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.3);
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(6, 182, 212, 0.4);
        }

        /* Tables */
        .table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .table thead th {
            background: var(--gradient-primary);
            color: white;
            font-weight: 600;
            border: none;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            border-color: rgba(0, 0, 0, 0.05);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: rgba(37, 99, 235, 0.05);
        }

        /* Forms */
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-area {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }
        }

        /* Animations */
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.6s ease-out;
        }

        /* Loading */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }


        /* ✅ Fix posisi dropdown biar turun ke luar navbar */
.navbar-admin {
  position: relative;
  z-index: 1001;
}

/* === FIX DROPDOWN DI LUAR NAVBAR === */
.navbar-admin {
  position: relative;
  z-index: 1051; /* pastikan lebih tinggi dari main-content */
  overflow: visible !important; /* biar dropdown gak terpotong */
}

/* Dropdown default (desktop) */
.navbar-admin .dropdown-menu {
  position: absolute !important;
  top: calc(100% + 8px) !important;
  right: 0 !important;
  left: auto !important;
  border: none;
  border-radius: 16px;
  background: #fff;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
  z-index: 2003; /* lebih tinggi dari sidebar & konten */
  transform: translateY(10px);
  animation: dropdownFade 0.25s ease-out;
}

/* Animasi smooth */
@keyframes dropdownFade {
  from {
    opacity: 0;
    transform: translateY(0);
  }
  to {
    opacity: 1;
    transform: translateY(10px);
  }
}

/* Mobile Fix (360–480px) */
@media (max-width: 480px) {
  .navbar-admin {
    position: sticky;
    top: 0;
    background: #fff;
    z-index: 2005;
    overflow: visible !important;
  }

  .navbar-admin .dropdown {
    position: static !important;
  }

  .navbar-admin .dropdown-menu {
    position: absolute !important;
    top: calc(100% + 12px) !important;
    right: 12px !important;
    left: auto !important;
    min-width: 170px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    z-index: 3000;
  }
}

/* Tablet fix (481–992px) */
@media (max-width: 992px) {
  .navbar-admin .dropdown-menu {
    top: calc(100% + 10px);
    right: 12px;
    left: auto !important;
  }
}

    </style>
    
    @stack('styles')
</head>
<body>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h4 class="font-poppins">Admin Panel</h4>
        <small>SMPN 12 Gresik</small>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

          
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.stats.edit') ? 'active' : '' }}" href="{{ route('admin.stats.edit') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Statistik</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Manajemen User</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}">
                    <i class="fas fa-images"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}" href="{{ route('admin.programs.index') }}">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Program Keahlian</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.extracurriculars.*') ? 'active' : '' }}" href="{{ route('admin.extracurriculars.index') }}">
                    <i class="fas fa-running"></i>
                    <span>Ekstrakurikuler</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.teacher-news.*') ? 'active' : '' }}" href="{{ route('admin.teacher-news.index') }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Berita Guru</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}" href="{{ route('admin.teachers.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Guru & Staff</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.ebooks.*') ? 'active' : '' }}" href="{{ route('admin.ebooks.index') }}">
                    <i class="fas fa-book"></i>
                    <span>E-Books</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}" href="{{ route('admin.alumni.index') }}">
                    <i class="fas fa-user-graduate"></i>
                    <span>Alumni</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.ppdb.*') ? 'active' : '' }}" href="{{ route('admin.ppdb.index') }}">
                    <i class="fas fa-user-plus"></i>
                    <span>PPDB</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Lihat Website</span>
                </a>
            </li>
        </ul>
    </nav>
</div>



    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-admin">
  <div class="container-fluid flex-wrap justify-content-between align-items-center">

    <!-- Left: Toggle Sidebar -->
    <button class="btn btn-link text-primary fs-4 d-lg-none order-1" type="button" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Center: Page Title -->
    <div class="navbar-brand mx-auto order-2 text-center d-flex align-items-center gap-2">
      <span class="fw-bold text-primary">@yield('page-title', 'Dashboard')</span>
    </div>

    <!-- Right: User Dropdown -->
    <div class="navbar-nav order-3 ms-lg-auto mt-2 mt-lg-0">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-center gap-2"
           href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle fa-lg"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" aria-labelledby="navbarDropdown">
          <li>
            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
              <i class="fas fa-user me-2 text-primary"></i> Profil
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cog me-2 text-secondary"></i> Pengaturan
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item text-danger">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>



        <!-- Content Area -->
        <div class="content-area">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle sidebar for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('[onclick="toggleSidebar()"]');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Auto-hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card, .stat-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-fade-in-up');
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>

