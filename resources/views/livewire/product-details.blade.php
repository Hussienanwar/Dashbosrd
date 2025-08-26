<div class="d-flex flex-column align-items-center gap-3 mb-3">
    {{-- Quantity --}}
    <div class="input-group" style="width: 150px;">
        <button type="button" class="btn btn-outline-secondary btn-sm" wire:click="decreaseQuantity">-</button>
        <input type="number" wire:model="quantity" min="1" class="form-control text-center">
        <button type="button" class="btn btn-outline-secondary btn-sm" wire:click="increaseQuantity">+</button>
    </div>

    {{-- Cart --}}
    <button wire:click="toggleCart" class="btn {{ $inCart ? 'btn-danger' : 'btn-success' }}">
        {{ $inCart ? 'Remove from Cart' : 'Add to Cart' }}
    </button>

    {{-- Favorite --}}
    <button wire:click="toggleFavorite" class="btn btn-light border">
        <i class="bi {{ $isFavorite ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
        {{ $isFavorite ? 'Remove from Wishlist' : 'Add to Wishlist' }}
    </button>
</div>
