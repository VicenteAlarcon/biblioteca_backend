<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Book;
class Category extends Model
{

    use SoftDeletes, HasFactory;

    protected $fillable = ['name', 'slug', 'description'];
    

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
