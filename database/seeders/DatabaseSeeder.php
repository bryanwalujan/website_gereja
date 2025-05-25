<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Church;
use App\Models\Workshop;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create a Church
        $church = Church::create([
            'name' => 'Gereja Test',
            'region' => 'Jawa',
        ]);

        // Create a Workshop
        Workshop::create([
            'church_id' => $church->id,
            'region' => 'jawa',
            'location' => 'Jakarta',
            'speaker' => 'John Doe',
            'topic' => 'Workshop Test',
            'speaker_photo' => 'photos/speaker.jpg',
            'youtube_link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'material_file' => 'materials/sample.pdf',
            'participant_count' => 10,
            'max_participants' => 50,
            'start_date' => '2025-06-01',
            'end_date' => '2025-06-05',
            'start_time' => '08:00:00',
            'end_time' => '16:00:00',
        ]);
    }
}