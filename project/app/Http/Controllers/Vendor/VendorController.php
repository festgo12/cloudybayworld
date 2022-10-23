<?php

namespace App\Http\Controllers\Vendor;

use DB;
use Auth;
use Session;
use Validator;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\VendorOrder;
use App\Models\Verification;

use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

           
    }

    //*** GET Request
    public function index()
    {
        $user = Auth::user();  
        $pending = VendorOrder::where('user_id','=',$user->id)->where('status','=','pending')->get(); 
        $processing = VendorOrder::where('user_id','=',$user->id)->where('status','=','processing')->get(); 
        $completed = VendorOrder::where('user_id','=',$user->id)->where('status','=','completed')->get(); 
        return view('vendor.index',compact('user','pending','processing','completed'));
    }

    public function profileupdate(Request $request)
    {
       
         //--- Validation Section

         $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'shopName' => 'required|string|min:6',
            'description' => 'required|string|min:10',
            'founder' => 'string',
            'businessType' => 'string',
            'yearFounded' => 'integer|min:1700|max:' . date("Y"),
            'numberOfBranch' => 'integer',
            'location' => 'string',
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
            'coverImage' => 'image|max:2048',
        ]);
        
    
        
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        //--- Validation Section Ends
        

        $user = User::findOrFail(Auth::user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
       
        $user->is_vendor = $request->is_vendor;
        
       
        $user->shop->shopName = $request->shopName;
        $user->shop->description = $request->description;
        $user->shop->founder = $request->founder;
        $user->shop->businessType = $request->businessType;
        $user->shop->yearFounded = $request->yearFounded;
        $user->shop->numberOfBranch = $request->numberOfBranch;
        $user->shop->location = $request->location;
        $user->shop->degree = $request->degree;
        $user->shop->profession = $request->profession;
        $user->shop->skill = $request->skill;
        $user->shop->experience = $request->experience;
        $user->shop->achievements = $request->achievements;
        $user->shop->fieldsOfInterest = $request->fieldsOfInterest;
        $user->shop->partners = $request->partners;
        $user->shop->recommendation = $request->recommendation;
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

        // check if an coverimage was uploaded        
        if ($request->hasfile('coverImage')) {
            $file = $request->file('coverImage');

            
            $path = $file->store('/avatar/cover', 'uploads');
            $name = $file->getClientOriginalName();
               
                
            $user->shop->coverImage = $path;
               
        }

       
        
        $user->save();
        $user->shop->save();
        
       
        $msg = 'Vendor Information Updated Successfully.'.'<a href="'.route("admin-vendor-index").'">View Vendor Lists</a>';
        return response()->json($msg); 
    }

  

    //*** GET Request
    public function profile()
    {
        $data = Auth::user();  
        return view('vendor.profile',compact('data'));
    }

    //*** GET Request
    public function ship()
    {
        $gs = Generalsetting::find(1);
        // if($gs->vendor_ship_info == 0) {
        //     return redirect()->back();
        // }
        $data = Auth::user();  
        return view('vendor.ship',compact('data'));
    }

    //*** GET Request
    public function banner()
    {
        $data = Auth::user();  
        return view('vendor.banner',compact('data'));
    }

 

    //*** GET Request
    public function subcatload($id)
    {
        $cat = Category::findOrFail($id);
        return view('load.subcategory',compact('cat'));
    }

    //*** GET Request
    public function childcatload($id)
    {
        $subcat = Subcategory::findOrFail($id);
        return view('load.childcategory',compact('subcat'));
    }

   

}
