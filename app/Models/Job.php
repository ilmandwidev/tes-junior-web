<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = "jobs";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'name',
        'user_created',
        'user_updated',
        'user_deleted',
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, "job_id", "id");
    }
}
