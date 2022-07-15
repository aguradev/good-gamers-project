<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameBannerModel extends Model
{
    protected $table = "game_banner_table";

    protected $fillable = ["banner_photo", "slug"];
    protected $guarded = ["id"];

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
