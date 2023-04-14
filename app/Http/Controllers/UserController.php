<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\SpladeToast;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('users.index',[
            'users' => SpladeTable::for($users)
                ->column('name')
                ->rowLink(function (User $user)
                {
                    return route('user.show', $user);
                })
                ->column('email')
                ->column('action'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        return view('users.show',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit(User $user)
    {
        return view('users.edit',[
            'user' => $user,
            'countries' => User::contryOptions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
        ]);

        $user->update($data);

        Splade::Toast('User updated!')->autoDismiss(5);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
