<ul>
    @foreach ($grupos as $grupo)
        <li>{{ $grupo->name }}</li>
    @endforeach
</ul>