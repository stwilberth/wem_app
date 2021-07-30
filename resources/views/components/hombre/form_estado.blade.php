@switch($form)
    @case('sin_iniciar')                                
        <span class="text-danger">Sin iniciar</span>
        @break
    @case('editando')
        <span class="text-warning">Editando</span>
        @break
    @case('finalizado')
        <span class="text-success">Finalizado</span>
        @break                                                                                                            
    @default
        -   
@endswitch