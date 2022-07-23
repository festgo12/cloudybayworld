<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Follow;

class UserProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        /**
         * Redirect user to update 
         * profile if the required 
         * data is missing.
         */
        // if (!($user->homeAddress) || !($user->contactNo)) {
        //     return redirect('/editProfile?force=1');
        // }
        return view('profile.profile')->with('user', $user);
    }

    public function editProfile()
    {   
        // return the view with the authenticated user
        $user = Auth::user();
        return view('profile.editProfile')->with('user', $user);
    }

    public function apiGetProfileByUsername($username){
        $user = User::where('username', $username)->first();
        return ($user) ? $user : 0;
    }

    public function apiGetProfile($userId)
    {
        $user = User::find($userId);
        return ($user) ? $user : 0;
    }

    public function apiEditProfile(Request $request, $userId)
    {   
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false); 

        // validate the sent request parameters using the following rules
        $validator = Validator::make($request->all(), [ 
            'username' => 'string|unique:users, username|min:6',
            'email' => 'email|exists:users, email|max:50',
            'firstname' => 'string|min:2|max:50',
            'lastname' => 'string|min:2|max:50',
            'userBio' => 'string',
            'contactNo' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'websiteUrl' => 'url',
            'companyName' => 'string|min:2|max:50',
            'homeAddress' => 'string',
            'city' => 'string|min:2|max:50',
            'zipCode' => 'string',
            'aboutUser' => 'string',
        ]);

        /**
         * Set error true if the rules are not followed 
         * Set the error message from the validator to the response object
         */
        if ($validator->fails()) {
            $response['message'] = implode("<br>",$validator->messages()->all());
            $response['error'] = true;        
        }else {        
            //process the request   
            $user = User::find($userId);
            // loop through and save the sent request values
            foreach ($request->all() as $key => $value) {
                $user->$key = $value;
            }
            $user->save();
            // set response message to success
            $response['message'] = "User credentials updated successfully";     
        }

        return $response;
    }

    public function updateAvatar(Request $request, $userId)
    {
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);

        $validator = Validator::make($request->all(), [
            'avatarInput' => 'required|image|max:2048',
        ]);

        /**
         * Set error true if the rules are not followed 
         * Set the error message from the validator to the response object
         */
        if ($validator->fails()) {
            $response['message'] = implode("<br>",$validator->messages()->all());
            $response['error'] = true;        
        }else {        
            //process the request   
            $user = User::find($userId);
            
            // check if an image was uploaded        
            if ($request->hasfile('avatarInput')) {
                $file = $request->file('avatarInput');

                $path = $file->store('/avatar', 'uploads');
                $name = $file->getClientOriginalName();
                // store the image path, name and type on the DB
                $attachments = [
                    'path' => $path,
                    'name' => $name
                ];
                
                $user->attachments = $attachments;
            }
            

            $user->save();
            // set response message to success
            $response['message'] = "Profile photo updated!";     
        }

        return $response;
    }

    public function follow(Request $request)
    {
        $user = User::find($request->post('userId'));
        $follower = User::where('username', $request->post('followerUsername'))->first();
        
        // do not allow user follow him/her self
        if($user->id == $follower->id){
            return 0;
        }
        // follow only the user have not been followed before
        if(!$user->following()->where('following_user_id', $follower->id)->exists()){
            return $user->follow($follower);
        }else{
            // unfollow user if already following
            $follow = Follow::where([
                ['following_user_id', '=', $follower->id],
                ['user_id', '=', $user->id]
                ])->first()
                ->delete();
            return 0;
        }
    }

    public function isFollowing($userId, $username)
    {
        $authUser = User::find($userId);
        $viewUser = User::where('username', $username)->first();

        return $authUser->following()->where('following_user_id', $viewUser->id)->count();
    }

    /**
     * This function returns the number of 
     * followers a user has
     */
    public function followers($username)
    {
        $user = User::where('username', $username)->first();
        return $user->followers->count();
    }

    /**
     * This function returns the number of 
     * people following a user
     */
    public function following($username)
    {
        $user = User::where('username', $username)->first();
        return $user->following->count();
    }
}