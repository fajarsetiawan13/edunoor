<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersUpdate extends Component
{
    public $name, $username, $role, $is_active, $userId;

    protected $listeners = [
        'getUser' => 'showUser'
    ];

    public function render()
    {
        return view('livewire.users-update');
    }

    public function showUser($user)
    {
        $this->userId = $user['id'];
        $this->name = $user['name'];
        $this->username = $user['username'];
        $this->role = $user['role'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required',
            'role' => 'required',
            'is_active' => 'required',
        ]);

        if ($this->userId) {
            $user = User::find($this->userId);
            $user->update([
                'name' => $this->name,
                'username' => $this->username,
                'role' => $this->role,
                'is_active' => $this->is_active
            ]);

            $this->resetInput();
            $this->emit('userUpdated', $user);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->username = null;
        $this->role = null;
        $this->is_active = null;
    }
}
