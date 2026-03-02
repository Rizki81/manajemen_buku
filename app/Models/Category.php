<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori'
    ];

    // Relasi: 1 Category punya banyak Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}