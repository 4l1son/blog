<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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

        #content {
            flex-grow: 1;
            padding: 20px;
        }

        h1 {
            color: #007bff;
        }

        #cadastrarLoginForm {
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

        #successModal {
            display: none;
        }
        #loadingSpinner img {
        display: none;
    }

    #loadingSpinner .fa-spinner {
        font-size: 50px;
        color: #007bff;
        animation: spin 1s linear infinite;
    }

        #loadingSpinner {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        #loadingSpinner img {
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite; /* Adiciona uma animação de rotação */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

    <div id="menu">
        <nav class="menu-item">
            <a href="{{route('membros.get')}}"> 
                <p>Lista de Membros</p>
            </a>
        </nav>

        <nav class="menu-item">
            <a href="{{route('login.listaLogin')}}"> 
                <p>Lista de Logins</p>
            </a>
        </nav>


        <nav class="menu-item">
                <p>
                    <a href="{{route('membros.create')}}" >
                        Cadastrar Membros
                    </a>
                </p>
            
        </nav>


        <nav class="menu-item">
                <p >
                    <a href="{{route('login.cadastroLogin')}}" >
                        Cadastrar Logins
                    </a>
                </p>
            
        </nav>
        <div class="menu-item">
                <p>
                    <a href="{{route('login')}}">     
                        Sair
                    </a>
                </p>
        </div>
    </div>
    <div id="content">
    <h1 style="text-align: center;">Cadastrar Logins de usuários</h1>

    <form id="cadastrarLoginForm" method="post">
        @csrf
        <label for="Email">Email:</label>
        <input type="text" name="Email" required>
                        
        <label for="Senha">Senha:</label>
        <input type="password" name="Senha" required>

        <button type="button" onclick="cadastrarLoginForm()">Cadastrar</button>
    </form>

    <div id="successAlert"></div>
    <!-- Placeholder for error alert -->
    <div id="errorAlert"></div>

    <div id="loadingSpinner" style="display: none;">
        <img src="https://example.com/loading.gif" alt="Loading">
        <p>Carregando...</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
function cadastrarLoginForm() {
    var form = $('#cadastrarLoginForm');
    var url = 'http://127.0.0.1:8000/cadastro-logins';
    var data = form.serialize();
    $.ajax({
    url: url,
    type: 'POST',
    data: data,
    beforeSend: function() {
        console.log('Enviando solicitação...');
    },
    success: function(response) {
        // Esconder o spinner de carregamento
        $('#loadingSpinner').hide();
        // Exibir o alerta de sucesso com mensagem e botão de fechar
        $('#successAlert').html('<div class="d-flex justify-content-end" style="margin-top: 9.5rem;"><div class="alert alert-primary alert-dismissible" role="alert">\
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check-circle-fill" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">\
                                        <path d="M7.293 10.293a1 1 0 0 0 1.414 0l4-4a1 1 0 1 0-1.414-1.414L8 8.586l-2.293-2.293a1 1 0 1 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0z"/>\
                                    </svg>\
                                    Login cadastrado com sucesso\
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                                </div></div>').slideDown();
        setTimeout(function(){
            $('#successAlert').slideUp();
        }, 3000); // Exibir o alerta de sucesso por 3 segundos
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
        // Extrair apenas a mensagem de erro da resposta
        var errorMessage = JSON.parse(xhr.responseText).message;
        // Exibir a mensagem de erro no alerta
        $('#errorAlert').html('<div class="d-flex justify-content-end" style="margin-top: 9.5rem;"><div class="alert alert-danger alert-dismissible" role="alert">' + errorMessage + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>').slideDown();
        // Ocultar o alerta após 5 segundos
        setTimeout(function(){
            $('#errorAlert').slideUp();
        }, 5000); // Exibir o alerta de erro por 5 segundos
        $('#loadingSpinner').hide();
    }
});



}
</script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
