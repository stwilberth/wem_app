<div class="container">
    @if (Auth::user()->hasRole(['admin']))
        @livewire('dashboard.admin')
    @else
        @livewire('dashboard.psico')     
    @endif
</div>
