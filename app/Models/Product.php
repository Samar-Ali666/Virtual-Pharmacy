<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'category_id',
        'subcategory_id',
        'photo_id',
        'pdf_id',
        'is_publish',
        'name',
        'description',
        'stock',
        'company',
        'price',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function pdf()
    {
        return $this->belongsTo('App\Models\Pdf');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot(['quantity'])->withTimestamps();
    }
}
