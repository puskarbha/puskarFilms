<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createSeats( '1', 20);
        $this->createSeats( '2', 20);
        $this->createSeats( '3', 20);
        $this->createSeats( '4', 20);
    }

   public function createSeats( $hallID, $numberOfSeats)
    {
        for ($i = 1; $i <= $numberOfSeats; $i++) {
            $seatName = $hallID . $i;
            DB::table('seats')->insert([
                'hall_id' => $hallID,
                'seat_name' => $seatName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
