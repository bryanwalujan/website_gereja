@extends('layouts.app')
@section('title', 'Detail Gereja - ' . $church->name)

@section('content')
    <!-- Hero Section with Elegant Header -->
    <section class="relative py-28 bg-blue-900 text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-800 to-blue-950"></div>
        <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTE3LjMxNiAxNi4yNjVMMjAuNTc2IDE5LjUyNUwxOS4xNjEgMjAuOTM5TDE1LjkwMSAxNy42OTlMMTIuNjQxIDIwLjkzOUwxMS4yMjYgMTkuNTI1TDE0LjQ4NiAxNi4yNjVMMTEuMjI2IDEzTDEyLjY0MSAxMS41ODZMMTUuOTAxIDE0LjgzMUwxOS4xNjEgMTEuNTg2TDIwLjU3NiAxM0wxNy4zMTYgMTYuMjY1WiIgZmlsbD0id2hpdGUiIG9wYWNpdHk9IjAuMDYiLz48L3N2Zz4=')]"></div>
        <div class="container mx-auto px-4 z-10 relative">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">{{ $church->name }}</h1>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mb-6"></div>
                <p class="text-xl opacity-90">{{ $church->region }}</p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-12 bg-white transform skew-y-2 -mb-7 z-0"></div>
    </section>

    <!-- Main Content Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-10">
                <!-- Left Column (Main Content) -->
                <div class="lg:w-2/3">
                    <!-- Church Image with Elegant Frame -->
                    <div class="relative rounded-xl overflow-hidden shadow-lg mb-10 border-8 border-white bg-white">
                        <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                            <img src="{{ $church->church_image ? asset('storage/' . $church->church_image) : 'https://gms.id/images/church/gms_gmssby_surabaya_cempaka.jpg?2676' }}" 
                                 alt="{{ $church->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute inset-0 border-8 border-white opacity-20 pointer-events-none"></div>
                    </div>

                    <!-- Church Description -->
                    <div class="bg-white p-10 rounded-xl shadow-sm mb-10">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-1 bg-blue-700 mr-4"></div>
                            <h2 class="text-2xl font-bold text-gray-800">Tentang Gereja Kami</h2>
                        </div>
                        
                        <div class="prose max-w-none text-gray-700">
                            <p class="mb-6 text-lg leading-relaxed">
                                Gereja {{ $church->name }} telah menjadi bagian dari pelayanan di {{ $church->region }} sejak tahun {{ $church->established_year ?? '2000' }}. 
                                Dibawah bimbingan {{ $church->pastor_name }}, kami berkomitmen untuk menjadi berkat bagi masyarakat sekitar melalui pengajaran firman Tuhan yang alkitabiah.
                                {{ $church->about_us ?? '' }}
                            </p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-8">
                                <div class="bg-blue-50 p-6 rounded-lg border-l-4 border-blue-700">
                                    <h3 class="font-bold text-blue-800 mb-3 text-lg">Visi Kami</h3>
                                    <p class="text-gray-700">{{ $church->vision ?? 'Menjadi gereja yang menjadi berkat bagi kota dan bangsa melalui pengajaran firman Tuhan yang alkitabiah dan pelayanan yang relevan.' }}</p>
                                </div>
                                <div class="bg-blue-50 p-6 rounded-lg border-l-4 border-blue-700">
                                    <h3 class="font-bold text-blue-800 mb-3 text-lg">Misi Kami</h3>
                                    <div class="text-gray-700">
                                        {!! $church->mission ?? '<ol class="list-decimal pl-5 space-y-2">
                                            <li>Memuridkan jemaat dalam pengenalan akan Kristus</li>
                                            <li>Melayani masyarakat dengan kasih Tuhan</li>
                                            <li>Menjadi saksi Kristus di dunia</li>
                                        </ol>' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service Schedule -->
                    <div class="bg-white p-10 rounded-xl shadow-sm">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-1 bg-blue-700 mr-4"></div>
                            <h2 class="text-2xl font-bold text-gray-800">Jadwal Ibadah</h2>
                        </div>
                        
                        <div class="prose text-gray-700 max-w-none">
                            {!! $church->worship_schedule ?? '<p>Tidak ada jadwal ibadah yang tersedia saat ini.</p>' !!}
                        </div>
                    </div>
                </div>

                <!-- Right Column (Sidebar) -->
                <div class="lg:w-1/3">
                    <div class="bg-white p-8 rounded-xl shadow-md sticky top-8 border border-gray-100">
                        <div class="flex items-center mb-6 pb-6 border-b border-gray-200">
                            <div class="w-10 h-1 bg-blue-700 mr-3"></div>
                            <h3 class="text-xl font-bold text-gray-800">Informasi Gereja</h3>
                        </div>
                        
                        <!-- Pastor Photo Section -->
                        <div class="mb-6">
                            <div class="relative rounded-full overflow-hidden w-32 h-32 mx-auto border-4 border-white shadow-lg mb-4">
                                <img src="{{ $church->pastor_image ? asset('storage/' . $church->pastor_image) : 'https://gkicoyudan.org/images/pdt-tpg/_2danielkg.png' }}" 
                                     alt="Gembala {{ $church->pastor_name }}" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h4 class="font-medium text-gray-500 text-sm mb-1 uppercase tracking-wider">Gembala</h4>
                                <p class="text-gray-800 text-lg font-semibold">{{ $church->pastor_name }}</p>
                            </div>
                        </div>
                        
                        <div class="space-y-6">
                            <div>
                                <h4 class="font-medium text-gray-500 text-sm mb-2 uppercase tracking-wider">Alamat</h4>
                                <p class="text-gray-800">{{ $church->address ?? 'Jl. Kebaktian No. 123' }}</p>
                                @if($church->maps)
                                    <a href="{{ $church->maps }}" target="_blank" class="inline-block mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Lihat di Peta →</a>
                                @endif
                            </div>
                            
                            <div>
                                <h4 class="font-medium text-gray-500 text-sm mb-2 uppercase tracking-wider">Kontak</h4>
                                <p class="text-gray-800">{{ $church->phone }}</p>
                                @if($church->email)
                                    <p class="text-gray-800 mt-1">{{ $church->email }}</p>
                                @endif
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-500 text-sm mb-2 uppercase tracking-wider">Tahun Berdiri</h4>
                                    <p class="text-gray-800">{{ $church->established_year ?? '2000' }}</p>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-500 text-sm mb-2 uppercase tracking-wider">Jumlah Jemaat</h4>
                                    <p class="text-gray-800">{{ $church->congregation_count ?? '150' }} orang</p>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="font-medium text-gray-500 text-sm mb-2 uppercase tracking-wider">Target Murid</h4>
                                <p class="text-gray-800">{{ $church->student_target ?? '200' }} orang</p>
                            </div>
                            
                            <div class="pt-6 border-t border-gray-200">
                                <button onclick="openPrayerModal()" class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg transition duration-300 flex items-center justify-center group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Pokok Doa Gereja
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Dashboard Link -->
            <div class="mt-10 text-center">
                <a href="{{ route('public.church.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Kembali ke Daftar Gereja
                </a>
            </div>
        </div>
    </section>

    <!-- Prayer Modal -->
    <div id="prayerModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden transition-opacity duration-300 opacity-0">
        <div class="bg-white rounded-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto shadow-2xl transform transition-all duration-300 scale-95">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6 pb-6 border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800">Pokok Doa Gereja {{ $church->name }}</h3>
                    <button onclick="closePrayerModal()" class="text-gray-500 hover:text-gray-700 p-1 rounded-full hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="prose text-gray-700 max-w-none">
                    {!! $church->prayer_points ?? '<div class="space-y-6">
                        <div class="p-6 bg-blue-50 rounded-lg">
                            <h4 class="font-bold text-blue-800 mb-3">Pertumbuhan Rohani</h4>
                            <p>Berdoa agar setiap jemaat semakin bertumbuh dalam pengenalan akan Kristus dan hidup dalam kekudusan.</p>
                        </div>
                        <div class="p-6 bg-blue-50 rounded-lg">
                            <h4 class="font-bold text-blue-800 mb-3">Pelayanan</h4>
                            <p>Berdoa untuk setiap pelayanan gereja agar semakin berdampak dan relevan bagi masyarakat sekitar.</p>
                        </div>
                        <div class="p-6 bg-blue-50 rounded-lg">
                            <h4 class="font-bold text-blue-800 mb-3">Pembangunan</h4>
                            <p>Berdoa untuk proses pembangunan gedung gereja yang baru agar berjalan lancar dan menjadi berkat.</p>
                        </div>
                    </div>' !!}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <button onclick="closePrayerModal()" class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg transition duration-300">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openPrayerModal() {
            const modal = document.getElementById('prayerModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.querySelector('div').classList.remove('scale-95');
            }, 10);
        }

        function closePrayerModal() {
            const modal = document.getElementById('prayerModal');
            modal.classList.add('opacity-0');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal when clicking outside
        document.getElementById('prayerModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePrayerModal();
            }
        });
    </script>
@endsection