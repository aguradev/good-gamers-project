<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryGamesModel extends Model
{
    protected $table = "gallery_games";

    protected $fillable = ["gallery_images", "games_id"];

    protected $guarded = ["id"];

    use HasFactory;
}
