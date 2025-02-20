<?php

namespace App\Services;

use App\Http\Requests\Admin\Categories\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return $this->categoryRepository->all();
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function find(int $id): ?Category
    {
        return $this->categoryRepository->find($id);
    }

    /**
     * @param Category $category
     * @return Collection
     */
    public function blogs(Category $category): Collection
    {
        return $this->categoryRepository->blogs($category);
    }

    /**
     * @param Request $request
     * @return Category
     */
    public function store(Request $request): Category
    {
        return $this->categoryRepository->store($request->validated());
    }

    /**
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @return bool
     */
    public function update(CategoryUpdateRequest $request, Category $category): bool
    {
        return $this->categoryRepository->update($request->validated(), $category);
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function delete(Category $category): bool
    {
        return $this->categoryRepository->delete($category);
    }
}
