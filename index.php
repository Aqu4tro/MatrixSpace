<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Matriz - Álgebra Linear</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        form {
            display: inline-block;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            min-width: 500px;
        }

        label {
            display: inline-block;
            width: 130px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 80px;
            padding: 5px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 10px;
            margin-right: 10px;
            padding: 8px 16px;
            border: none;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px 12px;
        }

        h3 {
            margin-top: 40px;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            text-align: center;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container label,
        .form-container input,
        .form-container button {
            font-size: 20px;
        }

        .form-container input {
            width: 150px;
        }

        .form-container button {
            cursor: pointer;
        }

        .form-matriz {
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .form-matriz label {
            margin: 5px;
            display: inline-block;
            font-family: sans-serif;

        }

        .form-matriz input {
            margin: 5px;
            padding: 5px;
            width: 80px;

        }

        .button-group {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
        }

        .button-group button {
            font-family: sans-serif;
            font-size: 100%;
            cursor: pointer;
        }
        p.intro {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #555;
        }
    </style>
</head>

<body>

    <h1>Projeto de Álgebra Linear</h1>
    <p class="intro">
        Escalone matrizes e visualize os subespaços fundamentais:<br />
        <strong>Coluna(A), Linha(A), Núcleo(A) e Núcleo(A<sup>T</sup>)</strong>.
    </p>

    <div class="form-container">
        <form method="get">
            <label for="linhas">Linhas:</label>
            <input type="number" name="linhas" value="<?php echo $_GET['linhas'] ?? ''; ?>" required><br>
            <label for="colunas">Colunas:</label>
            <input type="number" name="colunas" value="<?php echo $_GET['colunas'] ?? ''; ?>" required><br>
            <button class="button-m" type="submit">Gerar Matriz</button>
        </form>
    </div>
    <?php
    include("escalona.php");
    geraMatriz();

    ?>
</body>

</html>