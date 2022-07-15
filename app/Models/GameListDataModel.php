<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameListDataModel extends Model
{
    protected $table = "gamelist_table";

    protected $fillable = ["title_game", "banner_id", "slug", "price", "story_game", "photo_cover"];

    protected $guarded = ["id"];

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        // gamelist memiliki banyak kategori
        return $this->hasMany(CategoryGamesModel::class, "games_id", "id");
    }

    public function BannerGame()
    {
        return $this->belongsTo(GameBannerModel::class, "banner_id", "id");
    }

    public function galleries()
    {
        return $this->hasMany(GalleryGamesModel::class, "games_id", "id");
    }
}
