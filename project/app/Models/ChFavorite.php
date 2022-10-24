<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use App\Models\ChFavorite as Favorite;
use Illuminate\Database\Eloquent\Model;

class ChFavorite extends Model
{
    

    /**
     * Check if a user in the favorite list
     *
     * @param int $user_id
     * @return boolean
     */
    public static function inFavorite($user_id){
        return Favorite::where('user_id', Auth::user()->id)
                        ->where('favorite_id', $user_id)->count() > 0
                        ? true : false;

    }

    /**
     * Make user in favorite list
     *
     * @param int $user_id
     * @param int $star
     * @return boolean
     */
    public static function makeInFavorite($user_id, $action){
        if ($action > 0) {
            // Star
            $star = new Favorite();
            $star->id = rand(9,99999999);
            $star->user_id = Auth::user()->id;
            $star->favorite_id = $user_id;
            $star->save();
            return $star ? true : false;
        }else{
            // UnStar
            $star = Favorite::where('user_id',Auth::user()->id)->where('favorite_id',$user_id)->delete();
            return $star ? true : false;
        }
    }
}
