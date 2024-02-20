@include('membros.template.menu')
@yield('content')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .no-members {
        font-style: italic;
    }
</style>

@isset($response)
<h5 style="padding-left: 200px;margin-top: 5px;"> Tabela com lista de logins </h5>
    <table style="margin-top: 100px;margin-right: 10px;" >
        <thead >
            <tr>
                <th>Email</th>
                <th>Senha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($response as $login)
                <tr>
                    <td>{{$login->Email}}</td>
                    <td>{{$login->Senha}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhum membro disponível!</p>
@endisset
