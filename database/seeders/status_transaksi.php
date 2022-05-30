<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;


class status_transaksi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();
        $status = [
            [
                'id' => 1,
                'keterangan' => 'Baru',
                'warna' => 'dark'
            ],
            [
                'id' => 2,
                'keterangan' => 'Diterima',
                'warna' => 'success'
            ],
            [
                'id' => 3,
                'keterangan' => 'Ditolak',
                'warna' => 'danger',
            ],
            [
                'id' => 4,
                'keterangan' => 'Selsai',
                'warna' => 'primary'
            ],
        ];

        Status::insert($status);
    }
}
