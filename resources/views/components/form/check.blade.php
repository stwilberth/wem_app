<div class="form-check">
    <input class="form-check-input" 
      type="{{ $type }}"
      @if ($type == 'radio' && $value)
        value="{{ $value }}"
      @endif
      @if ($nombre)
        name="{{ $nombre }}"
      @endif
      wire:model="{{ $wire }}" 
      id="{{ $id }}">

    <label class="form-check-label" for="{{ $id }}">
      {{ $label }}
    </label>
    
</div>