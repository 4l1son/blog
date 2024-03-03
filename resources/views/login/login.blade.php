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
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        #bibliotecas {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #495057;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
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
</head>
<body>
   @include('login.template.global.index')
   @yield('bibliotecas')
    <div id="bibliotecas">
        <h1>Login</h1>
        <form action="/login" method="post" id="loginForm">
            @csrf
            <label for="username">Usuário:</label>
            <input type="text" name="Email" value="{{ old('Email')}}" required>
            {{$errors->has('Email') ? $errors->first('Email') : ''}}
            
            <label for="password">Senha:</label>
            <input type="password" name="Senha" value="{{ old('Senha')}}" required>
            {{$errors->has('Senha') ? $errors->first('Senha') : ''}}
            
            <button type="submit" class="btn-primary mt-3">Entrar</button>
        </form>
        {{ isset($erro) && $erro != $erro ? " " : "" }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html>
