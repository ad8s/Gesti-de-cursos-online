<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        Gate::authorize('is_admin');

        $categories = Category::withCount('courses')->orderBy('name')->get();

        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        Gate::authorize('is_admin');

        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($this->filledCategoryData($request->validated(), $request->user()->id));

        return redirect()->route('admin.categories.index')->with('status', 'category-created');
    }

    public function show(Category $category): View
    {
        Gate::authorize('is_admin');

        $category->loadCount('courses');

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        Gate::authorize('is_admin');

        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($this->filledCategoryData($request->validated(), $request->user()->id, $category));

        return redirect()->route('admin.categories.index')->with('status', 'category-updated');
    }

    public function destroy(Category $category): RedirectResponse
    {
        Gate::authorize('is_admin');

        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'category-deleted');
    }

    private function filledCategoryData(array $data, int $userId, ?Category $category = null): array
    {
        $slugSource = $data['slug'] ?? $data['name'];
        $data['slug'] = $this->uniqueSlug($slugSource, $category);
        $data['user_id'] = $category?->user_id ?? $userId;

        return $data;
    }

    private function uniqueSlug(string $value, ?Category $category = null): string
    {
        $slug = Str::slug($value) ?: 'category';
        $baseSlug = $slug;
        $index = 1;

        while (Category::query()->when($category, fn ($query) => $query->where('id', '!=', $category->getKey()))->where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$index;
            $index++;
        }

        return $slug;
    }
}
