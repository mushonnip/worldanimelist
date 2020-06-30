<?php

use Illuminate\Database\Seeder;
use App\Anime;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anime::create(
            [
                'title' => 'Yesterday wo Utatte',
                'image' => 'public/ywo.jpeg',
                'episodes' => 12,
                'status' => 'Finished Airing',
                'aired' => '2020-04-05',
                'producers' => ' TV Asahi, Sotsu, Delfi Sound, Lucent Pictures Entertainment, CyberAgent, AbemaTV, DMM.futureworks',
                'studios' => 'Doga Kobo',
                'duration' => 23,
            ]
        );
    }
}
