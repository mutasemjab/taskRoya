<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;


class TypeController extends Controller
{

    public function index()
    {

        $data = Type::paginate(PAGINATION_COUNT);

        return view('admin.types.index', ['data' => $data]);
    }

    public function create()
    {
        if (auth()->user()->can('type-add')) {
            return view('admin.types.create');
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }



    public function store(Request $request)
    {

        try {
            $type = new Type();

            $type->name = $request->get('name');
          
            if ($type->save()) {

                return redirect()->route('types.index')->with(['success' => 'Type created']);
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
        if (auth()->user()->can('type-edit')) {
            $data = Type::findorFail($id);
            return view('admin.types.edit', compact('data'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }

    public function update(Request $request, $id)
    {
        $type = Type::findorFail($id);
        try {
            $type->name = $request->get('name');
            
            if ($type->save()) {
                return redirect()->route('types.index')->with(['success' => 'Type update']);
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

            $item_row = Type::select("id")->where('id', '=', $id)->first();

            if (!empty($item_row)) {

                $flag = Type::where('id', '=', $id)->delete();;

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
