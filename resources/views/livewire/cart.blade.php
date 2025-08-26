<button 
    wire:click="toggleCart" 
    class="btn {{ $inCart ? 'btn-danger' : 'btn-success' }}">
    {{ $inCart ? 'Remove from Cart' : 'Add to Cart' }}
</button>