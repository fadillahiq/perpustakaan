<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isbn' => $this->faker->numberBetween(111111, 999999),
            'judul' => $this->faker->name(),
            'id_penerbit' => $this->faker->numberBetween(1, 3),
            'id_pengarang' => $this->faker->numberBetween(1, 3),
            'id_katalog' => $this->faker->numberBetween(1, 3),
            'tahun' => $this->faker->numberBetween(2015, 2021),
            'qty_stok' => $this->faker->numberBetween(5, 20),
            'harga_pinjam' => $this->faker->numberBetween(5000, 20000)
        ];
    }
}
