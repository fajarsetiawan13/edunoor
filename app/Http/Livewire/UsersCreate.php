<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsersCreate extends Component
{
    public $name, $username, $role, $is_active;

    public function render()
    {
        return view('livewire.users-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|unique:users',
            'role' => 'required',
            'is_active' => 'required',
        ]);

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make('password'),
            'image' => 'default.webp',
            'role' => $this->role,
            'is_active' => $this->is_active,
        ]);
        $this->emit('userStored', $user);
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->username = null;
        $this->role = null;
        $this->is_active = null;
    }
}
