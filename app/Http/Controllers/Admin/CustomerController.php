<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;


class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $data = User::where(function ($q) use ($request) {
                $q->where(\DB::raw('CONCAT_WS(" ", `name`, `email`,)'), 'like', '%' . $request->search . '%');
            })->paginate(PAGINATION_COUNT);
        } else {
            $data = User::paginate(PAGINATION_COUNT);
        }

        $searchQuery = $request->search;

        return view('admin.customers.index', compact('data', 'searchQuery'));
    }

   

    public function export(Request $request)
    {
        return Excel::download(new UsersExport($request->search), 'users.xlsx');
    }


    public function edit($id)
    {
        if (auth()->user()->can('customer-edit')) {
            $data = User::findorFail($id);
            return view('admin.customers.edit', compact('data'));
        } else {
            return redirect()->back()
                ->with('error', "Access Denied");
        }
    }

       public function update(Request $request,$id)
       {
         $customer=User::findorFail($id);
         try{

             $customer->name = $request->get('name');
             if($request->password){
                $customer->password = Hash::make($request->password);
             }
             $customer->email = $request->get('email');
             if($request->activate){
                $customer->activate = $request->get('activate');
            }
            if ($request->has('photo')) {
                $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
                $customer->photo = $the_file_path;
             }
             if($customer->save()){
                 return redirect()->route('customers.index')->with(['success' => 'Customer update']);

             }else{
                 return redirect()->back()->with(['error' => 'Something wrong']);
             }

         }catch(\Exception $ex){
             return redirect()->back()
             ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
             ->withInput();
         }

      }

    
}
