<div class="mb-3">
    @if ($label)<label for="{{ $id }}" class="form-label">{{ $label }}</label>@endif
    <input type="{{ $type }}" id="{{ $id }}" class="form-control" @if ($placeholder) placeholder="{{ $placeholder }}" @endif wire:model.lazy="{{ $wire }}">
</div>
