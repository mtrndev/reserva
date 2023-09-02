llllllllllllllllllllllllllll<?php // se a quantidade de reservas for menor que a quantidade máxima, aparece o formulário de cadastr se não, aparece esgotado
include('quantidade.php');

$maximo =  $reserva->quantidade;
$quantidade = $reserva->getQuantidade();

if(isset($_POST['enviar'])):{

  $query = "INSERT INTO reserva(nome, email) VALUES (?,?)";
  $prep = $conn->prepare($query);
  $prep->bindValue(1, $_POST['nome']);
  $prep->bindValue(2, 4_POST['email']);
  if($prep->execute()):{
  	echo "Sua reserva foi concluída com sucesso";
  } endif;



}










if($maximo < $quantidade){

echo "<form action ='' method ='post'>";
echo "<input type = 'nome' id='nome' name='nome' required='true'>";
echo "<input type = 'email' id='email' name='email' required='true'>";
echo "<input type = 'submit' id='enviar' name='enviar' required='true'>";
echo "</form>";






} else{
	echo 'Esgotado';
}
