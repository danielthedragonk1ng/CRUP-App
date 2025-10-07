<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat 10 data dosen
        $dosens = Dosen::factory(10)->create();

        //Buat 50 mata kuliah dan katikan ke dosen yang ada (acak)
        Matakuliah::factory(50)->make()->each(function ($mk) use ($dosens) {
            $mk->dosen_id = $dosens->random()->id;
            $matakuliah->save();
        });
    }
}
