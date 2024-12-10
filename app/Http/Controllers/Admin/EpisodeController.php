<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Product;
use Illuminate\Http\Request;


class EpisodeController extends Controller
{

    public function index()
    {

        $data = Episode::paginate(PAGINATION_COUNT);

        return view('admin.episodes.index', ['data' => $data]);
    }

    public function create()
    {
        if (auth()->user()->can('episode-add')) {
            $products = Product::get();
            return view('admin.episodes.create',compact('products'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }



    public function store(Request $request)
    {

        try {
            $episode = new Episode();
            $episode->name = $request->get('name');
            $episode->description = $request->get('description');
            $episode->duration = $request->get('duration');
            $episode->show_time = $request->get('show_time');
            $episode->product_id = $request->get('product');
           
            if ($request->has('photo')) {
                $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
                $episode->photo = $the_file_path;
            }
          
            if ($request->has('video')) {
                $the_file_path = uploadImage('assets/admin/uploads', $request->video);
                $episode->video = $the_file_path;
            }

            if ($episode->save()) {

                return redirect()->route('episodes.index')->with(['success' => 'Episode created']);
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
            $products = Product::get();
            $data = Episode::findorFail($id);
            return view('admin.episodes.edit', compact('data','products'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }

    public function update(Request $request, $id)
    {
        $episode = Episode::findorFail($id);
        try {
            $episode->name = $request->get('name');
            $episode->description = $request->get('description');
            $episode->duration = $request->get('duration');
            $episode->show_time = $request->get('show_time');
            $episode->product_id = $request->get('product');
           
            if ($request->has('photo')) {
                $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
                $episode->photo = $the_file_path;
            }
          
            if ($request->has('video')) {
                $the_file_path = uploadImage('assets/admin/uploads', $request->video);
                $episode->video = $the_file_path;
            }

            if ($episode->save()) {
                return redirect()->route('episodes.index')->with(['success' => 'Episode update']);
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

            $item_row = Episode::select("id")->where('id', '=', $id)->first();

            if (!empty($item_row)) {

                $flag = Episode::where('id', '=', $id)->delete();;

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
