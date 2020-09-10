<?php // cria uma função que retorna a quantidade de registro no banco
include ('conn.php');
           class Reserva {

             public $quantidade;

            public function getQuantidade(){

             $busca = "SELECT * FROM lugares";
             $prepara = $conn->prepare($busca);
             if($prepara->execute()):{
                 $conta = count($prepara);
                 return $conta;


             }




            }



           }




           $reserva = new Reserva();
           $reserva->quantidade = '12'; // quantidade de lugares
           $quantidade = $reserva->quantidade;

