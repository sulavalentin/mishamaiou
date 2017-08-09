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
}
