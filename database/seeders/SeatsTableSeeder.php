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
        $this->createSeats(1, 'A', 20);
        $this->createSeats(1, 'B', 20);
        $this->createSeats(2, 'A', 20);
        $this->createSeats(2, 'B', 20);
    }

    private function createSeats($branchId, $hallName, $numberOfSeats)
    {
        for ($i = 1; $i <= $numberOfSeats; $i++) {
            $seatName = $branchId . $hallName . $i;
            DB::table('seats')->insert([
                'branch_id' => $branchId,
                'hall_name' => $hallName,
                'seat_name' => $seatName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
