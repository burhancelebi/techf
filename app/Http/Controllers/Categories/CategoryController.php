<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $categories = $this->categoryService->getCategories();

        return view('categories.index', compact('categories'));
    }

    /**
     * @param int $id
     * @return Factory|View|Application
     */
    public function blogs(int $id): Factory|View|Application
    {
        $category = $this->categoryService->find($id);
        $blogs = $this->categoryService->blogs($category);

        return view('categories.blogs', compact('category', 'blogs'));
    }
}
