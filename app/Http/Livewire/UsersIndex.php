<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class UsersIndex extends Component
{
    use WithPagination;
    public $paginate = 5;
    public $search;

    protected $listeners = [
        'userStored' => 'handleStored',
        'userUpdated' => 'handleUpdated'
    ];

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.users-index', [
            'users' => $this->search === null ?
                User::OrderBy('name')->paginate($this->paginate) :
                User::OrderBy('name')->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        $this->emit('getUser', $user);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = User::find($id);
            $data->delete();
            session()->flash('success', 'Pengguna berhasil dihapus.');
        }
    }

    public function handleStored($user)
    {
        session()->flash('success', $user['name'] . ' berhasil ditambahkan.');
    }

    public function handleUpdated($user)
    {
        session()->flash('success', 'Data ' . $user['name'] . ' berhasil diubah.');
    }
}
