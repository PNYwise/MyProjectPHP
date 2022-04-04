<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'banner_desctiption' => $this->faker->paragraph(),
            // 'body'=>'<p>'. inplode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))).'</p>',
            'desctiption' => collect($this->faker->paragraphs(mt_rand(5, 20)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'user_id' => 1,
            'date' => now(),
            'banner' => 'foto.jpg'
        ];
    }
}
