<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'slug',
        'description',
        'video_url',
        'content',
        'duration_minutes',
        'is_free_preview',
        'position',
    ];

    protected $casts = [
        'is_free_preview' => 'boolean',
    ];

    public function section()
    {
        return $this->belongsTo(CourseSection::class, 'section_id');
    }

    public function completions()
    {
        return $this->hasMany(LessonCompletion::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
}
