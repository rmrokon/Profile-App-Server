<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $includeAttributes = $request->query('includeAttributes');
        if ($includeAttributes) {
            $profiles = DB::table('profiles')->join('profile_attributes', 'profiles.id', '=', 'profile_attributes.profile_id')->get();
            return $profiles;
        }

        return Profile::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'user_id' => 'required'
        ]);

        return Profile::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Profile::find($id);
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
        $profile = Profile::find($id);
        $profile->update($request->all());
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Profile::destroy($id);
    }

    /**
     * search profile with user_id.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function search($user_id)
    {
        return Profile::where('user_id', $user_id)->get();
    }
    /**
     * search profile with username.
     *
     * @param  str  $username
     * @return \Illuminate\Http\Response
     */
    public function searchWithUsername($username)
    {
        return Profile::where('username', $username)->get();
    }
}
