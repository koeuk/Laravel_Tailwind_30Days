<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;
    /**
     * Summary of table
     * @var string
     */
    protected $table = 'employer';
    protected $fillable = ['name'];

    /**
     * Relationship to model Jobs
     * 
     * @var string
     */
    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
