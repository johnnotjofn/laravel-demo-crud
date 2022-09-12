<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    protected $casts = [
        'body' => 'string'
    ];

    /**
     * This is an Accessor, which transforms our raw model attribute to something more useful
     *
     * @return string
     */
    public function getTitleToUppercaseAttribute(): string
    {
        return strtoupper($this->title);
    }

    /**
     * This is a Mutator, which triggers just before an attribute is set
     *
     * @param $value
     * @return string
     */
    public function setTitleAttribute($value): string
    {
        $this->attributes['title'] = strtolower($value);
        return $this->title;
    }

    /**
     * One post has many comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    /**
     * Define Many-to-many relationship between Post and User
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_user', 'post_id', 'user_id');
    }
}
