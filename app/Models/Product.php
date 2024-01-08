<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function img()
    {
        return $this->hasOne(ProductImg::class, 'pid', 'pid')->where('type', 'md');
    }

    public function imgmd()
    {
        return $this->hasMany(ProductImg::class, 'pid', 'pid')->where('type', 'md');
    }

    public function imglg()
    {
        return $this->hasMany(ProductImg::class, 'pid', 'pid')->where('type', 'lg');
    }
}
