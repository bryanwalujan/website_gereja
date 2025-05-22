<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Publik</title>
</head>
<body>
    <h1>Dashboard Publik</h1>

    <h2>Daftar Gereja</h2>
    <ul>
        @foreach ($churches as $church)
            <li>
                <a href="{{ route('public.church.show', $church->id) }}">
                    {{ $church->name }} ({{ $church->region }}) - Jemaat: {{ $church->congregation_count }} - Pendeta: {{ $church->pastor_name }}
                </a>
            </li>
        @endforeach
    </ul>

    <h2>Daftar Workshop</h2>
    <ul>
        @foreach ($workshops as $workshop)
            <li>
                {{ $workshop->church->name }} ({{ $workshop->region }}) - 
                Lokasi: {{ $workshop->location }} - 
                Tanggal: {{ $workshop->date }} - 
                Pembicara: {{ $workshop->speaker }} - 
                Topik: {{ $workshop->topic }}
                @if ($workshop->speaker_photo)
                    <br>Foto Pembicara: <img src="{{ asset('storage/' . $workshop->speaker_photo) }}" alt="Foto Pembicara" width="100">
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>