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
            <!-- Workshop Status Banner -->
            <div class="mb-8 p-4 rounded-lg 
                @if($workshop->label === 'pendaftaran dibuka') bg-green-100 text-green-800
                @elseif($workshop->label === 'akan datang') bg-yellow-100 text-yellow-800
                @else bg-gray-100 text-gray-800 @endif">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Status: {{ ucfirst($workshop->label) }}</span>
                </div>
            </div>

            <!-- Workshop Details Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div>
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Acara</h3>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Tanggal</p>
                                            <p class="font-medium">
                                                {{ \Carbon\Carbon::parse($workshop->start_date)->translatedFormat('l, d F Y') }}
                                                @if($workshop->start_date != $workshop->end_date)
                                                    - {{ \Carbon\Carbon::parse($workshop->end_date)->translatedFormat('d F Y') }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Waktu</p>
                                            <p class="font-medium">
                                                {{ \Carbon\Carbon::parse($workshop->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($workshop->end_time)->format('H:i') }} WIB
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Lokasi</p>
                                            <p class="font-medium">{{ $workshop->location }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Kuota Peserta</p>
                                            <p class="font-medium">{{ $workshop->participant_count }} / {{ $workshop->max_participants }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div>
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Pembicara</h3>
                                <div class="flex items-start">
                                    @if($workshop->speaker_photo)
                                        <img src="{{ asset('storage/' . $workshop->speaker_photo) }}" 
                                             alt="Foto {{ $workshop->speaker }}" 
                                             class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm mr-4">
                                    @endif
                                    <div>
                                        <p class="font-medium text-lg">{{ $workshop->speaker }}</p>
                                        <p class="text-gray-600">Pembicara Workshop</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Resources Section -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Materi & Video</h3>
                                <div class="space-y-3">
                                    @if($workshop->youtube_link)
                                        <a href="{{ $workshop->youtube_link }}" target="_blank" 
                                           class="flex items-center px-4 py-2 bg-red-50 hover:bg-red-100 rounded-lg transition-colors">
                                            <svg class="w-6 h-6 text-red-600 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                            </svg>
                                            <span>Tonton di YouTube</span>
                                        </a>
                                    @endif
                                    @if($workshop->material_file)
                                        <a href="{{ route('public.workshop.download', $workshop->id) }}" 
                                           class="flex items-center px-4 py-2 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                                            <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            <!-- Flash Messages -->
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

            <!-- Registration Form -->
            @if ($workshop->label === 'pendaftaran dibuka')
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 md:p-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Formulir Pendaftaran</h3>
                        <form action="{{ route('public.daftar.store', $workshop->id) }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" id="name" name="name" required 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                                       value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                <input type="email" id="email" name="email" required 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone" required 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('phone') border-red-500 @enderror"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="pt-2">
                                <button type="submit" 
                                        class="w-full md:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                    Daftar Sekarang
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 md:p-8 text-center">
                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Pendaftaran Tidak Tersedia</h3>
                        <p class="text-gray-600">Workshop ini saat ini <span class="font-medium">{{ $workshop->label }}</span>.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection