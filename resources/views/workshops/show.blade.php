@extends('layouts.app')
@section('title', $workshop->topic . ' - Detail Workshop')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-12 bg-gradient-to-r from-blue-800 to-indigo-900 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $workshop->topic }}</h1>
            <div class="w-16 h-1 bg-yellow-400 mx-auto mb-4 rounded-full"></div>
            <p class="text-lg max-w-2xl mx-auto">
                Diselenggarakan oleh {{ $workshop->church->name }} ({{ $workshop->region }})
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <!-- Status Banner -->
            <div class="mb-8 p-4 rounded-lg 
                @if($workshop->label === 'pendaftaran dibuka') bg-green-100 text-green-800
                @elseif($workshop->label === 'akan datang') bg-yellow-100 text-yellow-800
                @else bg-gray-100 text-gray-800 @endif">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">Status: {{ ucfirst($workshop->label) }}</span>
                    </div>
                    <span class="text-sm">
                        {{ $workshop->participant_count }} / {{ $workshop->max_participants }} Peserta
                    </span>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Workshop Details Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column - Workshop Info -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">Informasi Workshop</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Gereja Penyelenggara</p>
                                    <p class="font-medium">{{ $workshop->church->name }}</p>
                                    <p class="text-gray-600">{{ $workshop->region }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Lokasi</p>
                                    <p class="font-medium">{{ $workshop->location }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Waktu Pelaksanaan</p>
                                    <p class="font-medium">
                                        {{ \Carbon\Carbon::parse($workshop->start_date)->translatedFormat('l, d F Y') }}
                                        @if($workshop->start_date != $workshop->end_date)
                                            - {{ \Carbon\Carbon::parse($workshop->end_date)->translatedFormat('d F Y') }}
                                        @endif
                                    </p>
                                    <p class="text-gray-600">
                                        {{ \Carbon\Carbon::parse($workshop->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($workshop->end_time)->format('H:i') }} WIB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Speaker Info -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">Pembicara</h3>
                            
                            <div class="flex items-start">
                                @if($workshop->speaker_photo)
                                    <img src="{{ asset('storage/' . $workshop->speaker_photo) }}" 
                                         alt="Foto {{ $workshop->speaker }}" 
                                         class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm mr-4">
                                @endif
                                <div>
                                    <p class="font-medium text-lg">{{ $workshop->speaker }}</p>
                                    <p class="text-gray-600 mb-3">Pembicara Workshop</p>
                                    
                                    <!-- Resources -->
                                    <div class="space-y-2">
                                        @if($workshop->youtube_link)
                                            <a href="{{ $workshop->youtube_link }}" target="_blank" 
                                               class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                                </svg>
                                                <span>Tonton di YouTube</span>
                                            </a>
                                        @endif
                                        
                                        @if($workshop->material_file)
                                            <a href="{{ route('public.workshop.download', $workshop->id) }}" 
                                               class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                                <span>Unduh Materi Workshop</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('workshops.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Workshop
                </a>
            </div>
        </div>
    </section>
@endsection