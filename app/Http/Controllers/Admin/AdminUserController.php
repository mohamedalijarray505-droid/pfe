<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AdminUserController extends Controller
{
   public function index()
    {
        $users = User::all(); 

        return view('admin.users.index', compact('users')); 
        
    }

    public function changeRole(User $user)
    {
        $user->update([
            'role' => $user->role === 'admin' ? 'user' : 'admin'
        ]);

        return back();
    }
      public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès.');
    }
}