<div>
   <div>
    <h2>Batterie: {{ $carCountElectric }}</h2>
    <button wire:click="incrementElectric">+</button>
</div>
<div>
    <h2>Benziner: {{ $carCountGas }}</h2>
    <button wire:click="incrementGas">+</button>
</div>
</div>
