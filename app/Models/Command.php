<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $table;

    protected $fillable = ['*'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'commands';
    }

    public function size(){
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function honoroc(){
        return $this->belongsTo(Honoroc::class,'honoroc_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
