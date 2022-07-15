<?php

namespace App\Http\Controllers;

use App\Models\CategoryDataModel;
use App\Models\GameBannerModel;
use App\Models\GameListDataModel;
use Illuminate\Http\Request;

class HomeGoodGamersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gameList = GameListDataModel::all();
        $gamelistBanner = GameListDataModel::where('id', '>', 0)->get();

        return view("pages/index", compact("gameList", "gamelistBanner"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GameListDataModel $gamelist)
    {
        $datagames = $gamelist->with(['galleries', 'category', 'bannerGame'])->where('slug', $gamelist->slug)->firstOrFail();

        foreach ($datagames->category as $data) {
            $category_id = $data['category_id'];
        }

        $dataCategory = CategoryDataModel::where(["id" => $category_id])->firstOrFail();

        return view("pages.product", compact('datagames', 'dataCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
