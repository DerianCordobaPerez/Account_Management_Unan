<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Concept extends Model
{
    use HasFactory, SoftDeletes, Searchable;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'price', 'description'];

    public function searchableAs(): string
    {
        return 'concepts_index';
    }

}
