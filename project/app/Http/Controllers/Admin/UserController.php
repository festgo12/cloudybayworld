<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\Currency;

use Validator;

class UserController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth:admin');
        }

        //*** JSON Request
        public function datatables()
        {
            //  $datas = User::where('is_vendor', 0)->orderBy('id')->get();
             $datas = User::orderBy('id')->get();
             //--- Integrating This Collection Into Datatables
             return Datatables::of($datas)
                                ->addColumn('action', function(User $data) {
                                    $class = $data->ban == 0 ? 'drop-success' : 'drop-danger';
                                    $s = $data->ban == 1 ? 'selected' : '';
                                    $ns = $data->ban == 0 ? 'selected' : '';
                                    $ban = '<select class="process select droplinks '.$class.'">'.
                '<option data-val="0" value="'. route('admin-user-ban',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Block</option>'.
                '<option data-val="1" value="'. route('admin-user-ban',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>UnBlock</option></select>';
                                    return '<div class="action-list"><a href="' . route('admin-user-show',$data->id) . '" > <i class="fas fa-eye"></i> Details</a><a data-href="' . route('admin-user-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" class="send" data-email="'. $data->email .'" data-toggle="modal" data-target="#vendorform"><i class="fas fa-envelope"></i> Send</a>'.$ban.'<a href="javascript:;" data-href="' . route('admin-user-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                                }) 
                                ->rawColumns(['action'])
                                ->toJson(); //--- Returning Json Data To Client Side
        }

        //*** GET Request
        public function index()
        {
            return view('admin.user.index');
        }

        //*** GET Request
        public function image()
        {  
            return view('admin.generalsetting.user_image');
        }

        //*** GET Request
        public function show($id)
        {
            if(!User::where('id',$id)->exists())
            {
                return redirect()->route('admin.dashboard')->with('unsuccess',__('Sorry the page does not exist.'));
            }
            $data = User::findOrFail($id);
            return view('admin.user.show',compact('data'));
        }

        //*** GET Request
        public function ban($id1,$id2)
        {
            $user = User::findOrFail($id1);
            $user->ban = $id2;
            $user->update();

        }

        //*** GET Request    
        public function edit($id)
        {
            $data = User::findOrFail($id);
            return view('admin.user.edit',compact('data'));
        }

        //*** POST Request
        public function update(Request $request, $id)
        {
            
            //--- Validation Section
            $rules = [
                   'photo' => 'mimes:jpeg,jpg,png,svg',
                    ];

            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
              return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends

            $user = User::findOrFail($id);
            $data = $request->all();
            
            if ($file = $request->file('photo'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/uploads/avatar/',$name);
                if($user->photo != null)
                {
                    if (file_exists(public_path().'/assets/uploads/avatar/'.$user->avatar)) {
                        unlink(public_path().'/assets/uploads/avatar/'.$user->avatar);
                    }
                }
                $data['avatar'] = $name;
            }

            $user->update($data);
            $user->city = $request->city;
            $user->zipCode = $request->zipCode;
            $user->homeAddress = $request->homeAddress;
            $user->contactNo = $request->contactNo;
            $user->save();
            // return response()->json($user);
            $msg = 'Customer Information Updated Successfully.';
            return response()->json($msg);   
        }

        //*** GET Request Delete
        public function destroy($id)
        {
        $user = User::findOrFail($id);


        if($user->shippings->count() > 0)
        {
            foreach ($user->shippings as $gal) {
                $gal->delete();
            }
        }

        

        if($user->ratings->count() > 0)
        {
            foreach ($user->ratings as $gal) {
                $gal->delete();
            }
        }

        if($user->notifications->count() > 0)
        {
            foreach ($user->notifications as $gal) {
                $gal->delete();
            }
        }

        if($user->wishlists->count() > 0)
        {
            foreach ($user->wishlists as $gal) {
                $gal->delete();
            }
        }



        if($user->products->count() > 0)
        {

// PRODUCT

            foreach ($user->products as $prod) {
                if($prod->galleries->count() > 0)
                {
                    foreach ($prod->galleries as $gal) {
                            if (file_exists(public_path().'/assets/uploads/products/gal/'.$gal->image)) {
                                unlink(public_path().'/assets/uploads/products/gal/'.$gal->image);
                            }
                        $gal->delete();
                    }

                }
                if($prod->ratings->count() > 0)
                {
                    foreach ($prod->ratings as $gal) {
                        $gal->delete();
                    }
                }
                if($prod->wishlists->count() > 0)
                {
                    foreach ($prod->wishlists as $gal) {
                        $gal->delete();
                    }
                }

                if($prod->clicks->count() > 0)
                {
                    foreach ($prod->clicks as $gal) {
                        $gal->delete();
                    }
                }

                

                if (file_exists(public_path().'/assets/uploads/products/'.$prod->image)) {
                    unlink(public_path().'/assets/uploads/products/'.$prod->image);
                }

                $prod->delete();
            }


// PRODUCT ENDS

        }
// OTHER SECTION 




        if($user->vendororders->count() > 0)
        {
            foreach ($user->vendororders as $gal) {
                $gal->delete();
            }
        }

      

// OTHER SECTION ENDS


            //If Photo Doesn't Exist
            if($user->avatar == null){
                $user->delete();
                //--- Redirect Section     
                $msg = 'Data Deleted Successfully.';
                return response()->json($msg);      
                //--- Redirect Section Ends 
            }
            //If Photo Exist
            if (file_exists(public_path().'/assets/uploads/avatar/'.$user->avatar)) {
                    unlink(public_path().'/assets/uploads/avatar/'.$user->avatar);
                 }
            $user->delete();
            //--- Redirect Section     
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends    
        }

       

}