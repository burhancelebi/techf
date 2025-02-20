<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blogs\BlogStoreRequest;
use App\Http\Requests\Admin\Blogs\BlogUpdateRequest;
use App\Services\BlogService;
use App\Services\CategoryService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    private BlogService $blogService;
    private CategoryService $categoryService;

    public function __construct(BlogService $blogService, CategoryService $categoryService)
    {
        $this->blogService = $blogService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $blogs = $this->blogService->blogs();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $categories = $this->categoryService->getCategories();

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BlogStoreRequest $request): RedirectResponse
    {
        $this->blogService->store($request);

        return redirect()->route('blogs.create');
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
        $categories = $this->categoryService->getCategories();
        $blog = $this->blogService->find($id);

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogUpdateRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(BlogUpdateRequest $request, string $id): RedirectResponse
    {
        $blog = $this->blogService->find($id);
        $this->blogService->update($request, $blog);

        return redirect()->route('blogs.edit', $blog->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $blog = $this->blogService->find($id);

        $this->blogService->delete($blog);

        return redirect()->route('blogs.index')->with([
            'success' => 'Blog deleted successfully!'
        ]);
    }
}
