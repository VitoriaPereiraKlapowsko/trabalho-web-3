<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::all();  
        return view('users.index', compact('users')); 
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);  
        return view('users.edit', compact('user'));  
    }

    /**
     * Update the specified user in the database.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telefone' => 'required|string|max:15',
            'cpf' => 'required|string|max:14',
        ]);

        $user->fill($validated);
        $user->save();

        return redirect()->route('users.index')->with('status', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();  

        return redirect()->route('users.index')->with('status', 'Usuário deletado com sucesso!');
    }
}
