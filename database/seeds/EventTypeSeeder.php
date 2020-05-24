<?php

use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventType::create([
            'name'       => 'Giặt đồ',
            'color'      => '#007bff',
            'created_by' => 1,
        ]);

        EventType::create([
            'name'       => 'Đổi nước',
            'color'      => '#28a745',
            'created_by' => 1,
        ]);

        EventType::create([
            'name'       => 'Ăn nhậu',
            'color'      => '#dc3545',
            'created_by' => 1,
        ]);
    }
}
