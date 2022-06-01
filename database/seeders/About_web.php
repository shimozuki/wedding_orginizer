<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class About_web extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $about  = new About;
                $about->id = 1;
                $about->about  = 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.';
                $about->facebook = 'bi.raja.13';
                $about->instagram = 'r.obbiul.013';
                $about->whatsapp = '087861540874';
                $about->email = 'robbishimozuki@home.com';
                $about->tiktok = '@mieayamthebstt';
                $about->image = '20220530150645.png';
        $about->save();
    }
}
