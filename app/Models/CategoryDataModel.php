<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDataModel extends Model
{
    protected $table = "category_data_table";
    protected $fillable = [
        "name_category",
    ];
    protected $guarded = ["id"];
    public $timestamps = true;

    public function CategoryGames()
    {
        return $this->hasMany(CategoryGamesModel::class, 'category_id', 'id');
    }
}
