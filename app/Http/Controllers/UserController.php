<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    
    public function frontend() {
        return view( 'admin.users.index' );
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get All Query String Values
        $search = $request->query('search');
        $per_page = $request->query('per_page');
        $role = $request->query('role');

        if( !empty($role) ) {
            $users = User::where('name', 'like', '%'.$search.'%')
                        ->where('role', '=', $role)
                        ->orderBy('id', 'asc')
                        ->paginate($per_page);
        }else {
            $users = User::where('name', 'like', '%'.$search.'%')
                        ->orderBy('id', 'asc')
                        ->paginate($per_page);
        }

        return UserResource::collection($users);
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
        if( $request->isMethod('put') ) {
            $user = User::findOrFail($request->userId);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
        }else {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->password = bcrypt( $request->input('password') );
        }
        if( $user->save() ) {
            return new UserResource($user);
        }
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
        //
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
        $user = User::findOrFail($id);

        if( $user->delete() ) {
            return new UserResource($user);
        }
    }
}
