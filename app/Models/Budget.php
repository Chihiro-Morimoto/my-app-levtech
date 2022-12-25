<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    public function payments()
    {
        return $this->hasMany(Payment::class, 'used_at', 'scheduled');
    }
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('scheduled', 'DESC')->limit($limit_count)->get();
    }
    
    protected $fillable = [
        'id',
        'scheduled',
        'estimate'
    ];
}
