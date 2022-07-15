<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGamesModel extends Model
{
    protected $table = "category_games_table";
    protected $fillable = [
        "category_id", "games_id"
    ];
    protected $guarded = ["id"];
    public $timestamps = true;

    use HasFactory;

    public function categoryData()
    {
        return $this->belongsTo(CategoryDataModel::class, 'category_id', 'id');
    }

    public function gamelist()
    {
        return $this->belongsTo(GameListDataModel::class, "games_id", "id");
    }
}
