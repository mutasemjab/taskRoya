<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Type;
use Illuminate\Http\Request;


class BannerController extends Controller
{

    public function index()
    {

        $data = Banner::paginate(PAGINATION_COUNT);

        return view('admin.banners.index', ['data' => $data]);
    }

    public function create()
    {
        if (auth()->user()->can('banner-add')) {
            $types = Type::get();
            return view('admin.banners.create',compact('types'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }



    public function store(Request $request)
    {

        try {
            $slider = new Banner();

            $slider->name = $request->get('name');
            $slider->rating = $request->get('rating');
            $slider->type_id = $request->get('type');

            if ($request->has('photo')) {
                $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
                $slider->photo = $the_file_path;
            }

            if ($slider->save()) {

                return redirect()->route('banners.index')->with(['success' => 'Banner created']);
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
            $data = Banner::findorFail($id);
            return view('admin.banners.edit', compact('data','types'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }

    public function update(Request $request, $id)
    {
        $slider = Banner::findorFail($id);
        try {
            $slider->name = $request->get('name');
            $slider->rating = $request->get('rating');
            $slider->type_id = $request->get('type');

            if ($request->has('photo')) {
                $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
                $slider->photo = $the_file_path;
            }
            if ($slider->save()) {
                return redirect()->route('banners.index')->with(['success' => 'banner update']);
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

            $item_row = Banner::select("id")->where('id', '=', $id)->first();

            if (!empty($item_row)) {

                $flag = Banner::where('id', '=', $id)->delete();;

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
