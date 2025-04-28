<?php 


  function fldr($A){
    $linhas = count($A);
    $colunas = count($A[0]);
    $linha_v = 0;   
    for($col_atual = 0; $col_atual < $colunas && $linha_v < $linhas ; $col_atual++){
      $res;
      $pivo_el;
      $lin;
      $pivo = -1;

      for($i = $linha_v; $i < $linhas; $i++){

        
        if ($A[$i][$col_atual] == 1){
          $pivo = $i;
          break;
        }
        else if($pivo == -1){
          $pivo = $i;
        }
        
      }

      if($pivo == -1){
        continue;
      }
      //troca a linha do pivo por uma linha mais vantajosa ex: uma linha com pivo 1
      if($pivo != $linha_v){
        $res = $A[$linha_v];
        $A[$linha_v] = $A[$pivo];
        $A[$pivo] = $res;
      }
      // pega o elemento pivo
      $pivo_el = $A[$linha_v][$col_atual];

      // divide todos os elementos da liha do pivo por ele mesmo, fazendo o pivo ser 1
      for($j = $linha_v; $j < $linhas; $j++){
        $A[$j][$col_atual] /= $pivo_el;
      }
      //
      for($k = 0; $k < $linhas; $k++){
        
          for($h = 0; $h < $colunas; $h++){
            if($A[$k][$h] != 0 && $k != $pivo){
              $A[$k][$h] -= ($A[$k][$h] * $A[$pivo][$h]);
            }
        }
      }
      $linha_v ++;


         echo "Forma Linha Degrau Reduzida (FLDR):\n";
    for ($i = 0; $i < $linhas; $i++) {
        for ($j = 0; $j < $colunas; $j++) {
            printf("%8.3f ", $A[$i][$j]);
        }
        echo "\n";
    }

    return $A;
         
  }
    }
  




    


// Exemplo de uso
$A = [
    [1, 2, -1, -4],
    [2, 3, -1, -11],
    [-2, 0, -3, 22]
];

fldr($A);
?>
