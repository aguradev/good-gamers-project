<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryGamesModel;
use App\Models\GameListDataModel;
use Illuminate\Http\Request;

class GalleryGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataGames = GameListDataModel::all();
        $galleries = GalleryGamesModel::all();
        return view("admin-page.gallery.index", compact("DataGames", "galleries"));
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
            "gallery_images" => "required|file|image|max:2048|mimes:jpeg,jpg",
            "games_id" => "required"
        ]);

        $formData = [
            "gallery_images" => $request->file("gallery_images")->store("assets/gallery"),
            "games_id" => $request->games_id
        ];

        GalleryGamesModel::create($formData);

        return redirect()->route("galleries.index")->with("success_message", "galleries success created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryGamesModel  $galleryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryGamesModel $galleryGamesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalleryGamesModel  $galleryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryGamesModel $galleryGamesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GalleryGamesModel  $galleryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryGamesModel $galleryGamesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryGamesModel  $galleryGamesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryGamesModel $galleryGamesModel)
    {
        //
    }
}
