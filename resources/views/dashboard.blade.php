@extends('layouts.app')
@section('title', 'Dashboard Publik')

@section('content')
    <!-- Debug Info (optional) -->
   

    <!-- Hero Section -->
    <section class="relative py-16 bg-gradient-to-r from-blue-800 to-indigo-900 text-white">
        <div class="container mx-auto px-4 z-10 text-center">
            <div class="max-w-2xl mx-auto">
                <h1 class="text-3xl sm:text-4xl font-bold mb-4 leading-tight">Jaringan Gereja Kami</h1>
                <p class="text-base sm:text-lg opacity-90 mb-6">Temukan gereja-gereja dan workshop dalam jaringan kami yang tersebar di seluruh Indonesia.</p>
                <div class="w-16 h-1 bg-yellow-400 mx-auto"></div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-12 bg-white transform skew-y-1 -mb-6"></div>
    </section>

    <!-- Church Listing Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Filter Section -->
            <div class="mb-8 p-4 sm:p-6 bg-white rounded-lg shadow-sm">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">
                            @if(request('region') === 'sumatera-kalimantan')
                                Gereja di Sumatra & Kalimantan
                            @elseif(request('region') === 'jawa')
                                Gereja di Jawa
                            @elseif(request('region') === 'sulawesi-papua')
                                Gereja di Sulawesi & Papua
                            @else
                                Jaringan Gereja Kami
                            @endif
                        </h2>
                        <p class="text-gray-500 text-sm mt-1">Temukan gereja terdekat dengan lokasi Anda</p>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mt-3 md:mt-0">
                        <a href="{{ route('public.church.index', ['region' => 'sumatera-kalimantan', 'search' => request('search')]) }}" 
                           class="px-3 py-1 text-xs sm:text-sm rounded-full transition-all {{ request('region') === 'sumatera-kalimantan' ? 'bg-blue-600 text-white shadow' : 'bg-white text-gray-700 border border-gray-200 hover:border-blue-400' }}">
                            Sumatra & Kalimantan
                        </a>
                        <a href="{{ route('public.church.index', ['region' => 'jawa', 'search' => request('search')]) }}" 
                           class="px-3 py-1 text-xs sm:text-sm rounded-full transition-all {{ request('region') === 'jawa' ? 'bg-blue-600 text-white shadow' : 'bg-white text-gray-700 border border-gray-200 hover:border-blue-400' }}">
                            Jawa
                        </a>
                        <a href="{{ route('public.church.index', ['region' => 'sulawesi-papua', 'search' => request('search')]) }}" 
                           class="px-3 py-1 text-xs sm:text-sm rounded-full transition-all {{ request('region') === 'sulawesi-papua' ? 'bg-blue-600 text-white shadow' : 'bg-white text-gray-700 border border-gray-200 hover:border-blue-400' }}">
                            Sulawesi & Papua
                        </a>
                        <a href="{{ route('public.church.index', ['search' => request('search')]) }}" 
                           class="px-3 py-1 text-xs sm:text-sm rounded-full transition-all {{ !request('region') ? 'bg-blue-600 text-white shadow' : 'bg-white text-gray-700 border border-gray-200 hover:border-blue-400' }}">
                            Semua Wilayah
                        </a>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="mt-4">
                    <form action="{{ route('public.church.index') }}" method="GET">
                        @if(request('region'))
                            <input type="hidden" name="region" value="{{ request('region') }}">
                        @endif
                        <div class="relative">
                            <input type="text" 
                                   name="search" 
                                   placeholder="Cari gereja, kota, atau gembala..." 
                                   value="{{ request('search') }}"
                                   class="w-full p-2 pl-10 pr-20 text-sm rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-200 transition-all outline-none">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <button type="submit" class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white px-2 py-1 text-xs sm:text-sm rounded hover:bg-blue-700 transition-colors">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Church Cards Grid -->
            @if(count($churches) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($churches as $church)
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                        <div class="h-40 sm:h-48 relative overflow-hidden">
                            @if($church->church_image)
                                <img src="{{ asset('storage/' . $church->church_image) }}" 
                                     alt="{{ $church->name }}" 
                                     class="w-full h-full object-cover transition duration-500 hover:scale-105">
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                                    Tidak ada gambar
                                </div>
                            @endif
                            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-gray-800">{{ $church->name }}</h3>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full">{{ $church->region }}</span>
                            </div>
                            
                            <div class="space-y-2 text-gray-600 text-sm">
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span><span class="font-medium">Gembala:</span> {{ $church->pastor_name }}</span>
                                </div>
                                
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span><span class="font-medium">Alamat:</span> {{ Str::limit($church->address, 50) }}</span>
                                </div>
                                
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span><span class="font-medium">Telp:</span> {{ $church->phone }}</span>
                                </div>
                                
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    <span><span class="font-medium">Jemaat:</span> {{ $church->congregation_count }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-4 pt-3 border-t border-gray-100 flex justify-end">
                                <a href="{{ route('public.church.show', $church->id) }}" class="flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                    Lihat Detail
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 bg-white rounded-lg shadow-sm">
                    <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-base font-medium text-gray-900">Tidak ada hasil ditemukan</h3>
                    <p class="mt-1 text-gray-500 text-sm">Coba dengan kata kunci atau filter yang berbeda.</p>
                    <div class="mt-4">
                        <a href="{{ route('public.church.index') }}" class="inline-flex items-center px-3 py-1 border border-transparent text-xs sm:text-sm font-medium rounded shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                            Tampilkan Semua Gereja
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Workshop Listing Section -->
    {{-- <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Daftar Workshop</h2>
                <p class="text-gray-500 text-sm mt-1">Ikuti workshop terbaru dari jaringan gereja kami</p>
            </div>
            
            @if(count($workshops) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($workshops as $workshop)
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $workshop->topic }}</h3>
                            <div class="space-y-2 text-gray-600 text-sm">
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                    </svg>
                                    <span><span class="font-medium">Gereja:</span> {{ $workshop->church->name }} ({{ $workshop->region }})</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span><span class="font-medium">Lokasi:</span> {{ Str::limit($workshop->location, 50) }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span><span class="font-medium">Tanggal:</span> {{ $workshop->date }}</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span><span class="font-medium">Pembicara:</span> {{ $workshop->speaker }}</span>
                                </div>
                            </div>
                            @if($workshop->speaker_photo)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $workshop->speaker_photo) }}" alt="Foto Pembicara" class="w-16 h-16 rounded-full object-cover">
                                </div>
                            @endif
                            <div class="mt-4 pt-3 border-t border-gray-200 flex justify-end">
                                <a href="{{ route('public.workshop.show', $workshop->id) }}" class="flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                    Lihat Detail
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 bg-gray-50 rounded-lg shadow-sm">
                    <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-base font-medium text-gray-900">Tidak ada workshop ditemukan</h3>
                    <p class="mt-1 text-gray-500 text-sm">Cek kembali nanti untuk update workshop terbaru.</p>
                </div>
            @endif
        </div>
    </section> --}}
@endsection
    
