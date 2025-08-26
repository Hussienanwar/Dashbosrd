<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteList extends Component
{
    public $favorites = [];

    public function mount()
    {
        $this->loadFavorites();
    }

    public function loadFavorites()
    {
        $this->favorites = Favorite::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function remove($id)
    {
        Favorite::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        $this->loadFavorites();

        
    }

    public function render()
    {
        return view('livewire.favorite-list');
    }
}
