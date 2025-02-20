<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogService $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $blogs = $this->blogService->blogs();

        return view('blogs.index', compact('blogs'));
    }

    /**
     * @param int $id
     * @return Factory|View|Application
     */
    public function show(int $id): Factory|View|Application
    {
        $blog = $this->blogService->find($id);

        return view('blogs.detail', compact('blog'));
    }
}
