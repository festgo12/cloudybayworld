<?php

namespace App\Http\Controllers\Product;

use App\Models\Shop;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Wishlist;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    //

      // CATEGORIES SECTOPN

      public function categories()
      {
          return view('product.index');
      }
  
      // -------------------------------- CATEGORY SECTION ----------------------------------------
      //
      // 
  
      // -------------------------------- CATEGORY SECTION ----------------------------------------
  
      public function category(Request $request, $slug=null, $slug1=null, $slug2=null)
      {
        if (Session::has('currency')) 
        {
          $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        $cat = null;
        $subcat = null;
        $childcat = null;
        $minprice = str_replace(' ','',$request->min);
        $maxprice = str_replace(' ','',$request->max);
        
        $sort = $request->sort;
        $search = $request->search;
        $minprice = round((intval($minprice )/ $curr->value),2);
        $maxprice = round((intval($maxprice) / $curr->value),2);
       

        if (!empty($slug)) {
          $cat = Category::where('slug', $slug)->firstOrFail();
          $data['cat'] = $cat;
        }
        if (!empty($slug1)) {
          $subcat = Subcategory::where('slug', $slug1)->firstOrFail();
          $data['subcat'] = $subcat;
        }
        if (!empty($slug2)) {
          $childcat = Childcategory::where('slug', $slug2)->firstOrFail();
          $data['childcat'] = $childcat;
        }
  
        $prods = Product::when($cat, function ($query, $cat) {
                                        return $query->where('category_id', $cat->id);
                                    })
                                    ->when($subcat, function ($query, $subcat) {
                                        return $query->where('subcategory_id', $subcat->id);
                                    })
                                    ->when($childcat, function ($query, $childcat) {
                                        return $query->where('childcategory_id', $childcat->id);
                                    })
                                    ->when($search, function ($query, $search) {
                                        return $query->where('name', 'like', '%' . $search . '%')->orWhere('details', 'like', '%' . $search . '%');
                                    })
                                    ->when($minprice, function($query, $minprice) {
                                      return $query->where('price', '>=', $minprice);
                                    })
                                    ->when($maxprice, function($query, $maxprice) {
                                      return $query->where('price', '<=', $maxprice);
                                    })
                                     ->when($sort, function ($query, $sort) {
                                        if ($sort=='date_desc') {
                                          return $query->orderBy('id', 'DESC');
                                        }
                                        elseif($sort=='date_asc') {
                                          return $query->orderBy('id', 'ASC');
                                        }
                                        elseif($sort=='price_desc') {
                                          return $query->orderBy('price', 'DESC');
                                        }
                                        elseif($sort=='price_asc') {
                                          return $query->orderBy('price', 'ASC');
                                        }
                                     })
                                    ->when(empty($sort), function ($query, $sort) {
                                        return $query->orderBy('id', 'DESC');
                                    });
  
                                    $prods = $prods->where(function ($query) use ($cat, $subcat, $childcat, $request) {
                                                $flag = 0;
  
                                                if (!empty($cat)) {
                                                  foreach ($cat->attributes as $key => $attribute) {
                                                    $inname = $attribute->input_name;
                                                    $chFilters = $request["$inname"];
                                                    if (!empty($chFilters)) {
                                                      $flag = 1;
                                                      foreach ($chFilters as $key => $chFilter) {
                                                        if ($key == 0) {
                                                          $query->where('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                                                        } else {
                                                          $query->orWhere('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                                                        }
  
                                                      }
                                                    }
                                                  }
                                                }
  
  
                                                if (!empty($subcat)) {
                                                  foreach ($subcat->attributes as $attribute) {
                                                    $inname = $attribute->input_name;
                                                    $chFilters = $request["$inname"];
                                                    if (!empty($chFilters)) {
                                                      $flag = 1;
                                                      foreach ($chFilters as $key => $chFilter) {
                                                        if ($key == 0 && $flag == 0) {
                                                          $query->where('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                                                        } else {
                                                          $query->orWhere('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                                                        }
  
                                                      }
                                                    }
  
                                                  }
                                                }
  
  
                                                if (!empty($childcat)) {
                                                  foreach ($childcat->attributes as $attribute) {
                                                    $inname = $attribute->input_name;
                                                    $chFilters = $request["$inname"];
                                                    if (!empty($chFilters)) {
                                                      $flag = 1;
                                                      foreach ($chFilters as $key => $chFilter) {
                                                        if ($key == 0 && $flag == 0) {
                                                          $query->where('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                                                        } else {
                                                          $query->orWhere('attributes', 'like', '%'.'"'.$chFilter.'"'.'%');
                                                        }
  
                                                      }
                                                    }
  
                                                  }
                                                }
                                            });
  
  
                                    $prods = $prods->where('status', 1)->paginate(15);

        foreach($prods as $product){
          $product->showprice = $product->showPrice();
          $product->showprevprice = $product->showpreviousPrice();
          $product->rating = Rating::rating($product->id);
          $product->is_wish = count(Wishlist::where('user_id', Auth::user()->id)->where('product_id', $product->id)->get());
        }

        $newProducts = Product::where('status', 1)->orWhere('latest', 1)->latest()->take(3)->get();
        $newProducts2 = Product::where('status', 1)->orWhere('latest', 1)->latest()->take(3)->get();

        $cats = Category::where('status', 1)->get() ;

        foreach($cats as $cat){

          $cat->subcats = $cat->subs ;
          
          foreach($cat->subcats as $subs){
            $subs->childs = $subs->childs ;

          }
        }

        $subcats = '' ;
        $childcats = '' ;
        $category = $cat;
        if($category){
         $subcats = Subcategory::where('status', 1)->where('category_id', $category->id)->get() ;

        }
        if($subcat){
          $childcats = Childcategory::where('status', 1)->where('subcategory_id', $subcat->id)->get() ;

        }
        
        $data['prods'] = $prods;

        
        if($request->ajax()) {
  
         $data['ajax_check'] = 1;
          // dd($data);
          return $data;
        }
        //  dd($cats, $subcats, $childcats);
        
        return view('product.index', compact('data','newProducts', 'newProducts2', 'cats', 'category', 'subcats','subcat', 'childcats', 'slug','slug1'));
      }

 // ------------------ Shop Product SECTION --------------------



      public function marketProduct(Request $request,$slug)
      {
        $shop = Shop::where('slug', $slug)->first();

        if (Session::has('currency')) 
        {
          $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        
        $minprice = str_replace(' ','',$request->min);
        $maxprice = str_replace(' ','',$request->max);
        
        $sort = $request->sort;
        $search = $request->search;
        $minprice = round((intval($minprice )/ $curr->value),2);
        $maxprice = round((intval($maxprice) / $curr->value),2);

        // dd($shop);


        if($shop)
        {


        $prods = Product::where('shop_id', $shop->id)->when($search, function ($query, $search) {
          return $query->where('name', 'like', '%' . $search . '%')->orWhere('details', 'like', '%' . $search . '%');
      })
      ->when($minprice, function($query, $minprice) {
        return $query->where('price', '>=', $minprice);
      })
      ->when($maxprice, function($query, $maxprice) {
        return $query->where('price', '<=', $maxprice);
      })
       ->when($sort, function ($query, $sort) {
          if ($sort=='date_desc') {
            return $query->orderBy('id', 'DESC');
          }
          elseif($sort=='date_asc') {
            return $query->orderBy('id', 'ASC');
          }
          elseif($sort=='price_desc') {
            return $query->orderBy('price', 'DESC');
          }
          elseif($sort=='price_asc') {
            return $query->orderBy('price', 'ASC');
          }
       })
      ->when(empty($sort), function ($query, $sort) {
          return $query->orderBy('id', 'DESC');
      })
      ->where('status', 1)->paginate(5);


          foreach($prods as $product){
            $product->showprice = $product->showPrice();
            $product->showprevprice = $product->showpreviousPrice();
            $product->rating = Rating::rating($product->id);
            $product->is_wish = count(Wishlist::where('user_id', Auth::user()->id)->where('product_id', $product->id)->get());
          }
  
          $newProducts = Product::where('status', 1)->orWhere('latest', 1)->latest()->take(5)->get();
          $newProducts2 = Product::where('status', 1)->orWhere('latest', 1)->latest()->take(5)->get();
          
          $data['prods'] = $prods;
  
          
          if($request->ajax()) {
    
           $data['ajax_check'] = 1;
            // dd($data);
            return $data;
          }
          //  dd($data, $prods);

          return view('shop.marketProducts', compact('shop','data', 'newProducts', 'newProducts2'));
        }
        return redirect()->route('home')->with('Shop not Found');
      }
  
  
      public function getsubs(Request $request) {
        $category = Category::where('slug', $request->category)->firstOrFail();
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        return $subcategories;
      }
 
         

         // ------------------ Rating SECTION --------------------

         public function reviewsubmit(Request $request)
         {
          
             $ck = 0;
             $orders = Order::where('user_id','=',$request->user_id)->where('status','=','completed')->get();

             foreach($orders as $order)
             {
             $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
                 foreach($cart->items as $product)
                 {
                     if($request->product_id == $product['item']['id'])
                     {
                         $ck = 1;
                         break;
                     }
                 }
             }
             if($ck == 1)
             {
                 $user = Auth::guard('web')->user();
                 $prev = Rating::where('product_id','=',$request->product_id)->where('user_id','=',$user->id)->get();
                 if(count($prev) > 0)
                 {
                 return response()->json(array('errors' => [ 0 => 'You Have Reviewed Already.' ]));
                 }
                 $Rating = new Rating;
                 $Rating->product_id = $request->product_id;
                 $Rating->user_id = $request->user_id;
                 $Rating->rating = $request->rating;
                 $Rating->review = $request->review;
                 $Rating['review_date'] = date('Y-m-d H:i:s');
                 $Rating->save();
                 $data[0] = 'Your Rating was Successfully.';
                 $data[1] = Rating::rating($request->product_id);
                 return response()->json($data);
             }
             else{
                 return response()->json(array('errors' => [ 0 => 'Buy This Product First' ]));
             }
         }
 
 
         public function reviews($id){
             $productt = Product::find($id);
             return view('load.reviews',compact('productt','id'));
 
         }


}
