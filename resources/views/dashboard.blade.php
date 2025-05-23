<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Publik</title>
    <style>
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Dashboard Publik</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

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
                Tanggal: {{ $workshop->start_date }} s/d {{ $workshop->end_date }} - 
                Jam: {{ $workshop->start_time }} s/d {{ $workshop->end_time }} - 
                Pembicara: {{ $workshop->speaker }} - 
                Topik: {{ $workshop->topic }} - 
                Peserta: {{ $workshop->participant_count }} / {{ $workshop->max_participants }}
                @if ($workshop->speaker_photo)
                    <br>Foto Pembicara: <img src="{{ asset('storage/' . $workshop->speaker_photo) }}" alt="Foto Pembicara" width="100">
                @endif
                @if ($workshop->youtube_link)
                    <br><a href="{{ $workshop->youtube_link }}" target="_blank">Link YouTube</a>
                @endif
                @if ($workshop->material_file)
                    <br><a href="{{ route('public.workshop.download', $workshop->id) }}">Unduh Materi</a>
                @endif

                @if ($workshop->start_date >= now()->toDateString())
                    <h4>Daftar Workshop</h4>
                    <form action="{{ route('public.workshop.register', $workshop->id) }}" method="POST">
                        @csrf
                        <label for="name-{{ $workshop->id }}">Nama:</label>
                        <input type="text" id="name-{{ $workshop->id }}" name="name" required>
                        <br>
                        <label for="email-{{ $workshop->id }}">Email:</label>
                        <input type="email" id="email-{{ $workshop->id }}" name="email" required>
                        <br>
                        <label for="phone-{{ $workshop->id }}">No. Telepon:</label>
                        <input type="text" id="phone-{{ $workshop->id }}" name="phone">
                        <br>
                        <button type="submit">Daftar</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>