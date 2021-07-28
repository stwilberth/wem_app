<div class="form-check">
  <input class="form-check-input" 
    type="radio"
    value="0"
    name="{{ $nombre }}"
    wire:model="{{ $wire }}" 
    id="{{ $nombre }}_cero">

  <label class="form-check-label" for="{{ $nombre }}_cero">
    {{ $label }}
  </label>
  
</div>