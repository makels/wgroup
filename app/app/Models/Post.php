<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    /** Post statuses */

    const PUBLISHED = 'PUBLISHED';

    const TO_MODERATE = 'TO_MODERATE';

    const DRAFT = 'DRAFT';

    const TRASH = 'TRASH';

    /** Post types */

    const PUBLIC = 'PUBLIC';

    const PRIVATE = 'PRIVATE';

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'author_id',
        'title',
        'image',
        'type',
        'status',
        'body',
        'block',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    /**
     * The author of post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public static function getPostStatus($status) {
        switch ($status) {
            case self::PUBLISHED:
                return __("Published");
            case self::TO_MODERATE:
                return __("To moderate");
            case self::DRAFT:
                return __("Draft");
            case self::TRASH:
                return __("Trash");
        }
    }

    public static function getPostType($type) {
        switch ($type) {
            case self::PUBLIC:
                return __('Public');
            case self::PRIVATE:
                return __('Private');
        }
    }
}

