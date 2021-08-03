@foreach ($roles as $role)
  @php
      $checked = 0;
  @endphp
  @foreach ($asignados as $item)
    @php
      if ($role->name == $item) {
        $checked = 1;
      }
    @endphp
  @endforeach
  <div class="form-check">
    <input class="form-check-input" 
      type="checkbox" 
      name="role_{{ $role->id }}" 
      id="role_{{ $role->id }}" 
      {{ ($checked)?'checked':''}}
      wire:change="roleChange('{{ $role->name }}', {{ $checked }})">
    <label class="form-check-label" for="role_{{ $role->id }}">
      {{ $role->name }}
    </label>
  </div>
@endforeach
