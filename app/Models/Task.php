<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    public function getByLimit(int $limit_count = 20)
    {
        return $this->orderBy('deadline', 'ASC')->limit($limit_count)->get();
    }
}
