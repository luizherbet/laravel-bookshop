<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'price',
        'image_path',
        'stock',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    /**
     * Relacionamento: Um livro pode ter vários itens de pedido
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

public function scopeSearchBook($query, $term)
    {
        return $query->where('title', 'like', "%{$term}%")
                     ->orWhere('author', 'like', "%{$term}%");
    }
}