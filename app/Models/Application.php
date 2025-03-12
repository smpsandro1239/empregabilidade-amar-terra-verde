<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    // Specify the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'job_offer_id',
        'message',
        'resume_file_path',
        'applied_at',
        'status',
    ];

    // Specify the attributes that should be treated as dates
    protected $dates = ['applied_at'];

    /**
     * Get the user that owns the application.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the job offer that the application belongs to.
     */
    public function jobOffer(): BelongsTo
    {
        return $this->belongsTo(JobOffer::class);
    }
}
