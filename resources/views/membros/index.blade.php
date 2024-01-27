@if(isset($membros))
    @foreach($membros as $membro)
        <p>Matrícula: {{ $membro->Matricula }}</p>
        <p>Função: {{ $membro->Funcao }}</p>
        <!-- Adicione outros campos conforme necessário -->
    @endforeach
@else
    <p>Nenhum membro disponível!</p>
@endif