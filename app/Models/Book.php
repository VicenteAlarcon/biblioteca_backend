<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
class Book extends Model
{
    use SoftDeletes;

    protected $fillable= ['category_id', 'title', 'author', 'isbn', 'description', 'stock'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
