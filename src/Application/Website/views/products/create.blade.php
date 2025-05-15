<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
    <style>
        body {
            background: #f2f2f2;
            padding: 2rem;
            font-family: Arial, sans-serif;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label for="name">Nome do Produto</label>
        <input type="text" name="name" id="name" required>

        <label for="price">Preço</label>
        <input type="number" step="0.01" name="price" id="price" required>

        <label for="description">Descrição</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Salvar</button>
    </form>

</body>
</html>
