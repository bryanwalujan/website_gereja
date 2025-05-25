@extends('layouts.app')
@section('title', 'Kingdom Expansion')

@section('content')
    {{-- HERO SECTION --}}
    <section class="relative h-[80vh] min-h-[500px] bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 overflow-hidden flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-80" onerror="this.src='https://png.pngtree.com/background/20230425/original/pngtree-church-on-the-edge-of-a-field-next-to-the-ocean-picture-image_2475846.jpg';">
        </div>
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="relative z-10 text-center text-white px-4 w-full max-w-4xl mx-auto">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 leading-tight drop-shadow-lg text-[#FFCC33] italic">
                Kingdom Expansion
            </h1>
            <p class="text-base sm:text-lg max-w-md mx-auto mb-6 text-gray-200 italic">
                Bersatu dalam kasih, bertumbuh dalam kebenaran, dan berdampak bagi dunia.
            </p>
            <a href="/churches" class="inline-block px-5 py-1.5 sm:px-6 sm:py-2 bg-transparent text-white rounded-full text-sm sm:text-base font-semibold border border-white hover:bg-blue-600 hover:border-blue-600 transition-colors duration-300">
                Jelajahi Gereja
            </a>
        </div>
    </section>

    {{-- REGIONAL SECTION --}}
    <section class="py-12 sm:py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Regional Gereja Kami</h2>
                <div class="w-12 h-0.5 bg-[#FFCC33] mx-auto mb-4"></div>
                <p class="text-gray-600 text-sm sm:text-base">Menjangkau seluruh nusantara dengan kasih Kristus</p>
            </div>
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                @php
                    $regions = [
                        ['name' => 'Sumatera & Kalimantan', 'desc' => 'Gereja-gereja aktif dan bertumbuh di wilayah barat Indonesia.', 'link' => 'sumatera-kalimantan'],
                        ['name' => 'Jawa', 'desc' => 'Pusat pelayanan yang berkembang di kota-kota besar dan pedesaan.', 'link' => 'jawa'],
                        ['name' => 'Sulawesi & Papua', 'desc' => 'Melayani dengan semangat di pulau-pulau timur Indonesia.', 'link' => 'sulawesi-papua']
                    ];
                @endphp
                @foreach ($regions as $region)
                    <div class="p-5 sm:p-6 bg-gradient-to-br from-indigo-50 to-white rounded-xl sm:rounded-2xl shadow-md border border-indigo-100 hover:scale-[1.02] transition transform duration-300">
                        <div class="mb-4">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white rounded-full flex items-center justify-center text-blue-600 mx-auto">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2 text-center">{{ $region['name'] }}</h3>
                        <p class="text-gray-600 text-xs sm:text-sm text-center">{{ $region['desc'] }}</p>
                        <div class="text-center mt-3 sm:mt-4">
                            <a href="/churches?region={{ $region['link'] }}" class="text-blue-600 hover:text-indigo-800 font-medium text-sm transition duration-200">Lihat Detail →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ABOUT SECTION --}}
    <section class="py-12 sm:py-16 bg-gradient-to-b from-white to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto flex flex-col-reverse md:flex-row items-center gap-6 sm:gap-8">
                <div class="md:w-1/2 mt-6 sm:mt-0">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 sm:mb-4">Tentang Kami</h2>
                    <div class="w-12 h-0.5 bg-[#FFCC33] mb-3 sm:mb-4"></div>
                    <p class="text-gray-700 mb-2 sm:mb-3 leading-relaxed text-sm sm:text-base">Kami adalah komunitas gereja yang terpanggil untuk membangun kehidupan yang berdasar pada firman Tuhan dan kasih Kristus.</p>
                    <p class="text-gray-700 mb-3 sm:mb-4 leading-relaxed text-sm sm:text-base">Dengan dukungan dari berbagai regional di seluruh Indonesia, kami terus memperluas pelayanan dan misi gereja lokal.</p>
                    <a href="/about" class="inline-block bg-blue-600 text-white px-5 py-1.5 sm:px-6 sm:py-2 rounded-full font-medium shadow hover:bg-indigo-700 transition text-xs sm:text-sm">Selengkapnya</a>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('images/about-us.jpg') }}" alt="Tentang Kami" class="rounded-lg shadow-lg w-full" onerror="this.src='https://i.pinimg.com/736x/95/60/2c/95602c47d4723af602f96f4b0e428c32.jpg';">
                </div>
            </div>
        </div>
    </section>
@endsection