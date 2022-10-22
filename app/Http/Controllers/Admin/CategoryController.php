<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Services\Category\CategoryService;




class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
       $this->categoryService = $categoryService;
    }

    public function create()
    {
        return view('admin.category.add',[
            'title'=>"Thêm Danh Mục Mới"
        ]);
    }

    public function store(CreateFormRequest $request)
    {
       // dd($request->input());
       $result = $this->categoryService->create($request);
       return redirect()->back();
    }
}
