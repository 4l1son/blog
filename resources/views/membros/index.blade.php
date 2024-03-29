  @include('membros.template.menu')
  @yield('content')
    <table>
        <thead>
            <tr>
            Nome
            </tr>
            <tr>
            Matricula
            </tr>
            <tr>
            Função
            </tr>
        </thead>
@if(isset($membros))
    @foreach($membros as $membro)
        <p>Nome: {{ $membro->PrimeiroNome }}</p>
        <p>Matrícula: {{ $membro->Matricula }}</p>
        <p>Função: {{ $membro->Funcao }}</p>
    @endforeach
@else
    <p>Nenhum membro disponível!</p>
@endif