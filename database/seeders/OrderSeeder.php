<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Buscar um usuário (assumindo que já existe)
        $user = User::first();
        
        if (!$user) {
            $this->command->warn('Nenhum usuário encontrado. Crie um usuário primeiro.');
            return;
        }

        // Buscar alguns livros
        $books = Book::take(3)->get();
        
        if ($books->isEmpty()) {
            $this->command->warn('Nenhum livro encontrado. Execute BookSeeder primeiro.');
            return;
        }

        // Criar um pedido
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => 0,
            'status' => 'completed',
        ]);

        $total = 0;

        // Adicionar itens ao pedido
        foreach ($books as $book) {
            $quantity = rand(1, 3);
            $itemPrice = $book->price * $quantity;
            $total += $itemPrice;

            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $book->id,
                'quantity' => $quantity,
                'price' => $book->price,
            ]);
        }

        // Atualizar o total do pedido
        $order->update(['total_amount' => $total]);
    }
}