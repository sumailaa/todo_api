<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->BelongTo('users');
    }

    public function tags()
    {
        return $this->belongsToMany('tags');
    }
}
