@if(isset($membros))
    @foreach($membros as $membro)
        <p><a href="{{ route('membros.show', ['id' => $membro->id]) }}">{{ $membro->PrimeiroNome }}</a></p>
        <p>Matrícula: {{ $membro->Matricula }}</p>
        <p>Função: {{ $membro->Funcao }}</p>
        <!-- Adicione outros campos conforme necessário -->
    @endforeach
@else
    <p>Nenhum membro disponível!</p>
@endif