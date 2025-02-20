<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

class BlogRepository
{
    private Blog $blog;

    public function __construct()
    {
        $this->blog = new Blog();
    }

    /**
     * @return Collection
     */
    public function getBlogsWithCategories(): Collection
    {
        return $this->blog->newQuery()->with('category')
                ->orderBy('created_at', 'desc')
                ->get();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->blog->all();
    }

    /**
     * @param $id
     * @return Blog|null
     */
    public function find($id): ?Blog
    {
        return $this->blog->newQuery()->find($id);
    }

    public function store(array $data): Blog
    {
        return $this->blog->newQuery()->create($data);
    }

    /**
     * @param array $data
     * @param Blog $blog
     * @return bool
     */
    public function update(array $data, Blog $blog): bool
    {
        return $blog->update($data);
    }

    /**
     * @param Blog $blog
     * @return bool
     */
    public function delete(Blog $blog): bool
    {
        return $blog->delete();
    }
}
