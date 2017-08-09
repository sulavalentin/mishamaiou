<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHonoroc extends Model
{
    protected $table;

    protected $fillable = ['product_id','honoroc_id','price','created_at','updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'product_honorocs';
    }
    public function honoroc() {
        return $this->belongsTo(Honoroc::class);
    }
}
