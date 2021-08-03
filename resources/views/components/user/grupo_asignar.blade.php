@foreach ($grupos as $grupo)
  @php
      $checked = 0;
  @endphp
  @foreach ($asignados as $item)
    @php
        if ($grupo->id == $item->id) {
          $checked = 1;
        }
    @endphp
  @endforeach
  <div class="form-check">
    <input type="checkbox" class="form-check-input" 
      name="{{ $grupo->id }}" 
      id="{{ $grupo->id }}" 
      {{ ($checked)?'checked':''}}
      wire:change="grupoChange({{ $grupo->id }}, {{ $checked }})">
    <label class="form-check-label" for="{{ $grupo->id }}">
      {{ $grupo->name }}
    </label>
  </div>
@endforeach
