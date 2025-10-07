<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MataKuliahFactory extends Factory
{
    public function definition(): array
    {
        return[
            'nama'= ucfirst($this->faker->unique()->words(2, true)), // contoh: "Pengembangan Web"
            'sks'=> $this->faker->numberBetween(2, 4),
// PENTING: jangan set 'dosen_id' supaya tidak membuatdosen baru otomatis
        ]
    }

}