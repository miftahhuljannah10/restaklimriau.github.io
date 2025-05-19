<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kabupaten;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kabupatenList = [
            ['id' => 1, 'nama_kabupaten' => 'Bengkalis'],
            ['id' => 2, 'nama_kabupaten' => 'Indragiri Hilir'],
            ['id' => 3, 'nama_kabupaten' => 'Indragiri Hulu'],
            ['id' => 4, 'nama_kabupaten' => 'Kampar'],
            ['id' => 5, 'nama_kabupaten' => 'Kepulauan Meranti'],
            ['id' => 6, 'nama_kabupaten' => 'Kuantan Singingi'],
            ['id' => 7, 'nama_kabupaten' => 'Pelalawan'],
            ['id' => 8, 'nama_kabupaten' => 'Rokan Hilir'],
            ['id' => 9, 'nama_kabupaten' => 'Rokan Hulu'],
            ['id' => 10, 'nama_kabupaten' => 'Siak'],
            ['id' => 11, 'nama_kabupaten' => 'Kota Dumai'],
            ['id' => 12, 'nama_kabupaten' => 'Kota Pekanbaru'],
        ];

        foreach ($kabupatenList as $kabupaten) {
            Kabupaten::create($kabupaten);
        }

    }

}
