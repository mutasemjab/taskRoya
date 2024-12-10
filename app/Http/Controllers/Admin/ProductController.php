<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {

        $data = Product::paginate(PAGINATION_COUNT);

        return view('admin.products.index', ['data' => $data]);
    }

    public function create()
    {
        if (auth()->user()->can('product-add')) {
            $types = Type::get();
            $categories = Category::get();
            return view('admin.products.create',compact('types','categories'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }



    public function store(Request $request)
    {

        try {
            $product = new Product();
           
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->show_time = $request->get('show_time');
            $product->type_id = $request->get('type');
            $product->category_id = $request->get('category');

        
            if ($product->save()) {

                return redirect()->route('products.index')->with(['success' => 'Product created']);
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
        if (auth()->user()->can('banner-edit')) {
            $types = Type::get();
            $categories = Category::get();
            $data = Product::findorFail($id);
            return view('admin.products.edit', compact('data','types','categories'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findorFail($id);
        try {
           
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->show_time = $request->get('show_time');
            $product->type_id = $request->get('type');
            $product->category_id = $request->get('category');

            if ($product->save()) {
                return redirect()->route('products.index')->with(['success' => 'product update']);
            } else {
                return redirect()->back()->with(['error' => 'Something wrong']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function delete($id)
    {
        try {

            $item_row = Product::select("id")->where('id', '=', $id)->first();

            if (!empty($item_row)) {

                $flag = Product::where('id', '=', $id)->delete();;

                if ($flag) {
                    return redirect()->back()
                        ->with(['success' => '   Delete Succefully   ']);
                } else {
                    return redirect()->back()
                        ->with(['error' => '   Something Wrong']);
                }
            } else {
                return redirect()->back()
                    ->with(['error' => '   cant reach fo this data   ']);
            }
        } catch (\Exception $ex) {

            return redirect()->back()
                ->with(['error' => ' Something Wrong   ' . $ex->getMessage()]);
        }
    }
}
