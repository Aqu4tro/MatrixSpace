<?php 
 
 function geraMatriz() {
  if (
    isset($_GET["linhas"], $_GET["colunas"]) &&
    is_numeric($_GET["linhas"]) &&
    is_numeric($_GET["colunas"]) &&
    intval($_GET["linhas"]) > 0 &&
    intval($_GET["colunas"]) > 0
){
         $linhas = intval($_GET["linhas"]);
         $colunas = intval($_GET["colunas"]);
 
         echo "<form method='post'>";
         echo "<input type='hidden' name='linhas' value='$linhas'>";
         echo "<input type='hidden' name='colunas' value='$colunas'>";
         for ($i = 0; $i < $linhas; $i++) {
             for ($j = 0; $j < $colunas; $j++) {
                 echo "<label>Elemento [$i][$j]:</label> ";
                 echo "<input type='number' name='ele{$i}{$j}' required> ";
             }
             echo "<br>";
         }
 
         echo "<br><button type='submit'>Enviar Matriz</button>";
         echo "</form>";
     }
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["linhas"], $_POST["colunas"])) {
      $A = [];
  
      for ($i = 0; $i < $_POST["linhas"]; $i++) {
          for ($j = 0; $j < $_POST["colunas"]; $j++) {
              $A[$i][$j] = $_POST["ele{$i}{$j}"];
          }
      }
      $E = linhaDegrauReduzida($A);
      
  }
 }
 
 

  function linhaDegrauReduzida($A){
    $linhas = count($A);
    $colunas = count($A[0]);
    $linha_v = 0;   
    for($col_atual = 0; $col_atual < $colunas && $linha_v < $linhas ; $col_atual++){
      $pivo_el;
      $pivo = -1;

      for($i = $linha_v; $i < $linhas; $i++){

        
        if ($A[$i][$col_atual] == 1){
          $pivo = $i;
          break;
        }
        else if($pivo == -1 && $A[$i][$col_atual] != 0){
          $pivo = $i;
        }
        
      }

      if($pivo == -1){
        continue;
      }
      //troca a linha do pivo por uma linha mais vantajosa ex: uma linha com pivo 1, ou por uma linha não nula
      if($pivo != $linha_v){
        $res = $A[$linha_v];
        $A[$linha_v] = $A[$pivo];
        $A[$pivo] = $res;
      }
      // pega o elemento pivo
      $pivo_el = $A[$linha_v][$col_atual];

      // divide todos os elementos da liha do pivo por ele mesmo, fazendo o pivo ser 1
      for($j = 0; $j < $colunas; $j++){
        $A[$linha_v][$j] /= $pivo_el;
      }
      // zera os elementos abaixo do pivo, os subtraindo por um produto do elemento da linha pivo com o próprio elemento da linha executada
      for($k = 0; $k < $linhas; $k++){
          for($h = 0; $h < $colunas; $h++){
            //compara se o elemento já 0 e se a linha atual é diferente da linha pivo
            if($A[$k][$h] != 0 && $k != $pivo){
              $A[$k][$h] -= ($A[$k][$h] * $A[$pivo][$h]);
            }
        }
      }
      $linha_v ++;



         
  }
  echo "<h3>Forma Linha Degrau Reduzida (FLDR):</h3>";
  echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse;'>";
  
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
  




    


// Exemplo de uso

?>
