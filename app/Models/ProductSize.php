<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table;

    protected $fillable = ['size_id','product_id','created_at','updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'product_sizes';
    }
    public function size() {
        return $this->belongsTo(Size::class);
    }
}
