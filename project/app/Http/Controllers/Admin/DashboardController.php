<?php

namespace App\Http\Controllers\Admin;

use Zip;
use Validator;

use App\Models\Blog;
use App\Models\User;
use App\Models\Order;
use App\Models\Counter;
use App\Models\Product;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pending = Order::where('status','=','pending')->get();
        $processing = Order::where('status','=','processing')->get();
        $completed = Order::where('status','=','completed')->get();
        $days = "";
        $sales = "";
        for($i = 0; $i < 30; $i++) {
            $days .= "'".date("d M", strtotime('-'. $i .' days'))."',";

            $sales .=  "'".Order::where('status','=','completed')->whereDate('created_at', '=', date("Y-m-d", strtotime('-'. $i .' days')))->count()."',";
        }
        $users = User::all();
        $products = Product::all();
        $blogs = Blog::all();
        $pproducts = Product::orderBy('id','desc')->take(5)->get();
        $rorders = Order::orderBy('id','desc')->take(5)->get();
        $poproducts = Product::orderBy('views','desc')->take(5)->get();
        $rusers = User::orderBy('id','desc')->take(5)->get();

        $activation_notify = "";
        $rooted = "";
       


        return view('admin.dashboard',compact('pending','activation_notify','processing','completed','products','users','days','sales','pproducts','rorders', 'blogs', 'poproducts','rusers'));
    }

    public function profile()
    {
        $data = Auth::guard('admin')->user();
        return view('admin.profile',compact('data'));
    }

    public function profileupdate(Request $request)
    {
        //--- Validation Section

        $rules =
        [
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'email' => 'unique:admins,email,'.Auth::guard('admin')->user()->id
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        $input = $request->all();
        $data = Auth::guard('admin')->user();
            if ($file = $request->file('photo'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/admin/images/avatar/',$name);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/admin/images/avatar/'.$data->photo)) {
                        unlink(public_path().'/assets/admin/images/avatar/'.$data->photo);
                    }
                }
            $input['photo'] = $name;
            }
        $data->update($input);
        $msg = 'Successfully updated your profile';
        return response()->json($msg);
    }

    public function passwordreset()
    {
        $data = Auth::guard('admin')->user();
        return view('admin.password',compact('data'));
    }

    public function changepass(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $admin->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    return response()->json(array('errors' => [ 0 => 'Confirm password does not match.' ]));
                }
            }else{
                return response()->json(array('errors' => [ 0 => 'Current password Does not match.' ]));
            }
        }
        $admin->update($input);
        $msg = 'Successfully change your passwprd';
        return response()->json($msg);
    }

   

   


}
