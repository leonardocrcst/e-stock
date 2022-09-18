<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "action"
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, "id", "user_id");
    }

    static public function register(Authenticatable $user, string $message)
    {
        Log::create([
            "user_id" => $user->id,
            "action" => $message
        ]);
    }
}
