<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    //

      // CATEGORIES SECTOPN

      public function categories()
      {
          return view('front.product.index');
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
        $minprice = $request->min;
        $maxprice = $request->max;
        $sort = $request->sort;
        $search = $request->search;
        $minprice = round(($minprice / $curr->value),2);
        $maxprice = round(($maxprice / $curr->value),2);
  
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
                                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)' , array($search));
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
        }
        
        $data['prods'] = $prods;

  
        if($request->ajax()) {
  
        $data['ajax_check'] = 1;
  
          return $data;
        }
        return view('front.product.index', compact('data'));
      }
  
  
      public function getsubs(Request $request) {
        $category = Category::where('slug', $request->category)->firstOrFail();
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        return $subcategories;
      }
 
         


}
