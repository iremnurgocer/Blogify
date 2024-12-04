<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content','is_edited','user_id','edit_user_id'];
    protected $dates = ['created_at'];
    // Postu oluşturan kullanıcı
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Postu düzenleyen kullanıcı
    public function editor()
    {
        return $this->belongsTo(User::class, 'edit_user_id');
    }
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('F d, Y');
    }

}
