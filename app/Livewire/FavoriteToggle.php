<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Favorite;

class FavoriteToggle extends Component
{
    public $proudect;
    public $isFavorite = false;

    public function mount($proudect)
    {
        $this->proudect = $proudect;
        $this->isFavorite = Favorite::where('user_id', auth()->id())
            ->where('proudect_id', $proudect->id)
            ->exists();
    }

    public function toggle()
    {
        $userId = auth()->id();

        $favorite = Favorite::where('user_id', $userId)
            ->where('proudect_id', $this->proudect->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $this->isFavorite = false;
        } else {
            Favorite::create([
                'user_id'    => $userId,
                'proudect_id'=> $this->proudect->id,
            ]);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.favorite-toggle');
    }
}
