<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Projeto Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<div id="corpo-form-cad">	
<h1>Cadastrar</h1>	
<form method="POST">
<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">	
<input type="text" name ="telefone" placeholder="Telefone" maxlength="30">
<input type="email" name= "email" placeholder="Usuário" maxlength="40">
<input type="password" name="senha" placeholder="Senha" maxlength="15">
<input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
<input type="submit"  value="CADASTRAR">	
</form>
</div>
<?php
	
//verificar se clicou no botão
if(isset($_POST['nome']))
{

$nome = addslashes($_POST['nome']);
$telefone= addslashes($_POST['telefone']);
$email =addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$confirmarSenha = addslashes($_POST['confsenha']);

//verificar se está preenchido
if (!empty($nome) &&  !empty($telefone) && !empty($email) &&!empty($senha) && !empty($confsenha)) 
{

$u -> conectar("projeto_login", "localhost", "root", "");
if ($u->msgErro=="") //Está tudo ok.
{
if ($senha == $confirmarSenha) {

	$u->Cadastrar($nome,$telefone,$email,$senha);
}	
else{
	echo "Senha e confirmar senha não correspondem";
}
}

else{
	echo "Erro: ".$u->msgrro;
}
}else
{


	echo "Preencha todos os campos";
}

 }

?>
</body>
</html>