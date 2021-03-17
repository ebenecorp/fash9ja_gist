<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;

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
        return view('users.index')->withUsers(User::all());
    }

    /**
     * Change the role of a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeAdmin(User $user)
    {
        if($user->role === 'admin'){
            $user->role = 'writer';
        }else{
            $user->role = 'admin';
        }
        $user->save();

        session()->flash('message', 'Role of user has been successfully changed');

        return redirect(route('users.index'));
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
    public function edit()
    {
        return view('users.edit')->withUser(auth()->user());
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('message', 'User Profile has been successfully Updated');

        return redirect()->back();
        //
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
