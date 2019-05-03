<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Country;
use App\Continent;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('profile.index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->sortBy('name');

        return view('profile.create')->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
                        array(
                            'first_name' => 'required', 
                            'middle_name' => 'required',
                            'last_name' => 'required',
                            'age' => 'required',
                            'gender' => 'required',
                            'birth_date' => 'required',
                            'phone_number' => 'required',
                            'home_address' => 'required',
                            'user_image' => 'image|nullable|max:1999',
                        ));

        if ($request->hasFile('user_image')) {
            $fileNameExtension = $request->file('user_image')->getClientOriginalName();
            $fileName = pathInfo($fileNameExtension, PATHINFO_FILENAME);
            $extension = $request->file('user_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('user_image')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $userInfo = new UserInfo;
        $userInfo->first_name = $request->input('first_name');
        $userInfo->middle_name = $request->input('middle_name');
        $userInfo->last_name = $request->input('last_name');
        $userInfo->age = $request->input('age');
        $userInfo->gender = $request->input('gender');
        $userInfo->birth_date = $request->input('birth_date');
        $userInfo->phone_number = $request->input('phone_number');
        $userInfo->home_address = $request->input('home_address');
        $userInfo->country_id = $request->input('country');
        $userInfo->user_image = $fileNameToStore;
        $userInfo->save();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->user_info_id = $userInfo->id;
        $user->save();

        return redirect('/profile')->with('success', 'Profile Information Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $countries = Country::all()->sortBy('name');

        return view('profile.edit')->with(['user' => $user, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('user_image')) {
            $fileNameExtension = $request->file('user_image')->getClientOriginalName();
            $fileName = pathInfo($fileNameExtension, PATHINFO_FILENAME);
            $extension = $request->file('user_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('user_image')->storeAs('public/profile_images', $fileNameToStore);
        }

        $userInfo = UserInfo::find($id);
        $userInfo->first_name = $request->input('first_name');
        $userInfo->middle_name = $request->input('middle_name');
        $userInfo->last_name = $request->input('last_name');
        $userInfo->age = $request->input('age');
        $userInfo->gender = $request->input('gender');
        $userInfo->birth_date = $request->input('birth_date');
        $userInfo->phone_number = $request->input('phone_number');
        $userInfo->home_address = $request->input('home_address');
        $userInfo->country_id = $request->input('country');

        if ($request->hasFile('user_image')) {
            $userInfo->user_image = $fileNameToStore;
        }

        $userInfo->save();

        return redirect('/profile')->with('success', 'Profile Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
