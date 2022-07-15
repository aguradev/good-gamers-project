<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryDataRequest;
use App\Models\CategoryDataModel;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CategoryDataController extends Controller
{

    public function index()
    {
        $categoryModels = new CategoryDataModel();

        $AllDataCategory = $categoryModels->all();

        return view("admin-page.category_page.index", compact('AllDataCategory'));
    }

    public function create(CategoryDataRequest $request)
    {
        $request->validated();
        $dataForm = $request->all();

        CategoryDataModel::create($dataForm);

        return redirect()->route("form-category")->with("success_message", "category success created");
    }

    public function delete(CategoryDataModel $CategoryDataModel)
    {
        CategoryDataModel::destroy($CategoryDataModel->id);

        return redirect()->route("form-category")->with("success_message", "category success deleted");
    }

    public function edit(CategoryDataModel $CategoryDataModel)
    {
        return $CategoryDataModel;
    }

    public function update(CategoryDataModel $CategoryDataModel, CategoryDataRequest $Request)
    {
        $Request->validated();

        $dataForm = $Request->name_category;

        CategoryDataModel::where("id", $CategoryDataModel->id)->update(["name_category" => $dataForm]);

        return redirect()->route("form-category")->with("success_message", "category success updated");
    }
}
