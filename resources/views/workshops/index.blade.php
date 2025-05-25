@extends('layouts.app')
@section('title', 'Workshop & Pelatihan')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-16 bg-gradient-to-r from-blue-800 to-indigo-900 text-white overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl sm:text-5xl font-bold mb-4 leading-tight">
                    Workshop & Pelatihan
                </h1>
                <div class="w-20 h-1.5 bg-yellow-400 mx-auto mb-6 rounded-full"></div>
                <p class="text-lg sm:text-xl max-w-2xl mx-auto text-white/90 leading-relaxed">
                    Tingkatkan pengetahuan dan keterampilan melalui workshop dan pelatihan dari jaringan gereja kami
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-white transform skew-y-2 -mb-8 origin-bottom"></div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Region Filter -->
            <div class="mb-12">
                <div class="flex flex-wrap gap-2 justify-center mb-4">
                    <a href="?region=Kalimantan-Sumatra" 
                       class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300
                       {{ $activeRegion == 'Kalimantan-Sumatra' ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-gray-700 shadow-sm hover:shadow-md' }}">
                        Sumatra & Kalimantan
                    </a>
                    <a href="?region=Jawa" 
                       class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300
                       {{ $activeRegion == 'Jawa' ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-gray-700 shadow-sm hover:shadow-md' }}">
                        Jawa
                    </a>
                    <a href="?region=Sulawesi-Papua" 
                       class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300
                       {{ $activeRegion == 'Sulawesi-Papua' ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-gray-700 shadow-sm hover:shadow-md' }}">
                        Sulawesi & Papua
                    </a>
                </div>
            </div>

            <!-- Workshop List -->
            <div class="relative">
                @if(count($workshops) > 0)
                    <!-- Desktop Layout with Timeline -->
                    <div class="hidden lg:block">
                        <!-- Vertical Timeline Line -->
                        <div class="absolute left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-500 via-blue-300 to-blue-500 transform -translate-x-1/2 z-0"></div>
                        
                        @foreach($workshops as $index => $workshop)
                        <div class="relative mb-12 {{ $index % 2 == 0 ? 'pr-[55%]' : 'pl-[55%]' }} group">
                            <!-- Timeline Dot -->
                            <div class="absolute top-6 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-blue-600 border-4 border-white z-10"></div>

                            <!-- Workshop Card -->
                            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden relative">
                                <!-- Status Label - Fixed for each card -->
                                <div class="absolute top-4 right-4 px-3 py-1 rounded-lg text-xs font-semibold z-10
                                    {{ $workshop->label == 'pendaftaran dibuka' ? 'bg-green-500 text-white' : '' }}
                                    {{ $workshop->label == 'akan datang' ? 'bg-yellow-500 text-white' : '' }}
                                    {{ $workshop->label == 'selesai' ? 'bg-gray-500 text-white' : '' }}">
                                    {{ $workshop->label }}
                                </div>
                                
                                <div class="p-6">
                                    <!-- Header -->
                                    <div class="mb-4">
                                        <h2 class="text-xl font-bold text-gray-800 leading-tight">{{ $workshop->topic }}</h2>
                                        <div class="flex items-center mt-2 text-blue-600">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-sm font-medium">
                                                {{ \Carbon\Carbon::parse($workshop->start_date)->translatedFormat('d F Y') }}
                                                @if($workshop->start_date != $workshop->end_date)
                                                    - {{ \Carbon\Carbon::parse($workshop->end_date)->translatedFormat('d F Y') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Speaker Info with Photo -->
                                    <div class="flex items-center mb-4">
                                        @if($workshop->speaker_photo)
                                            <img src="{{ asset('storage/'.$workshop->speaker_photo) }}" alt="Foto Pembicara" 
                                                 class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm mr-4">
                                        @endif
                                        <div>
                                            <p class="font-medium text-gray-700">{{ $workshop->speaker }}</p>
                                            <p class="text-sm text-gray-500">{{ $workshop->church->name }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Details Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 text-sm mb-4">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <div>
                                                <p class="font-medium text-gray-700">Lokasi</p>
                                                <p>{{ $workshop->location }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div>
                                                <p class="font-medium text-gray-700">Waktu</p>
                                                <p>{{ \Carbon\Carbon::parse($workshop->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($workshop->end_time)->format('H:i') }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                            <div>
                                                <p class="font-medium text-gray-700">Kuota</p>
                                                <p>{{ $workshop->participant_count }}/{{ $workshop->max_participants }} peserta</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- YouTube and Material Links -->
                                    <div class="mt-6 pt-4 border-t border-gray-200 flex flex-wrap gap-3">
                                        @if($workshop->youtube_link)
                                            <a href="{{ $workshop->youtube_link }}" target="_blank" 
                                               class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium text-sm flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                                </svg>
                                                Video
                                            </a>
                                        @endif
                                        
                                        @if($workshop->material_file)
                                            <a href="{{ asset('storage/'.$workshop->material_file) }}" target="_blank" 
                                               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                                Materi PDF
                                            </a>
                                        @endif
                                        
                                        @if ($workshop->label === 'pendaftaran dibuka')
                                        <a href="{{ route('public.daftar', $workshop->id) }}"
                                        class="ml-auto px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition-all duration-300 flex items-center gap-1">
                                            Daftar
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Mobile Layout -->
                    <div class="lg:hidden space-y-6">
                        @foreach($workshops as $workshop)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden relative">
                            <!-- Status Label - Fixed for each card -->
                            <div class="absolute top-4 right-4 px-3 py-1 rounded-lg text-xs font-semibold z-10
                                {{ $workshop->label == 'pendaftaran dibuka' ? 'bg-green-500 text-white' : '' }}
                                {{ $workshop->label == 'akan datang' ? 'bg-yellow-500 text-white' : '' }}
                                {{ $workshop->label == 'selesai' ? 'bg-gray-500 text-white' : '' }}">
                                {{ $workshop->label }}
                            </div>
                            
                            <div class="p-6">
                                <!-- Header -->
                                <div class="mb-4">
                                    <h2 class="text-xl font-bold text-gray-800 leading-tight">{{ $workshop->topic }}</h2>
                                    <div class="flex items-center mt-2 text-blue-600">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-sm font-medium">
                                            {{ \Carbon\Carbon::parse($workshop->start_date)->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Speaker Info with Photo -->
                                <div class="flex items-center mb-4">
                                    @if($workshop->speaker_photo)
                                        <img src="{{ asset('storage/'.$workshop->speaker_photo) }}" alt="Foto Pembicara" 
                                             class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm mr-3">
                                    @endif
                                    <div>
                                        <p class="font-medium text-gray-700">{{ $workshop->speaker }}</p>
                                        <p class="text-xs text-gray-500">{{ $workshop->church->name }}</p>
                                    </div>
                                </div>
                                
                                <!-- Location and Time -->
                                <div class="grid grid-cols-2 gap-4 text-gray-600 text-sm mb-4">
                                    <div class="flex items-start">
                                        <svg class="w-4 h-4 text-blue-500 mr-1 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-xs text-gray-500">Lokasi</p>
                                            <p class="text-sm">{{ Str::limit($workshop->location, 20) }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-4 h-4 text-blue-500 mr-1 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-xs text-gray-500">Waktu</p>
                                            <p class="text-sm">{{ \Carbon\Carbon::parse($workshop->start_time)->format('H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="flex flex-wrap gap-2">
                                    @if($workshop->youtube_link)
                                        <a href="{{ $workshop->youtube_link }}" target="_blank" 
                                           class="flex-1 px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs flex items-center justify-center gap-1">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                            </svg>
                                            Video
                                        </a>
                                    @endif
                                    
                                    @if($workshop->material_file)
                                        <a href="{{ asset('storage/'.$workshop->material_file) }}" target="_blank" 
                                           class="flex-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs flex items-center justify-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                            Materi
                                        </a>
                                    @endif
                                    
                                    <a href="{{ route('workshops.show', $workshop->id) }}" 
                                       class="flex-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs flex items-center justify-center gap-1">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-12 bg-white rounded-xl shadow-sm">
                        <div class="mx-auto max-w-md">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada workshop tersedia</h3>
                            <p class="mt-2 text-gray-500">Kami sedang mempersiapkan workshop terbaru. Silakan cek kembali nanti.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection