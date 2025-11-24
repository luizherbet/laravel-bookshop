<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'O Senhor dos Anéis',
                'author' => 'J.R.R. Tolkien',
                'description' => 'Uma épica aventura na Terra Média',
                'price' => 59.90,
                'image_path' => null,
                'stock' => 10,
            ],
            [
                'title' => 'Harry Potter e a Pedra Filosofal',
                'author' => 'J.K. Rowling',
                'description' => 'A primeira aventura do jovem bruxo',
                'price' => 39.90,
                'image_path' => null,
                'stock' => 15,
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Um clássico da literatura distópica',
                'price' => 34.90,
                'image_path' => null,
                'stock' => 8,
            ],
            [
                'title' => 'Dom Casmurro',
                'author' => 'Machado de Assis',
                'description' => 'Um clássico da literatura brasileira',
                'price' => 29.90,
                'image_path' => null,
                'stock' => 12,
            ],
            [
                'title' => 'A Menina que Roubava Livros',
                'author' => 'Markus Zusak',
                'description' => 'Uma história emocionante na Alemanha nazista',
                'price' => 44.90,
                'image_path' => null,
                'stock' => 7,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}