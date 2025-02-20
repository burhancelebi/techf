<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->category->all();
    }

    /**
     * @param $id
     * @return Category|null
     */
    public function find($id): ?Category
    {
        return $this->category->newQuery()->find($id);
    }

    public function store(array $data): Category
    {
        return $this->category->newQuery()->create($data);
    }

    /**
     * @param array $data
     * @param Category $category
     * @return bool
     */
    public function update(array $data, Category $category): bool
    {
        return $category->update($data);
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * @param Category $category
     * @return Collection
     */
    public function blogs(Category $category): Collection
    {
        return $category->blogs()->get();
    }
}
