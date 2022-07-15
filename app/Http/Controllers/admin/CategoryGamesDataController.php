<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryDataModel;
use App\Models\CategoryGamesModel;
use App\Models\GameListDataModel;
use Illuminate\Http\Request;

class CategoryGamesDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataCategory = CategoryDataModel::all();
        $DataGames = GameListDataModel::all();

        return view("admin-page.category_games.index", compact('DataCategory', 'DataGames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category_id" => "required",
            "games_id" => "required"
        ]);

        $dataForm = $request->all();

        CategoryGamesModel::create($dataForm);

        return redirect()->route("category-games.index")->with("success_message", "category games success created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGamesModel  $categoryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGamesModel $categoryGamesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGamesModel  $categoryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryGamesModel $categoryGamesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGamesModel  $categoryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryGamesModel $categoryGamesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGamesModel  $categoryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryGamesModel $categoryGamesModel)
    {
        //
    }
}
