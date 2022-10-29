<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Validator;
use Datatables;
use App\Models\Shop;
use App\Models\User;
use App\Models\Currency;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Classes\GeniusMailer;

use App\Models\Generalsetting;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	    //*** JSON Request
	    public function datatables()
	    {
	        $datas = User::where('is_vendor','=',2)->orWhere('is_vendor','=',1)->orderBy('id','desc')->get();
	         //--- Integrating This Collection Into Datatables
	         return Datatables::of($datas)
                                ->editColumn('shop_name', function(User $user) {
                                    if($user->shop){

                                        $shopName = $user->shop->shopName;
                                    }else{
                                        $shopName = 'No Shop';

                                    }

                                    
                                    return  $shopName;
                                })
                                ->addColumn('status', function(User $data) {
                                    $class = $data->shop->status == 1 ? 'drop-success' : 'drop-danger';
                                    $s = $data->shop->status == 1 ? 'selected' : '';
                                    $ns = $data->shop->status == 0 ? 'selected' : '';
                                    return '<div class="action-list"><select class="process select vendor-droplinks '.$class.'">'.
                '<option value="'. route('admin-vendor-st',['id1' => $data->id, 'id2' => 2]).'" '.$s.'>Activated</option>'.
                '<option value="'. route('admin-vendor-st',['id1' => $data->id, 'id2' => 1]).'" '.$ns.'>Deactivated</option></select></div>';
                                }) 
	                            ->addColumn('action', function(User $data) {
	                                return '<div class="godropdown"><button class="go-dropdown-toggle"> Actions<i class="fas fa-chevron-down"></i></button><div class="action-list"><a href="' . route('admin-vendor-secret',$data->id) . '" target="_blank" > <i class="fas fa-user"></i> Secret Login</a><a href="' . route('admin-vendor-show',$data->id) . '" > <i class="fas fa-eye"></i> Details</a><a href="' . route('admin-vendor-edit',$data->id) . '"> <i class="fas fa-edit"></i> Edit</a><a href="javascript:;" class="send" data-email="'. $data->email .'" data-toggle="modal" data-target="#vendorform"><i class="fas fa-envelope"></i> Send Email</a><a href="javascript:;" data-href="' . route('admin-vendor-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Delete</a></div></div>';
	                            }) 
	                            ->rawColumns(['status','action'])
	                            ->toJson(); //--- Returning Json Data To Client Side
	    }

	//*** GET Request
    public function index()
    {
        return view('admin.vendor.index');
    }


	//*** GET Request
  	public function status($id1,$id2)
    {

        $user = User::findOrFail($id1);

        if($id2 == 2){

            $user->shop->status = 1;
        }
        elseif($id2 == 1)
        {
            $user->shop->status = 0;

        }

        $user->shop->update();
        //--- Redirect Section        
        $msg[0] = 'Status Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    

    }

	//*** GET Request
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.vendor.edit',compact('data'));
    }

	//*** GET Request
    public function create()
    {

        return view('admin.vendor.create');
    }



	

	//*** POST Request
    public function store(Request $request)
    {
       
        //--- Validation Section

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|min:4|unique:users',
            'password' => 'required|min:8',
            'shopName' => 'required|string|min:6',
            'description' => 'required|string|min:10',
            'founder' => 'string',
            'businessType' => 'string',
            'yearFounded' => 'integer|min:1700|max:' . date("Y"),
            'numberOfBranch' => 'integer',
            'location' => 'string',
            // 'category_id' => 'required|integer',
            'majorProduct' => 'string',
            'minorProduct' => 'string',
            'targetCustomer' => 'string',
            'contactNo' => 'string',
            'contactEmail' => 'email',
            'websiteLink' => 'url',
            'facebookLink' => 'url',
            'twitterLink' => 'url',
            'linkedinLink' => 'url',
            'timeOfOperation' => 'string',
            'startTime' => 'date_format:H:i',
            'closeTime' => 'date_format:H:i|after:startTime',
            'avatarInput' => 'required|image|max:2048',
        ]);
        
    
        
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->is_vendor = $request->is_vendor;
        $user->password = Hash::make($request->password) ;
        
        $user->save();

        $shop = new Shop();
        $shop->user_id = $user->id;
        $shop->shopName = $request->shopName;
        $shop->description = $request->description;
        $shop->founder = $request->founder;
        $shop->businessType = $request->businessType;
        $shop->yearFounded = $request->yearFounded;
        $shop->numberOfBranch = $request->numberOfBranch;
        $shop->location = $request->location;
        $shop->category_id = $request->category_id;
        $shop->majorProduct = $request->majorProduct;
        $shop->minorProduct = $request->minorProduct;
        $shop->targetCustomer = $request->targetCustomer;
        $shop->contactNo = $request->contactNo;
        $shop->contactEmail = $request->contactEmail;
        $shop->websiteLink = $request->websiteLink;
        $shop->facebookLink = $request->facebookLink;
        $shop->twitterLink = $request->twitterLink;
        $shop->linkedinLink = $request->linkedinLink;
        $shop->timeOfOperation = $request->timeOfOperation;
        $shop->startTime = $request->startTime;
        $shop->closeTime = $request->closeTime;
        // $user->shop->status = $request->status;

        // create a new unique string for the slug
        $bytes = random_bytes(20);
        $slug = bin2hex($bytes);
        $shop->slug = $slug;

        // check if an image was uploaded        
        if ($request->hasfile('avatarInput')) {
            $file = $request->file('avatarInput');

            $path = $file->store('/avatar/shop', 'uploads');
            $name = $file->getClientOriginalName();
            // store the image path, name and type on the DB
            $attachments = [
                'path' => $path,
                'name' => $name
            ];

            $shop->attachments = $attachments;
        }

       
        
        
        $shop->save();
     
        
        // return response()->json($shop);   
       
        $msg = 'Vendor Information Updated Successfully.'.'<a href="'.route("admin-vendor-index").'">View Vendor Lists</a>';
        return response()->json($msg);   
    }


	//*** POST Request
    public function update(Request $request, $id)
    {
       
        //--- Validation Section

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            // 'email' => 'required|email',
            // 'username' => 'required|string|min:4',
            // 'username' => 'required|string|min:4|unique:users',
            'shopName' => 'required|string|min:6',
            'description' => 'required|string|min:10',
            'founder' => 'string',
            'businessType' => 'string',
            'yearFounded' => 'integer|min:1700|max:' . date("Y"),
            'numberOfBranch' => 'integer',
            'location' => 'string',
            // 'category_id' => 'required|integer',
            'majorProduct' => 'string',
            'minorProduct' => 'string',
            'targetCustomer' => 'string',
            'contactNo' => 'string',
            'contactEmail' => 'email',
            'websiteLink' => 'url',
            'facebookLink' => 'url',
            'twitterLink' => 'url',
            'linkedinLink' => 'url',
            'timeOfOperation' => 'string',
            'startTime' => 'date_format:H:i',
            'closeTime' => 'date_format:H:i|after:startTime',
            'avatarInput' => 'image|max:2048',
        ]);
        
    
        
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        

        $user = User::findOrFail($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        // $user->email = $request->email;
        // $user->username = $request->username;
        $user->is_vendor = $request->is_vendor;
        
        // if($request->password){
        //     $user->password = Hash::make($request->password) ;

        // }
        $user->shop->shopName = $request->shopName;
        $user->shop->description = $request->description;
        $user->shop->founder = $request->founder;
        $user->shop->businessType = $request->businessType;
        $user->shop->yearFounded = $request->yearFounded;
        $user->shop->numberOfBranch = $request->numberOfBranch;
        $user->shop->location = $request->location;
        $user->shop->category_id = $request->category_id;
        $user->shop->majorProduct = $request->majorProduct;
        $user->shop->minorProduct = $request->minorProduct;
        $user->shop->targetCustomer = $request->targetCustomer;
        $user->shop->contactNo = $request->contactNo;
        $user->shop->contactEmail = $request->contactEmail;
        $user->shop->websiteLink = $request->websiteLink;
        $user->shop->facebookLink = $request->facebookLink;
        $user->shop->twitterLink = $request->twitterLink;
        $user->shop->linkedinLink = $request->linkedinLink;
        $user->shop->timeOfOperation = $request->timeOfOperation;
        $user->shop->startTime = $request->startTime;
        $user->shop->closeTime = $request->closeTime;
        $user->shop->status = $request->status;


        // check if an image was uploaded        
        if ($request->hasfile('avatarInput')) {
            $file = $request->file('avatarInput');

            $path = $file->store('/avatar/shop', 'uploads');
            $name = $file->getClientOriginalName();
            // store the image path, name and type on the DB
            $attachments = [
                'path' => $path,
                'name' => $name
            ];

            $user->shop->attachments = $attachments;
        }

       
        
        $user->save();
        $user->shop->save();
        
       
        $msg = 'Vendor Information Updated Successfully.'.'<a href="'.route("admin-vendor-index").'">View Vendor Lists</a>';
        return response()->json($msg);   
    }

	//*** GET Request
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('admin.vendor.show',compact('data'));
    }
    

    //*** GET Request
    public function secret($id)
    {
        Auth::guard('web')->logout();
        $data = User::findOrFail($id);
        Auth::guard('web')->login($data); 
        return redirect()->route('vendor-dashboard');
    }
    
    
   

	//*** GET Request
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->is_vendor = 0;
            

        $user->update();

        // if($user->notivications->count() > 0)
        // {
        //     foreach ($user->notivications as $gal) {
        //         $gal->delete();
        //     }
        // }
            //--- Redirect Section     
            $msg = 'Vendor Deleted Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends    
    }


    
        //*** JSON Request
        public function withdrawdatatables()
        {
             $datas = Withdraw::where('type','=','vendor')->orderBy('id','desc')->get();
             //--- Integrating This Collection Into Datatables
             return Datatables::of($datas)
                                ->addColumn('name', function(Withdraw $data) {
                                    $name = $data->user->name;
                                    return '<a href="' . route('admin-vendor-show',$data->user->id) . '" target="_blank">'. $name .'</a>';
                                }) 
                                ->addColumn('email', function(Withdraw $data) {
                                    $email = $data->user->email;
                                    return $email;
                                }) 
                                ->addColumn('phone', function(Withdraw $data) {
                                    $phone = $data->user->phone;
                                    return $phone;
                                }) 
                                ->editColumn('status', function(Withdraw $data) {
                                    $status = ucfirst($data->status);
                                    return $status;
                                }) 
                                ->editColumn('created_at', function(Withdraw $data) {
                                    $created_at = $data->created_at->diffForHumans();
                                    return $created_at;
                                }) 
                                ->editColumn('amount', function(Withdraw $data) {
                                    $sign = Currency::where('is_default','=',1)->first();
                                    $amount = $sign->sign.round($data->amount * $sign->value , 2);
                                    return $amount;
                                }) 
                                ->addColumn('action', function(Withdraw $data) {
                                    $action = '<div class="action-list"><a data-href="' . route('admin-vendor-withdraw-show',$data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i> Details</a>';
                                    if($data->status == "pending") {
                                    $action .= '<a data-href="' . route('admin-vendor-withdraw-accept',$data->id) . '" data-toggle="modal" data-target="#confirm-delete"> <i class="fas fa-check"></i> Accept</a><a data-href="' . route('admin-vendor-withdraw-reject',$data->id) . '" data-toggle="modal" data-target="#confirm-delete1"> <i class="fas fa-trash-alt"></i> Reject</a>';
                                    }
                                    $action .= '</div>';
                                    return $action;
                                }) 
                                ->rawColumns(['name','action'])
                                ->toJson(); //--- Returning Json Data To Client Side
        }

        //*** GET Request
        public function withdraws()
        {
            return view('admin.vendor.withdraws');
        }

        //*** GET Request       
        public function withdrawdetails($id)
        {
            $sign = Currency::where('is_default','=',1)->first();
            $withdraw = Withdraw::findOrFail($id);
            return view('admin.vendor.withdraw-details',compact('withdraw','sign'));
        }

        //*** GET Request   
        public function accept($id)
        {
            $withdraw = Withdraw::findOrFail($id);
            $data['status'] = "completed";
            $withdraw->update($data);
            //--- Redirect Section     
            $msg = 'Withdraw Accepted Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends   
        }

        //*** GET Request   
        public function reject($id)
        {
            $withdraw = Withdraw::findOrFail($id);
            $account = User::findOrFail($withdraw->user->id);
            // $account->affilate_income = $account->affilate_income + $withdraw->amount + $withdraw->fee;
            $account->update();
            $data['status'] = "rejected";
            $withdraw->update($data);
            //--- Redirect Section     
            $msg = 'Withdraw Rejected Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends   
        }


       

}
