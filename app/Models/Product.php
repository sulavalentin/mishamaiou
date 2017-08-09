<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table;

    protected $fillable = ['title','price','image','created_at','updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'products';
    }
    public function sizes() {
        return $this->hasMany(ProductSize::class);
    }
    public function honorocs() {
        return $this->hasMany(ProductHonoroc::class);
    }
}
