<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use App\Models\Admin\User;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','subcategory_id', 'user_id','title','slug', 'description', 'post_date', 'image', 'tags'
    ];

    //__Join with Category__//
    public function category(){
        return $this->belongsTo(Category::class, 'category_id'); //Category ID
    }

    //__Join with Subcategory__//
    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');  //Subcategory ID
    }

    //__Join with Usery__//
    public function user(){
        return $this->belongsTo(User::class, 'user_id');  //User ID
    }
}
