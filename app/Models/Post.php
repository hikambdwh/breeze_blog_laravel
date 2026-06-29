<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['slug', 'title', 'content', 'category_id', 'author_id'];
  protected $with = ['author', 'category'];

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'author_id');
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'category_id');
  }

  #[Scope]
  protected function filter(Builder $query, array $filters): void
  {

    $query->when($filters['search'] ?? false, function ($postQuery, $search) {
      return $postQuery->where('title', 'LIKE', '%' . $search . '%');
    });

    $query->when($filters['category'] ?? false, function ($postQuery, $category) {
      return $postQuery->whereHas(
        'category', 
        fn(Builder $categoryQuery) => $categoryQuery->where('category_name', '=', $category));
    });

    $query->when($filters['author'] ?? false, function ($postQuery, $author) {
      return $postQuery->whereHas('author', fn(Builder $authorQuery) => $authorQuery->where('username', '=', $author)
      );
    });
  }
}
