<div id="menu">
        <nav class="menu-item">
            <a href="{{ route('membros.get') }}"> 
                <p>Lista de Membros</p>
            </a>
        </nav>

        <nav class="menu-item">
            <a href="{{ route('membros.create') }}">
                <p>Cadastrar Membros</p>
            </a>
        </nav>

        <div class="menu-item">
            <p>
                <a href="{{ route('login') }}">     
                    Sair
                </a>
            </p>
        </div>
    </div>

    <div style="margin-left: 550px;">
        <h1>Lista de Membros</h1>
        <form action="{{ route('membros.filtro') }}" method="post" onsubmit="filtrarDados()">
            @csrf <!-- Add the CSRF token for Laravel -->
            <input type='text' placeholder="Pesquise os membros pela matricula" name="Matricula" />
            <button type="submit">Enviar</button>
        </form>

        @if(isset($membros))
            @foreach($membros as $membro)
                <p>Membro nome: {{ $membro->PrimeiroNome }}</p>
                <p>Matrícula: {{ $membro->Matricula }}</p>
                <p>Função: {{ $membro->Funcao }}</p>
                <hr>
            @endforeach
        @else
            <p>Nenhum membro disponível!</p>
        @endif
    </div>

    <script>
    function filtrarDados() {
        event.preventDefault();
        var inputValor = document.querySelector('input[name="Matricula"]').value;
        console.log(inputValor);
        document.forms[0].submit();
    }
</script>

<style>
.content{
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            margin: 0;
            padding: 0;
    
}
p.{

}
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            margin: 0;
            padding: 0;
        }

        #menu {
            width: 200px;
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
            height: 100vh; /* altura total da viewport */
            position: fixed; /* fixa o menu para não rolar com a página */
            display: flex;
            flex-direction: column; /* organiza os itens em coluna */
            align-items: center; /* centraliza os itens horizontalmente */
            justify-content: space-between; /* distribui os itens uniformemente */
        }

        .menu-item {
            margin-bottom: 20px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            border-radius: 8px;
            text-align: center;
        }

        .menu-item:hover {
            background-color: white;
            color: #007bff; /* Muda a cor do texto ao passar o mouse */
        }

        

        h1 {
            color: #007bff;
        }

        #cadastrarMembroForm {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #495057;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }


    </style>
