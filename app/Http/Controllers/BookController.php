<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Lista todos os livros
     */
    public function index()
    {
        $books = Book::all();
        // dd($books);
        return BookResource::collection($books);
    }

    /**
     * Mostra um livro específico
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return new BookResource($book);
    }

    public function search($term)
    {
        if (empty($term)) {
            return response()->json([
                'error' => 'Termo de busca não fornecido'
            ], 400);
        }

        $books = Book::searchBook($term)->get();
        return response()->json(BookResource::collection($books));
    }
}