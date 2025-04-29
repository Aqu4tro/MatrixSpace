<!DOCTYPE html>
<html>
<head>
    <title>Trabalho de algebra linear</title>
</head>
<body>
    <h1>Olá, <?php echo "Vicente"; ?>!</h1>

    <form method="get">
        <label>Linhas:</label>
        <input type="number" name="linhas" value="<?php echo isset($_GET['linhas']) ? intval($_GET['linhas']) : ''; ?>" required><br>

        <label>Colunas:</label>
        <input type="number" name="colunas" value="<?php echo isset($_GET['colunas']) ? intval($_GET['colunas']) : ''; ?>" required><br>

        <button type="submit" name="acao" value="linhadeg">Gerar Matriz</button>
    </form>

    <form method="post">
        <button type="submit" name="acao" value="subespaco">Análise de Subespaço</button>
    </form> 

    <?php
    include("escalona.php");
      geraMatriz();
    ?>
</body>
</html>
