<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'salary_min',
        'salary_max',
        'keywords',
        'expires_at',
        'status',
        'location',
        'contract_type'
    ];

    protected $dates = ['expires_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function getSalaryRangeAttribute()
    {
        if ($this->salary_min && $this->salary_max) {
            return number_format($this->salary_min, 2, ',', '.') . '€ - ' . number_format($this->salary_max, 2, ',', '.') . '€';
        } elseif ($this->salary_min) {
            return 'A partir de ' . number_format($this->salary_min, 2, ',', '.') . '€';
        } elseif ($this->salary_max) {
            return 'Até ' . number_format($this->salary_max, 2, ',', '.') . '€';
        }
        return 'Não especificado';
    }
}
