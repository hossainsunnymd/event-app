<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Event 1',
            'description' => 'Description 1',
            'start_time' => now(),
            'end_time' => now()->addHours(5),
        ]);

        Event::create([
            'title' => 'Event 2',
            'description' => 'Description 2',
            'start_time' => now(),
            'end_time' => now()->addHours(7),
        ]);

        Event::create([
            'title' => 'Event 3',
            'description' => 'Description 3',
            'start_time' => now(),
            'end_time' => now()->addHours(8),
        ]);
    }
}
