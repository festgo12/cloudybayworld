<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
	public function __construct()
	    {
	        $this->middleware('auth:admin');
	    }

	    //*** JSON Request
	    public function datatables()
	    {
	         $datas = Rating::latest()->get();
	         //--- Integrating This Collection Into Datatables
	         return Datatables::of($datas)
	                            ->addColumn('product', function(Rating $data) {
	                                $name = mb_strlen(strip_tags($data->product->name),'utf-8') > 50 ? mb_substr(strip_tags($data->product->name),0,50,'utf-8').'...' : strip_tags($data->product->name);
	                                $product = '<a href="'.route('product.details',$data->product->slug).'" target="_blank">'.$name.'</a>';
	                                return $product;
	                            })
	                            ->addColumn('reviewer', function(Rating $data) {
	                                $name = $data->user->firstname.' '. $data->user->lastname;
									if ($name == 'Deleted Deleted'){
										$name = ' CloudBay';
									}
	                                return $name;
	                            })
	                            ->addColumn('rating', function(Rating $data) {
	                                $stars = $data->rating.' '. 'Stars';
	                                return $stars;
	                            })
	                            ->addColumn('review', function(Rating $data) {
	                                $text = mb_strlen(strip_tags($data->review),'utf-8') > 250 ? mb_substr(strip_tags($data->review),0,250,'utf-8').'...' : strip_tags($data->review);
	                                return $text;
	                            })
	                            ->addColumn('action', function(Rating $data) {
	                                return '<div class="action-list"><a data-href="' . route('admin-rating-show',$data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>Details</a><a href="javascript:;" data-href="' . route('admin-rating-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
	                            }) 
	                            ->rawColumns(['product','action'])
	                            ->toJson(); //--- Returning Json Data To Client Side
	    }
	    //*** GET Request
	    public function index()
	    {
	        return view('admin.rating.index');
	    }

	    //*** GET Request
	    public function show($id)
	    {
	        $data = Rating::findOrFail($id);
	        return view('admin.rating.show',compact('data'));
	    }
	    //*** GET Request
	    public function create(Request $request)
	    {
			$product_id = Product::where('sku','=', $request->sku)->pluck('id')->first();
			$rating = new Rating;
			$rating->user_id = auth()->user()->id;
			$rating->product_id = $product_id;
			$rating->rating = $request->rating;
			$rating->review_date = $request->review_date;
			$rating->save();
	        return redirect()->back();
	    }


	    //*** GET Request Delete
		public function destroy($id)
		{
		    $rating = Rating::findOrFail($id);
		    $rating->delete();
		    //--- Redirect Section     
		    $msg = 'Data Deleted Successfully.';
		    return response()->json($msg);      
		    //--- Redirect Section Ends    
		}

}
