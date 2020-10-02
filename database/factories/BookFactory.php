<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
  protected $model =  Book::class;

  public function definition()
  {
    return [
      'title' => $this->faker->sentence(3, true),
      'description' => $this->faker->sentence(6, true),
      'price' => $this->faker->biasedNumberBetween(25, 150),
      'author_id' => $this->faker->biasedNumberBetween(1, 50),
    ];
  }
}
