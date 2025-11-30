<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller {
    public function index(Request $request) {
        $request->validate([
            'name'       => ['nullable', 'string'],
            'sort_by'    => ['nullable', 'string', 'in:name'],
            'sort_order' => ['nullable', 'string', 'in:asc,desc'],
        ]);

        return response()->
        json([
            'data' => Category::query()
                ->where('name', 'like', '%' . $request->query('name') . '%')
                ->orderBy($request->query('sort_by', 'name'), $request->query('sort_order', 'asc'))
                ->get(),
        ], Response::HTTP_OK);
    }

    public function show(Category $category) {
        if (!$category) {
            return response()
                ->json([
                    'message' => 'Категория не найдена',
                ], Response::HTTP_NOT_FOUND);
        }

        return response()
            ->json([
                'data' => $category,
            ], Response::HTTP_OK);
    }

    public function create(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $category = Category::query()->create([
            'name' => $request->input('name'),
        ]);

        return response()
            ->json([
                'data' => $category,
            ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);

        return response()
            ->json([
                'data' => $category,
            ], Response::HTTP_OK);
    }

    public function delete(Category $category) {
        $category->delete();

        return response()
            ->json([
                'message' => 'Категория удалена',
            ], Response::HTTP_OK);
    }
}
