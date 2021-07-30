<div class="alert alert-danger" role="alert">
    <ol class="list-group" style="margin-left: 10px">
        @foreach ($lista as $item)
            <li>{{ $item }}</li>
        @endforeach
      </ol>
</div>