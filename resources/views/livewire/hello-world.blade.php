<div>
<input wire:model.lazy="name" type="text">
<input wire:model="loud" type="checkbox">
<select wire:model="greeting">
<option>Hello</option>
<option>Goodbye</option>
<option>Adios</option>
</select>
    <h1>{{ $greeting}} {{ $name}} @if($loud) checked! @endif</h1>
</div>
