<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        
        $params = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:rfc',
            'password' => 'nullable|min:5',
            'profile_pic' => 'nullable|file|max:10000'
        ]);

        if(!$params['password']){
            //se l'utemte non fornisce la nuova password verrà assegnata quella recedente
            $params['password'] = $user->password;
        }else{
            $params['password'] = Hash::make($params['password']);
        }

        if(array_key_exists('profile_pic', $params)){
            
            Storage::delete($user->profile_pic);
            $profile_pic_path = Storage::put('profile_pics', $params['profile_pic']);
            $params['profile_pic'] = $profile_pic_path;

        } else{
            $params['profile_pic'] = $user->profile_pic;
        }

        $user->update($params);

        return redirect()->route('admin.user.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
