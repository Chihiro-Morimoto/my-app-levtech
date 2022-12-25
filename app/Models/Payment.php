<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('used_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function usage()
    {
        return $this->belongsTo(Usage::class);
    }
    
    public function budget()
    {
        return $this->belongsTo(Budget::class, 'used_at', 'scheduled');
    }
    
    protected $fillable = [
        'used_at',
        'expenditure',
        'usage_id',
        'budget_id',
        'memo'
    ];
}
