<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        /**
         * Redirect user to update 
         * profile if the required 
         * data is missing.
         */
        if (!($user->homeAddress) || !($user->contactNo)) {
            return redirect('/editProfile?force=1');
        }
        return view('profile.profile')->with('user', $user);
    }

    public function editProfile()
    {   
        // return the view with the authenticated user
        $user = Auth::user();
        return view('profile.editProfile')->with('user', $user);
    }

    public function apiGetProfile($userId)
    {
        $user = User::find($userId);
        return $user;
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
}