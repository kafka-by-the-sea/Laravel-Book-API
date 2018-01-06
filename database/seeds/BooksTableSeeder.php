<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        $faker = \Faker\Factory::create();
        // And now, let's create a few articles in our database:

  
        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'book_name' => $faker->sentence,
                'book_description' => $faker->paragraph,
                'book_author' => $faker->name,
                'isbn' => $faker->isbn13,
                'created_at' => $faker->unixTime,
                'updated_at' => $faker->unixTime
            ]);
        }
    }
}
