<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CategoryStoreRequest;
use App\Http\Requests\Admin\Categories\CategoryUpdateRequest;
use App\Services\CategoryService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $categories = $this->categoryService->getCategories();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @return Factory|View|Application
     */
    public function store(CategoryStoreRequest $request): Factory|View|Application
    {
        $this->categoryService->store($request);

        return view('admin.categories.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Factory|View|Application
     */
    public function edit(string $id): Factory|View|Application
    {
        $category = $this->categoryService->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param string $id
     * @return Factory|View|Application
     */
    public function update(CategoryUpdateRequest $request, string $id): Factory|View|Application
    {
        $category = $this->categoryService->find($id);

        $this->categoryService->update($request, $category);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = $this->categoryService->find($id);

        $this->categoryService->delete($category);

        return redirect()->route('categories.index')->with([
            'success' => 'Category deleted successfully!'
        ]);
    }
}
