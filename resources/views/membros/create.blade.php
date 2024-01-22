<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        #successModal {
            display: none;
        }
    </style>
</head>
<body>

    <div id="menu">
        <nav class="menu-item">
            <p>Lista de Membros</p>
        </nav>

        <nav class="menu-item">
            <p>Cadastrar Membros</p>
        </nav>
        <div class="menu-item">
            <p>Sair</p>
        </div>
    </div>

    <div id="content">
    <h1 style="text-align: center;">Cadastrar Membros</h1>

        <form id="cadastrarMembroForm">
            @csrf
            <label for="primeiro_nome">Primeiro Nome:</label>
            <input type="text" name="primeiro_nome" required>
            
            <label for="matricula">Matrícula:</label>
            <input type="text" name="matricula" required>
            
            <label for="funcao">Função:</label>
            <input type="text" name="funcao" required>

            <button type="button" onclick="cadastrarMembro()">Cadastrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function cadastrarMembro() {
            var form = $('#cadastrarMembroForm');
            var url = 'http://127.0.0.1:8000/membros';
            var method = form.attr('method');
            var data = form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                beforeSend: function() {
                    // Código a ser executado antes de enviar a solicitação
                    console.log('Enviando solicitação...');
                },
                success: function(response) {
                    alert("Cadastrado com sucesso!")
                    if (response.success) {
                        // Limpar formulário se necessário
                        form.trigger('reset');
                        // Adicionar classe ao modal para exibi-lo
                        $('#successModal').modal('show');
                    } else {
                        console.error('Erro no cadastro:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Lidar com erros de solicitação
                    console.error(xhr.responseText);
                }
            });
        }
    </script>

</body>
</html>
