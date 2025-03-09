<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_id' => 1,
            'event_id' => 1,
            'ticket_qty'=>2,
            'ticket_price'=>1000
        ]);

        Booking::create([
            'user_id' => 2,
            'event_id' => 2,
            'ticket_qty'=>3,
            'ticket_price'=>1500
        ]);

        Booking::create([
            'user_id' => 3,
            'event_id' => 3,
            'ticket_qty'=>4,
            'ticket_price'=>2000
        ]);
    }
}
