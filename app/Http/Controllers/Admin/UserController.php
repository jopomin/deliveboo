<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function valida(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'reference_name' => 'required|max:255',
            'vat_number' => 'required|size:11',
            'address' => 'required|max:255'
        ]);
    }

    public function index() {
        $user = Auth::user();
        return view('admin.users.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $this->valida($request);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->reference_name = $data['reference_name'];
        $user->vat_number = $data['vat_number'];
        $user->image = $data['image'];
        $user->update($data);

        return redirect()->route('admin.users.index')->with('info', 'Utente modificato');
    }
}
