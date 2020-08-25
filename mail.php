<?php
if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

 $nome =     strip_tags(trim($_POST['nome']));
 $email        strip_tags(trim($_POST['e-mail']));
 $sobrenome =    strip_tags(trim($_POST['email']));
 $password =  strip_tags(trim($_POST['senha']));


 if(empty($nome)) {
 $retorno = '<span>Informe seu nome</span>';
 }elseif (empty($email)) {
 $retorno = '<span>Informe seu e-mail</span>';
 }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $retorno = '<span>Informe um e-mail válido</span>';
 }elseif (empty($assunto)) {
 $retorno = '<span>Digite o assunto!</span>';
 }elseif (empty($mensagem)) {
 $retorno = '<span>Digite a mensagem</span>';
 }if (empty($retorno)) {

//<input type="hidden" name="enviar" value="send" />

$date = date("d/m/Y h:i");


//CABEÇALHO
$nome_do_site="UpInside";
$email_para_onde_vai_a_mensagem = "mateus101202santana@gmail.com";
$nome_de_quem_recebe_a_mensagem = "UpInside";
$exibir_apos_enviar='';

//CONFIGURAÇOES DA MENSAGEM ORIGINAL
$cabecalho_da_mensagem_original="From: $name <$email>\n";
$assunto_da_mensagem_original="Fale com UpInside";


$configuracao_da_mensagem_original="

ENVIADO POR:\n
Nome: $nome\n
E-mail: $email\n
Assunto: $assunto\n\n\n
Mensagem: $mensagem\n\n

ENVIADO EM: $date";

//CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
// "Re: $assunto"
$assunto_da_mensagem_de_resposta = "Confirmação";
$cabecalho_da_mensagem_de_resposta = "From: $nome_do_site <$email_para_onde_vai_a_mensagem>\n";
$configuracao_da_mensagem_de_resposta="Obrigado por entrar em contato!\nEstaremos respondendo em breve...\nAtenciosamente,\n$nome_do_site\n\nEnviado em: $date";

// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE NÃO ALTERE O SCRIPT PARA QUE O  SISTEMA FINCIONE CORRETAMENTE
// ****** IMPORTANTE ********


$assunto_digitado_pelo_usuario="s";


$headers = "$cabecalho_da_mensagem_original";
if ($assunto_digitado_pelo_usuario=="s")
{
$assunto = "$assunto_da_mensagem_original";
};
$seuemail = "$email_para_onde_vai_a_mensagem";
$mensagem = "$configuracao_da_mensagem_original";
mail($seuemail,$assunto,$mensagem,$headers);

//ENVIO DE MENSAGEM DE RESPOSTA AUTOMATICA
$headers = "$cabecalho_da_mensagem_de_resposta";
if ($assunto_digitado_pelo_usuario=="s")
{
$assunto = "$assunto_da_mensagem_de_resposta";
}
else
{
$assunto = "Re: $assunto";
};
$mensagem = "$configuracao_da_mensagem_de_resposta";
mail($email,$assunto,$mensagem,$headers);

/*echo "<script>window.location='$exibir_apos_enviar'</script>";*/
echo "<span class=\"yes\">Sua mensagem foi enviada com suscesso, Estaremos respondendo o mais breve possivel!</span>";
} else {
 echo "$retorno";
 }
}
?>