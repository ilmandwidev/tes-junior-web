<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;

    protected $table = "candidates";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'name', 'email', 'phone', 'year', 'job_id',
        'user_created',
        'user_updated',
        'user_deleted',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, "job_id", "id");
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
