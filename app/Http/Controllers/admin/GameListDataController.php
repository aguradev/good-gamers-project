<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameListDataRequest;
use App\Models\CategoryDataModel;
use App\Models\GameBannerModel;
use App\Models\GameListDataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameListDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGames = GameListDataModel::all();

        return view("admin-page.gamelist.index", compact('dataGames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin-page.gamelist.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameListDataRequest $request)
    {
        $request->validated();

        $dataBanner = [
            "banner_photo" => $request->file("banner_photo")->store("assets/banner"),
            "slug" => Str::slug($request->title_game)
        ];

        GameBannerModel::create($dataBanner);

        $getIdBanner = GameBannerModel::where("slug", $dataBanner['slug'])->first();

        $dataForm = [
            "title_game" => $request->title_game,
            "banner_id" => $getIdBanner->id,
            "price" => $request->price,
            "slug" => Str::slug($request->title_game),
            "story_game" => $request->story_game,
            "photo_cover" => $request->file("photo_cover")->store("assets/photo_cover")
        ];

        GameListDataModel::create($dataForm);

        return redirect()->route("gamelist-data.create")->with("success_message", "game data success created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameListDataModel  $gameListDataModel
     * @return \Illuminate\Http\Response
     */
    public function show(GameListDataModel $gamelist)
    {
        dd($gamelist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameListDataModel  $gameListDataModel
     * @return \Illuminate\Http\Response
     */
    public function edit(GameListDataModel $gameListDataModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameListDataModel  $gameListDataModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameListDataModel $gameListDataModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameListDataModel  $gameListDataModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameListDataModel $gameListDataModel)
    {
        //
    }
}
