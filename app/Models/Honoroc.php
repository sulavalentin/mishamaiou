<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Honoroc extends Model
{
    protected $table;

    protected $fillable = ['title','price','image','created_at','updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'honorocs';
    }
}
