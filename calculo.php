<section class="parte1">
    <?php

        ini_set('default_charset', 'utf-8');
        date_default_timezone_set('America/Sao_Paulo');
    
        
        if($_GET){
            $nome = $_GET['nome'];
            $date = $_GET['nasc'];    
            echo "Seu nome é $nome, você tem ".calcularIdade($date)." anos, ".calcularMes($date). " meses, ".calcularDia($date). " dias.";
            
        }
        function calcularIdade($date){
            $date = date('Y-m-d', strtotime(str_replace("/", "-", $date)));
            $time = strtotime($date);

            if($time === false){
                return '';
            }
            $year_diff = '';
            $date = date('Y-m-d', $time);

            list ($year, $month, $day) = explode('-', $date);

            $year_diff = date('Y') - $year;
            $month_diff = date('m') - $month;
            $day_diff = date('d') -$day;

            if ($day_diff < 0 && $month_diff < 0 || $month_diff < 0){
                $year_diff--;
            }
            return $year_diff;
        }
        function calcularMes($date){
            $date = strtotime($_GET['nasc']);
            $mesNasc = date('m',$date);
            $mesAtual = date('m');
            $total_mes = 0;

            if($mesAtual > $mesNasc){
                $total_mes = $mesAtual - $mesNasc;
            } else if($mesAtual < $mesNasc){
                $total_mes = 12 - ($mesNasc - $mesAtual);
            }

            return $total_mes;
        }
        function calcularDia($date){
            $date = strtotime($_GET['nasc']);
            $diaNasc = date('d', $date);
            $diaAtual = date('d');
            $total_dia = 0;

            if($diaAtual > $diaNasc){
                $total_dia = $diaAtual - $diaNasc;
            } else if($diaAtual < $diaNasc == 30){
                $total_dia = 30 - ($diaNasc - $diaAtual);
            } else if($diaAtual < $diaNasc == 31){
                $total_dia = 31 - ($diaNasc - $diaAtual);
            } else if($diaAtual < $diaNasc == 29){
                $total_dia = 29 - ($diaNasc - $diaAtual);
            } else if($diaAtual < $diaNasc == 28){
                $total_dia = 28 - ($diaNasc - $diaAtual);
            } 

            return $total_dia;
        }
      
         
    
        
    ?>

    </section>