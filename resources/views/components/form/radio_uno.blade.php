<div class="form-check">
    <input class="form-check-input" 
      type="radio"
      value="1"
      name="{{ $nombre }}"
      wire:model="{{ $wire }}" 
      id="{{ $nombre }}_uno">

    <label class="form-check-label" for="{{ $nombre }}_uno">
      {{ $label }}
    </label>
    
</div>