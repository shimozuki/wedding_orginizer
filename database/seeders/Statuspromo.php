<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status_promo;

class Statuspromo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status_promo::truncate();
        $status = [
            [
                'id' => 1,
                'keterangan' => 'Aktif',
                'warna' => 'dark'
            ],
            [
                'id' => 2,
                'keterangan' => 'berakhir',
                'warna' => 'success'
            ],
        ];

        Status_promo::insert($status);
    }
}
