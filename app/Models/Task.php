<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    
    public function getByLimit(int $limit_count = 20)
    {
        return $this->orderBy('deadline', 'ASC')->limit($limit_count)->get();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'title',
        'deadline',
        'place',
        'body',
        'checked',
        'user_id'
    ];
    
}
