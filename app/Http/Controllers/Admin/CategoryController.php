<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $data = Category::paginate(PAGINATION_COUNT);

        return view('admin.categories.index', ['data' => $data]);
    }

    public function create()
    {
        if (auth()->user()->can('category-add')) {
            return view('admin.categories.create');
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }



    public function store(Request $request)
    {

        try {
            $category = new Category();

            $category->name = $request->get('name');

            if ($category->save()) {

                return redirect()->route('categories.index')->with(['success' => 'Category created']);
            } else {
                return redirect()->back()->with(['error' => 'Something wrong']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        if (auth()->user()->can('category-edit')) {
            $data = Category::findorFail($id);
            return view('admin.categories.edit', compact('data'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }

    public function update(Request $request, $id)
    {
        $category = Category::findorFail($id);
        try {

            $category->name = $request->get('name');

           
            if ($category->save()) {

                return redirect()->route('categories.index')->with(['success' => 'Category update']);
            } else {
                return redirect()->back()->with(['error' => 'Something wrong']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            // Delete the category
            if ($category->delete()) {
                return redirect()->back()->with(['success' => 'Category deleted successfully']);
            } else {
                return redirect()->back()->with(['error' => 'Something went wrong']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'Something went wrong: ' . $ex->getMessage()]);
        }
    }

}
