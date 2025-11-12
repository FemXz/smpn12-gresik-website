@extends('layouts.app')

@section('title', 'Galeri - SMPN 12 Gresik')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
        min-height: 100vh;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    
/* Header Styles */
.header {
    background: linear-gradient(135deg, #14532d 0%, #15803d 40%, #22c55e 100%);
    position: relative;
    overflow: hidden;
    padding: 80px 20px 60px;
}

/* Dekorasi glowing circle */
.header::before,
.header::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    filter: blur(70px);
    opacity: 0.25;
    z-index: 0;
}
.header::before {
    top: -120px;
    right: -120px;
    width: 320px;
    height: 320px;
    background: #22c55e;
}
.header::after {
    bottom: -100px;
    left: -120px;
    width: 260px;
    height: 260px;
    background: #16a34a;
}

/* Konten utama */
.header-content {
    position: relative;
    text-align: center;
    color: #fff;
    max-width: 850px;
    margin: 0 auto;
    z-index: 1;
}

/* Logo Container */
.school-logo {
    width: 160px;
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    backdrop-filter: blur(6px);
    overflow: hidden; /* biar gambar nggak keluar lingkaran */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Efek hover */
.school-logo:hover {
    transform: scale(1.05);
   
}

/* Gambar di dalam logo */
.school-logo img {
    width: 70%;
    height: 70%;
    object-fit: contain;
}


/* Judul */
.header h1 {
    font-size: 2.3rem;
    font-weight: 800;
    margin-bottom: 12px;
    letter-spacing: -0.02em;
    line-height: 1.2;
}

/* Subtitle */
.header-subtitle {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    color: #bbf7d0;
    font-size: 1rem;
    margin-bottom: 14px;
}

/* Deskripsi */
.header-description {
    color: #dcfce7;
    font-size: 1rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Statistik */
.stats {
    display: flex;
    justify-content: center;
    gap: 28px;
    margin-top: 28px;
    flex-wrap: wrap;
}
.stat-item {
    text-align: center;
}
.stat-number {
    font-size: 1.3rem;
    font-weight: 700;
    color: #fff;
}
.stat-label {
    color: #bbf7d0;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
}

/* 📱 Mobile */
@media (max-width: 768px) {
    .header {
        padding: 60px 16px 40px;
    }
    .school-logo {
        width: 60px;
        height: 60px;
        font-size: 1.3rem;
        margin-bottom: 12px;
    }
    .header h1 {
        font-size: 1.7rem;
        margin-bottom: 8px;
    }
    .header-subtitle {
        font-size: 0.85rem;
        margin-bottom: 8px;
    }
    .header-description {
        font-size: 0.8rem;
        line-height: 1.4;
    }
    .stats {
        gap: 16px;
        margin-top: 18px;
    }
    .stat-number {
        font-size: 1.05rem;
    }
    .stat-label {
        font-size: 0.72rem;
    }
}


    
    /* Main Content */
    .main-content {
        padding: 48px 0;
    }
    
  /* Wrapper */
.filter-section {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    padding: 28px;
    margin-bottom: 36px;
    transition: transform 0.3s ease;
}
.filter-section:hover {
    transform: translateY(-2px);
}

/* Header */
.filter-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 12px;
}

.filter-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #14532d;
    display: flex;
    align-items: center;
    gap: 10px;
}

.filter-title i {
    color: #16a34a;
    font-size: 1.25rem;
}

.filter-updated {
    font-size: 0.9rem;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Buttons */
.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
}

.filter-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 0.95rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}

/* Aktif */
.filter-btn.active {
    background: linear-gradient(135deg, #15803d, #16a34a, #22c55e);
    color: #fff;
    box-shadow: 0 8px 24px rgba(22, 163, 74, 0.35);
}

/* Default */
.filter-btn:not(.active) {
    background: #fff;
    color: #374151;
    border: 2px solid #e5e7eb;
}

/* Hover efek */
.filter-btn:not(.active):hover {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: #fff;
    border-color: #16a34a;
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(22, 163, 74, 0.35);
}

.filter-btn.video-btn:not(.active):hover {
    background: linear-gradient(135deg, #dc2626, #ef4444);
    border-color: #ef4444;
    box-shadow: 0 10px 28px rgba(239, 68, 68, 0.35);
}

/* Count */
.filter-count {
    background: rgba(255, 255, 255, 0.25);
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.filter-btn:not(.active) .filter-count {
    background: #f3f4f6;
    color: #6b7280;
}

/* 📱 Mobile */
@media (max-width: 640px) {
    .filter-section {
        padding: 20px;
    }
    .filter-title {
        font-size: 1.25rem;
    }
    .filter-buttons {
        gap: 10px;
    }
    .filter-btn {
        padding: 10px 18px;
        font-size: 0.85rem;
    }
}


    /* Gallery Grid */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 24px;
    }
    
    .gallery-item {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .gallery-image {
        position: relative;
        aspect-ratio: 16/9;
        background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        overflow: hidden;
    }
    
    .gallery-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover .gallery-image img {
        transform: scale(1.05);
    }
    
    .gallery-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        color: white;
        display: flex;
        align-items: center;
        gap: 4px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    
    .gallery-badge.photo {
        background: linear-gradient(135deg, #10b981, #059669);
    }
    
    .gallery-badge.video {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }
    
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .gallery-item:hover .gallery-overlay {
        background: rgba(0,0,0,0.2);
    }
    
    .gallery-overlay i {
        color: white;
        font-size: 1.5rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .gallery-item:hover .gallery-overlay i {
        opacity: 1;
    }
    
    .video-play-btn {
        background: rgba(239, 68, 68, 0.9);
        border-radius: 50%;
        padding: 16px;
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover .video-play-btn {
        transform: scale(1.1);
    }
    
    .gallery-content {
        padding: 20px;
    }
    
    .gallery-title {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
        font-size: 1.1rem;
    }
    
    .gallery-description {
        color: #6b7280;
        font-size: 0.875rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .gallery-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid #f3f4f6;
    }
    
    .gallery-meta {
        font-size: 0.75rem;
        color: #9ca3af;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .gallery-date {
        font-size: 0.75rem;
        color: #9ca3af;
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 0;
    }
    
    .empty-state-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 48px;
        max-width: 400px;
        margin: 0 auto;
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 24px;
    }
    
    .empty-state h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #6b7280;
        margin-bottom: 12px;
    }
    
    .empty-state p {
        color: #9ca3af;
        line-height: 1.7;
    }
    
    /* Modal */
    .modal {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.8);
        backdrop-filter: blur(10px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        padding: 16px;
    }
    
    .modal.show {
        display: flex;
    }
    
    .modal-content {
        background: white;
        border-radius: 16px;
        max-width: 800px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        animation: modalFadeIn 0.3s ease;
    }
    
    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 32px;
        padding-bottom: 24px;
    }
    
    .modal-title-section {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .modal-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }
    
    .modal-icon.photo {
        background: linear-gradient(135deg, #10b981, #059669);
    }
    
    .modal-icon.video {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }
    
    .modal-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }
    
    .modal-type {
        color: #6b7280;
        font-size: 0.875rem;
        margin: 0;
    }
    
    .modal-close {
        color: #9ca3af;
        font-size: 1.5rem;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: color 0.3s ease;
    }
    
    .modal-close:hover {
        color: #6b7280;
    }
    
    .modal-body {
        padding: 0 32px 32px;
    }
    
    .modal-media {
        margin-bottom: 24px;
    }
    
    .modal-media img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    
    .modal-video {
        aspect-ratio: 16/9;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    
    .modal-video iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    
    .modal-description {
        background: #f9fafb;
        border-radius: 12px;
        padding: 16px;
    }
    
    .modal-description h4 {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .modal-description h4 i {
        color: #3b82f6;
    }
    
    .modal-description p {
        color: #6b7280;
        line-height: 1.7;
        margin: 0;
    }
    
    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 48px;
    }
    
    .pagination {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .pagination .page-link {
        padding: 12px 16px;
        background: white;
        color: #374151;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .pagination .page-link:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
        border-color: #3b82f6;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 0 16px;
        }
        
        .header h1 {
            font-size: 2rem;
        }
        
        .stats {
            gap: 16px;
        }
        
        .filter-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        
        .gallery-grid {
            grid-template-columns: 1fr;
        }
        
        .modal-header,
        .modal-body {
            padding: 24px 16px;
        }
        
        .modal-title-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
    }
    
    .hidden {
        display: none !important;
    }
</style>

<!-- Header -->
<div class="header">
    <div class="container">
        <div class="header-content">
            <!-- School Logo -->
            <div class="school-logo">
               <img src="{{ asset('assets/logo-smp.png') }}" alt="Logo Sekolah">
            </div>
            
            <!-- School Name -->
            <h1>SMPN 12 Gresik</h1>
            
            <!-- Description -->
            <p class="header-description">
                Koleksi foto dan video kegiatan, prestasi, dan momen bersejarah 
                <br>SMPN 12 Gresik
            </p>
            
            <!-- Stats -->
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number" id="photoCount">{{ $galleries->where('youtube_url', null)->count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-camera"></i>Foto
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="videoCount">{{ $galleries->where('youtube_url', '!=', null)->count() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-video"></i>Video
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="totalCount">{{ $galleries->total() }}</div>
                    <div class="stat-label">
                        <i class="fas fa-folder"></i>Total
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-content">
        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-header">
                <h2 class="filter-title">
                    <i class="fas fa-filter"></i>
                    Kategori Konten
                </h2>

            </div>
            
            <div class="filter-buttons">
                <button onclick="filterContent('all')" class="filter-btn active">
                    <i class="fas fa-th-large"></i>
                    <span>Semua Konten</span>
                    <span class="filter-count" id="allCount">{{ $galleries->total() }}</span>
                </button>
                <button onclick="filterContent('photo')" class="filter-btn">
                    <i class="fas fa-camera"></i>
                    <span>Foto</span>
                    <span class="filter-count" id="photoFilterCount">{{ $galleries->where('youtube_url', null)->count() }}</span>
                </button>
                <button onclick="filterContent('video')" class="filter-btn video-btn">
                    <i class="fas fa-video"></i>
                    <span>Video</span>
                    <span class="filter-count" id="videoFilterCount">{{ $galleries->where('youtube_url', '!=', null)->count() }}</span>
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div id="galleryGrid" class="gallery-grid">
            @forelse($galleries as $item)
                @if($item->image)
                    <div class="gallery-item" data-type="photo" onclick='openModal(@json($item))'>
                        <div class="gallery-image">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" onerror="this.parentElement.innerHTML='<div style=\'display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; color: #9ca3af;\'>📷<br><span style=\'font-size: 0.875rem; margin-top: 8px;\'>Foto tidak dapat dimuat</span></div>';">
                            <div class="gallery-badge photo">
                                <i class="fas fa-camera"></i>
                                Foto
                            </div>
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gallery-content">
                            <h3 class="gallery-title">{{ $item->title }}</h3>
                            <p class="gallery-description">{{ $item->description ?? 'Tidak ada deskripsi tersedia.' }}</p>
                            <div class="gallery-footer">
                                <span class="gallery-meta">
                                    <i class="fas fa-eye"></i>
                                    Klik untuk melihat
                                </span>
                                <span class="gallery-date">{{ $item->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                @elseif($item->youtube_url)
@php
    $youtubeId = null;

    if ($item->youtube_url) {
        // Tangkap dari berbagai format
        if (preg_match('/(?:youtube\.com\/.*v=|youtu\.be\/|youtube\.com\/embed\/)([^?&]+)/', $item->youtube_url, $matches)) {
            $youtubeId = $matches[1] ?? null;
        }
    }
@endphp

@if($youtubeId)
    <div class="gallery-item" data-type="video" onclick='openModal(@json($item))'>
        <div class="gallery-image">
            <img src="https://img.youtube.com/vi/{{ $youtubeId }}/maxresdefault.jpg"
                 alt="{{ $item->title }}"
                 onerror="this.onerror=null;this.src='https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg';">
            
            <div class="gallery-badge video">
                <i class="fas fa-video"></i> Video
            </div>
            <div class="gallery-overlay">
                <div class="video-play-btn">
                    <i class="fas fa-play" style="margin-left: 2px;"></i>
                </div>
            </div>
        </div>
        <div class="gallery-content">
            <h3 class="gallery-title">{{ $item->title }}</h3>
            <p class="gallery-description">{{ $item->description ?? 'Tidak ada deskripsi tersedia.' }}</p>
            <div class="gallery-footer">
                <span class="gallery-meta">
                    <i class="fab fa-youtube" style="color: #ef4444;"></i>
                    YouTube Video
                </span>
                <span class="gallery-date">{{ $item->created_at->format('d M Y') }}</span>
            </div>
        </div>
    </div>
@endif

                  
                @endif
            @empty
                <!-- Empty State -->
                <div id="emptyState" class="empty-state" style="grid-column: 1 / -1;">
                    <div class="empty-state-card">
                        <i class="fas fa-images"></i>
                        <h3>Gallery Kosong</h3>
                        <p>
                            Belum ada foto atau video yang ditampilkan.<br>
                            Konten akan muncul di sini setelah ditambahkan.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $galleries->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title-section">
                <div id="modalIcon" class="modal-icon"></div>
                <div>
                    <h3 id="modalTitle" class="modal-title"></h3>
                    <p id="modalType" class="modal-type"></p>
                </div>
            </div>
            <button onclick="closeModal()" class="modal-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div id="modalContent" class="modal-media"></div>
            <div class="modal-description">
                <h4>
                    <i class="fas fa-info-circle"></i>
                    Deskripsi
                </h4>
                <p id="modalDesc"></p>
            </div>
        </div>
    </div>
</div>

<script>
    function extractYouTubeId(url) {
        if (!url) return null;
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    function filterContent(type) {
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        event.target.classList.add('active');
        
        // Filter items
        const items = document.querySelectorAll('.gallery-item');
        let visibleCount = 0;
        
        items.forEach(item => {
            const itemType = item.dataset.type;
            if (type === 'all' || itemType === type) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Show/hide empty state
        const emptyState = document.getElementById('emptyState');
        if (emptyState) {
            emptyState.style.display = visibleCount > 0 ? 'none' : 'block';
        }
    }

    function openModal(item) {
        const modal = document.getElementById('modal');
        const modalTitle = document.getElementById('modalTitle');
        const modalContent = document.getElementById('modalContent');
        const modalDesc = document.getElementById('modalDesc');
        const modalIcon = document.getElementById('modalIcon');
        const modalType = document.getElementById('modalType');
        
        modalTitle.textContent = item.title;
        modalDesc.textContent = item.description || 'Tidak ada deskripsi tersedia.';
        
        if (item.image) {
            modalIcon.className = 'modal-icon photo';
            modalIcon.innerHTML = '<i class="fas fa-camera"></i>';
            modalType.textContent = 'Dokumentasi Foto';
            modalContent.innerHTML = `
                <img src="${item.image}" alt="${item.title}" onerror="this.src=''; this.alt='Foto gagal dimuat';">
            `;
        } else if (item.youtube_url) {
            const videoId = extractYouTubeId(item.youtube_url);
            modalIcon.className = 'modal-icon video';
            modalIcon.innerHTML = '<i class="fas fa-video"></i>';
            modalType.textContent = 'Video YouTube';
            
            if (videoId) {
                modalContent.innerHTML = `
                    <div class="modal-video">
                        <iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0" 
                                allow="autoplay; encrypted-media; picture-in-picture" 
                                allowfullscreen></iframe>
                    </div>
                `;
            } else {
                modalContent.innerHTML = '<p style="color: #ef4444;">URL Video YouTube tidak valid.</p>';
            }
        }
        
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        modal.classList.remove('show');
        document.body.style.overflow = '';
        
        // Stop video by clearing content
        document.getElementById('modalContent').innerHTML = '';
    }

    // Close modal when clicking outside
    document.getElementById('modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>
@endsection

