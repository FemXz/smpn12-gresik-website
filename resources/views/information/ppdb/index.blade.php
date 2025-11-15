@extends('layouts.app')

@section('content')

@if(!$ppdb)
    <section class="py-20 text-center">
        <h2 class="text-2xl font-bold mb-2">PPDB Belum Tersedia</h2>
        <p class="text-gray-600">Admin belum mengisi data PPDB.</p>
    </section>
    @return
@endif


<!-- =========================================
 PPDB INDEX (DINAMIS)
========================================= -->
<section class="ppdb-section-v3">
    <div class="container">
        <div class="ppdb-card-v3" data-aos="fade-up">

            <!-- Kolom Kiri -->
            <div class="ppdb-content-v3">

                <div class="ppdb-header-v3">

                    @if($ppdb->section_badge)
                        <span class="ppdb-badge-v3">{{ $ppdb->section_badge }}</span>
                    @endif

                    <h2 class="ppdb-title-v3">
                        {{ $ppdb->section_title ?? 'Informasi Penerimaan Peserta Didik Baru' }}
                    </h2>

                    <p class="ppdb-description-v3">
                        {{ $ppdb->section_description ?? 'Informasi resmi PPDB SMP Negeri 12 Gresik' }}
                    </p>

                </div>

                <!-- JALUR PENDAFTARAN -->
                <div class="ppdb-schedule-v3">

                    @if($ppdb->jalur_afirmasi)
                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-hands-helping"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Afirmasi</h6>
                            <span>{{ $ppdb->jalur_afirmasi }}</span>
                        </div>
                    </div>
                    @endif

                    @if($ppdb->jalur_perpindahan)
                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-exchange-alt"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Perpindahan Tugas</h6>
                            <span>{{ $ppdb->jalur_perpindahan }}</span>
                        </div>
                    </div>
                    @endif

                    @if($ppdb->jalur_prestasi)
                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-trophy"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Prestasi</h6>
                            <span>{{ $ppdb->jalur_prestasi }}</span>
                        </div>
                    </div>
                    @endif

                    @if($ppdb->jalur_zonasi)
                    <div class="schedule-item-v3">
                        <div class="schedule-icon-v3"><i class="fas fa-map-marked-alt"></i></div>
                        <div class="schedule-info-v3">
                            <h6>Jalur Zonasi</h6>
                            <span>{{ $ppdb->jalur_zonasi }}</span>
                        </div>
                    </div>
                    @endif

                </div>

                <!-- BUTTONS -->
                <div class="ppdb-buttons-v3">

                    @if($ppdb->button_panduan_link)
                    <a href="{{ $ppdb->button_panduan_link }}" class="btn btn-primary">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ $ppdb->button_panduan_text ?? 'Lihat Panduan Lengkap' }}
                    </a>
                    @endif

                    @if($ppdb->button_wa_link)
                    <a href="{{ $ppdb->button_wa_link }}" class="btn btn-outline-secondary">
                        <i class="fab fa-whatsapp me-2"></i>
                        {{ $ppdb->button_wa_text ?? 'Hubungi Panitia' }}
                    </a>
                    @endif

                </div>

            </div>

            <!-- Kolom Kanan (Slider) -->
            <div class="ppdb-image-v3">
                <div class="swiper ppdbSwiperV3">
                    <div class="swiper-wrapper">

                        @if($ppdb->slider_1)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $ppdb->slider_1) }}" alt="">
                        </div>
                        @endif

                        @if($ppdb->slider_2)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $ppdb->slider_2) }}" alt="">
                        </div>
                        @endif

                        @if($ppdb->slider_3)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $ppdb->slider_3) }}" alt="">
                        </div>
                        @endif

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
