<?php

function geraMatriz()
{
  if (
    isset($_GET["linhas"], $_GET["colunas"]) &&
    is_numeric($_GET["linhas"]) &&
    is_numeric($_GET["colunas"]) &&
    intval($_GET["linhas"]) > 0 &&
    intval($_GET["colunas"]) > 0
  ) {
    $linhas = intval($_GET["linhas"]);
    $colunas = intval($_GET["colunas"]);

    echo "<div class='form-matriz'>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='linhas' value='$linhas'>";
    echo "<input type='hidden' name='colunas' value='$colunas'>";

    for ($i = 0; $i < $linhas; $i++) {
      for ($j = 0; $j < $colunas; $j++) {
        $value = isset($_POST["ele{$i}{$j}"]) ? $_POST["ele{$i}{$j}"] : '';
        echo "<label>Elemento [$i][$j]:</label> ";
        echo "<input type='number' step='any' name='ele{$i}{$j}' value='$value' required> ";
      }
      echo "<br>";
    }

    echo "<div class='button-group'>";
    echo "<button value='escalona' name='sub' type='submit'>Linha Degrau Reduzida da Matriz</button>";
    echo "<button value='subespaco' name='sub' type='submit'>Subespaços da Matriz</button>";
    echo "</div>";

    echo "</form>";
    echo "</div>";
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["linhas"], $_POST["colunas"])) {
    $A = [];

    for ($i = 0; $i < $_POST["linhas"]; $i++) {
      for ($j = 0; $j < $_POST["colunas"]; $j++) {
        $A[$i][$j] = $_POST["ele{$i}{$j}"];
      }
    }
    if (isset($_POST['sub'])) {
      switch ($_POST['sub']) {
        case 'escalona':
          linhaDegrauReduzida($A);
          break;
        case 'subespaco':
          geraSubespaco($A);
          break;
        default:
          echo "Nenhuma acao";
      }
    }


  }
}

function linhaDegrauReduzida($A)
{
  $linhas = count($A);
  $colunas = count($A[0]);
  $linha_v = 0;
  for ($col_atual = 0; $col_atual < $colunas && $linha_v < $linhas; $col_atual++) {
    $pivo_el;
    $pivo = -1;

    for ($i = $linha_v; $i < $linhas; $i++) {


      if ($A[$i][$col_atual] == 1) {
        $pivo = $i;
        break;
      } else if ($pivo == -1 && $A[$i][$col_atual] != 0) {
        $pivo = $i;
      }

    }

    if ($pivo == -1) {
      continue;
    }
    //troca a linha do pivo por uma linha mais vantajosa ex: uma linha com pivo 1, ou por uma linha não nula
    if ($pivo != $linha_v) {
      $res = $A[$linha_v];
      $A[$linha_v] = $A[$pivo];
      $A[$pivo] = $res;
    }
    // pega o elemento pivo

    $pivo_el = $A[$linha_v][$col_atual];

    // divide todos os elementos da liha do pivo por ele mesmo, fazendo o pivo ser 1
    for ($j = 0; $j < $colunas; $j++) {
      if ($A[$linha_v][$j] == 0) {
        continue;
      }
      $A[$linha_v][$j] /= $pivo_el;
    }
    // zera os elementos abaixo do pivo, os subtraindo por um produto do elemento da linha pivo com o próprio elemento da linha executada
    for ($k = 0; $k < $linhas; $k++) {
      if ($k != $linha_v) {
        $fator = $A[$k][$col_atual];
        for ($h = 0; $h < $colunas; $h++) {
          $A[$k][$h] -= $fator * $A[$linha_v][$h];
        }
      }

    }
    $linha_v++;




  }
  echo "<h3>Forma Linha Degrau Reduzida (FLDR):</h3>";
  echo "<table border='1' cellpadding='6' cellspacing='0' class='tablez' style='border-collapse: collapse;'>";

  for ($i = 0; $i < $linhas; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $colunas; $j++) {
      echo "<td>" . sprintf("%.2f", $A[$i][$j]) . "</td>";
    }
    echo "</tr>";
  }

  echo "</table>";


  return $A;
}




function geraSubespaco($A)
{
  
  file_put_contents("matriz.json", json_encode($A));
  
  exec("python main.py",$output, $status);

  if ($status === 0) {
    echo "<h3>Imagem gerada com sucesso:</h3>";
    echo "<img src='subespacos.png' alt='Subespaços' style='max-width:600px;' />";
    echo "<br><a href='subespacos.png' download>Clique aqui para baixar</a>";
} else {
    echo "<p>Erro ao gerar imagem:</p>";
    echo "<pre>" . implode("\n", $output) . "</pre>";
}
}



?>