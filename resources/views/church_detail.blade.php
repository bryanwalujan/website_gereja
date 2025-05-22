<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Gereja - {{ $church->name }}</title>
</head>
<body>
    <h1>Detail Gereja: {{ $church->name }}</h1>

    <p><strong>Nama Gereja:</strong> {{ $church->name }}</p>
    <p><strong>Regional:</strong> {{ $church->region }}</p>
    <p><strong>Tentang Kami:</strong> {{ $church->about_us }}</p>
    <p><strong>Visi:</strong> {{ $church->vision }}</p>
    <p><strong>Misi:</strong> {{ $church->mission }}</p>
    <p><strong>Alamat:</strong> {{ $church->address }}</p>
    <p><strong>Google Maps:</strong> {{ $church->maps }}</p>
    <p><strong>No. Telepon:</strong> {{ $church->phone }}</p>
    <p><strong>Email:</strong> {{ $church->email }}</p>
    <p><strong>Jadwal Ibadah:</strong> {{ $church->worship_schedule }}</p>
    <p><strong>Target Murid/Tahun:</strong> {{ $church->student_target }}</p>
    <p><strong>Jumlah Jemaat:</strong> {{ $church->congregation_count }}</p>
    <p><strong>Doa Pokok:</strong> {{ $church->prayer_points }}</p>
    <p><strong>Tahun Berdiri:</strong> {{ $church->established_year }}</p>
    @if ($church->church_image)
        <p><strong>Gambar Gereja:</strong> <img src="{{ asset('storage/' . $church->church_image) }}" alt="Gambar Gereja" width="200"></p>
    @endif
    @if ($church->pastor_image)
        <p><strong>Gambar Gembala:</strong> <img src="{{ asset('storage/' . $church->pastor_image) }}" alt="Gambar Gembala" width="200"></p>
    @endif

    <a href="{{ route('public.dashboard') }}">Kembali ke Dashboard</a>
</body>
</html>