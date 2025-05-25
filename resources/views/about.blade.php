@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gray-900 text-white overflow-hidden">
       <div class="absolute inset-0 bg-[url('https://media.istockphoto.com/id/1212353201/id/video/tangan-kerumunan-orang-pada-pertemuan-kristen-selama-pujian-pemuliaan-allah-dengan-latar.jpg?s=640x640&k=20&c=PNa-wxx83fLR_Qa0cFZhJzkzOaWC33SANj5AFvfNGEk=')] bg-cover bg-center opacity-60 z-0 transform hover:scale-105 transition duration-1000"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 to-indigo-900/70 z-0"></div>
        <div class="relative z-10 container mx-auto px-4 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-3xl sm:text-4xl font-bold mb-4 leading-tight">Tentang Kingdom Expansion</h1>
                <div class="w-16 h-1 bg-[#FFCC33] mx-auto mb-6"></div>
                <p class="text-base sm:text-lg max-w-2xl mx-auto text-white/90 font-light leading-relaxed">
                    Membangun gereja-gereja yang berdampak dan menjangkau seluruh Indonesia dengan kasih dan kebenaran Firman Tuhan.
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-white to-transparent z-10"></div>
    </section>

    <!-- Sejarah & Tujuan Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-3">Sejarah & Tujuan</h2>
                <div class="w-16 h-0.5 bg-indigo-600 mx-auto mb-4"></div>
                <p class="text-gray-500 text-sm sm:text-base max-w-2xl mx-auto">
                    Perjalanan kami dalam membangun gereja-gereja yang sehat di seluruh Indonesia
                </p>
            </div>
            
            <div class="relative">
                <!-- Timeline line -->
                <div class="hidden md:block absolute left-1/2 h-full w-0.5 bg-indigo-100 transform -translate-x-1/2"></div>
                
                <!-- Timeline items -->
                <div class="space-y-12 sm:space-y-8">
                    <!-- Item 1 -->
                    <div class="relative flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-8 mb-6 md:mb-0 md:text-right order-1">
                            <div class="bg-white p-6 rounded-lg shadow-sm border-l-2 border-indigo-600 md:border-l-0 md:border-r-2">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Tahun 2000</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Gereja Pusat didirikan dengan visi menyatukan gereja-gereja lokal dalam misi yang sama.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:flex w-10 h-10 rounded-full bg-indigo-600 border-2 border-white absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 top-1/2 items-center justify-center order-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="md:w-1/2 order-3"></div>
                    </div>
                    
                    <!-- Item 2 -->
                    <div class="relative flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 order-3"></div>
                        <div class="hidden md:flex w-10 h-10 rounded-full bg-indigo-600 border-2 border-white absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 top-1/2 items-center justify-center order-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div class="md:w-1/2 md:pl-8 order-1 md:order-3">
                            <div class="bg-white p-6 rounded-lg shadow-sm border-l-2 border-indigo-600">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Ekspansi Nasional</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Gereja Tuhan Indonesia berkembang menjadi jaringan yang luas, menjangkau dari Sabang hingga Merauke.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Item 3 -->
                    <div class="relative flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-8 mb-6 md:mb-0 md:text-right order-1">
                            <div class="bg-white p-6 rounded-lg shadow-sm border-l-2 border-indigo-600 md:border-l-0 md:border-r-2">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Kini</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Tetap menghargai kemandirian setiap gereja lokal sambil bekerja sama dalam pengajaran, pelatihan, dan pelayanan.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:flex w-10 h-10 rounded-full bg-indigo-600 border-2 border-white absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 top-1/2 items-center justify-center order-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div class="md:w-1/2 order-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-3">Visi & Misi Kami</h2>
                <div class="w-16 h-0.5 bg-indigo-600 mx-auto mb-4"></div>
                <p class="text-gray-500 text-sm sm:text-base max-w-2xl mx-auto">
                    Fondasi yang memandu setiap langkah pelayanan kami
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Visi Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-indigo-700 p-4 text-white">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-2 rounded mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold">Visi Kami</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                            Menjadi gereja yang sehat, alkitabiah, dan berdampak secara sosial, rohani, serta kultural di seluruh wilayah Indonesia, menjadi terang dan garam di masyarakat.
                        </p>
                    </div>
                </div>
                
                <!-- Misi Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-blue-700 p-4 text-white">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-2 rounded mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold">Misi Kami</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 text-gray-700 text-sm sm:text-base">
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-700 rounded-full p-1 mr-2 mt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>Menyediakan pengajaran Alkitab yang kuat dan relevan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-700 rounded-full p-1 mr-2 mt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>Melatih pemimpin gereja yang kompeten dan berintegritas</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-700 rounded-full p-1 mr-2 mt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>Memberdayakan gereja untuk menjangkau masyarakat</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-700 rounded-full p-1 mr-2 mt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>Menjalin kerja sama antar gereja untuk pertumbuhan bersama</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mentor Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-3">Tim Mentor Nasional</h2>
                <div class="w-16 h-0.5 bg-indigo-600 mx-auto mb-4"></div>
                <p class="text-gray-500 text-sm sm:text-base max-w-2xl mx-auto">
                    Para pemimpin berpengalaman yang mendukung pertumbuhan gereja-gereja lokal
                </p>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach([
                    ['name' => 'Pdt. John Doe', 'region' => 'Sumatera & Kalimantan', 'img' => asset('images/mentor-1.jpg'), 'desc' => '15 tahun melayani pembangunan gereja di wilayah Sumatera dan Kalimantan.', 'fallback_img' => 'https://randomuser.me/api/portraits/men/32.jpg'],
                    ['name' => 'Pdt. Jane Smith', 'region' => 'Regional Jawa', 'img' => asset('images/mentor-2.jpg'), 'desc' => 'Ahli pengembangan pemimpin muda dan pelayanan keluarga.', 'fallback_img' => 'https://randomuser.me/api/portraits/women/44.jpg'],
                    ['name' => 'Pdt. Michael Johnson', 'region' => 'Sulawesi & Papua', 'img' => asset('images/mentor-3.jpg'), 'desc' => 'Dedikasi dalam penginjilan dan pembangunan gereja di wilayah Timur Indonesia.', 'fallback_img' => 'https://randomuser.me/api/portraits/men/75.jpg'],
                ] as $mentor)
                    <div class="bg-white rounded-lg shadow-sm p-4 flex flex-col items-center text-center">
                        <div class="w-20 h-20 rounded-full overflow-hidden border border-blue-700 mb-3">
                            <img src="{{ $mentor['img'] }}" alt="{{ $mentor['name'] }}" class="w-full h-full object-cover" onerror="this.src='{{ $mentor['fallback_img'] }}'">
                        </div>
                        <h4 class="text-base font-semibold text-gray-900 mb-1">{{ $mentor['name'] }}</h4>
                        <p class="text-blue-700 font-medium mb-2 text-sm">{{ $mentor['region'] }}</p>
                        <p class="text-gray-600 text-xs leading-snug">{{ $mentor['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection