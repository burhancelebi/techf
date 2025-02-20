<?php

namespace App\Services;

use App\Http\Requests\Admin\Blogs\BlogUpdateRequest;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BlogService
{
    private BlogRepository $blogRepository;

    public function __construct()
    {
        $this->blogRepository = new BlogRepository();
    }

    /**
     * @return Collection
     */
    public function blogs(): Collection
    {
        return $this->blogRepository->getBlogsWithCategories();
    }

    /**
     * @param int $id
     * @return Blog|null
     */
    public function find(int $id): ?Blog
    {
        return $this->blogRepository->find($id);
    }

    /**
     * @param Request $request
     * @return Blog
     */
    public function store(Request $request): Blog
    {
        return $this->blogRepository->store($request->validated());
    }

    /**
     * @param BlogUpdateRequest $request
     * @param Blog $blog
     * @return bool
     */
    public function update(BlogUpdateRequest $request, Blog $blog): bool
    {
        return $this->blogRepository->update($request->validated(), $blog);
    }

    /**
     * @param Blog $blog
     * @return bool
     */
    public function delete(Blog $blog): bool
    {
        return $this->blogRepository->delete($blog);
    }
}
