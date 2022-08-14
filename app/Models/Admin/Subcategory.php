<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','category-name','category_slug'
    ];

    public function Category(){
        return $this->belongsTo(category::class, 'category_id');
    }
}
