<button wire:click="toggle"
        type="button"
        class="position-absolute top-0 end-0 m-2 wishlist-btn border-0 bg-transparent">
    <i class="bi {{ $isFavorite ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
</button>