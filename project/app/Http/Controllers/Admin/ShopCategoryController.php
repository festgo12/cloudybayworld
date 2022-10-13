<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ShopCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = ShopCategory::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            // ->addColumn('status', function(ShopCategory $data) {
                            //     $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                            //     $s = $data->status == 1 ? 'selected' : '';
                            //     $ns = $data->status == 0 ? 'selected' : '';
                            //     return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-shopcat-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-shopcat-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            // })
                            
                            ->addColumn('action', function(ShopCategory $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-shopcat-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-shopcat-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


     //*** GET Request
     public function index()
     {
         return view('admin.shopcategory.index');
     }
 
     //*** GET Request
     public function create()
     {
         return view('admin.shopcategory.create');
     }

      //*** POST Request
      public function store(Request $request)
      {
        //--- Validation Section
        $rules = [
            'category_name' => 'string',
            'icon_path' => 'string',
                 ];
       
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
  
          //--- Logic Section
          $data = new ShopCategory();
          $data->category_name = $request->category_name;
          $data->icon_path = $request->icon_path;
        
             
          $data->save();
          cache()->forget('shopcategories');
          //--- Logic Section Ends
  
          //--- Redirect Section
          $msg = 'New Data Added Successfully.';
          return response()->json($msg);
          //--- Redirect Section Ends
      }
  
      //*** GET Request
      public function edit($id)
      {
          $data = ShopCategory::findOrFail($id);
          return view('admin.shopcategory.edit',compact('data'));
      }
  
      //*** POST Request
      public function update(Request $request, $id)
      {
          //--- Validation Section
          $rules = [
              'category_name' => 'string',
              'icon_path' => 'string',
                   ];
         
          $validator = Validator::make($request->all(), $rules);
  
          if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          //--- Validation Section Ends
  
          //--- Logic Section
          $data = ShopCategory::findOrFail($id);

          $data->category_name = $request->category_name;
          $data->icon_path = $request->icon_path;
        
             
          $data->save();
          cache()->forget('categories');
          //--- Logic Section Ends
  
          //--- Redirect Section
          $msg = 'Data Updated Successfully.';
          return response()->json($msg);
          //--- Redirect Section Ends
      }
  
        //*** GET Request Status
        public function status($id1,$id2)
        {
            $data = ShopCategory::findOrFail($id1);
            $data->status = $id2;
            $data->update();
            cache()->forget('categories');
        }
  
  
      //*** GET Request Delete
      public function destroy($id)
      {
          $data = ShopCategory::findOrFail($id);
  
          
          $data->delete();
          cache()->forget('categories');
          //--- Redirect Section
          $msg = 'Data Deleted Successfully.';
          return response()->json($msg);
          //--- Redirect Section Ends
      }
    
    



}
