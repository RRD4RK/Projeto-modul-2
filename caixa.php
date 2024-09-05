<?php


//var globais
$usuario="";
$senha= "";
$regUsuario ="";
$regSenha = "";
$registros = [
    'admin' => '123'

];
$usuarioLogado = null;
$soma  = 0;
$listaProd = [];
$log = [];
$data = date('d/m/Y H:i:s');

//fun start
function start($opcao){
    if($opcao == "1"){
        login($opcao);
    }
    else if ($opcao == "2"){
        registro($opcao);
    }
    else{
        echo "Erro Tente novamente\n";
    }
}


//fun login
function login($opcao){
    global $registros;
    global $controle;
    global $usuarioLogado;
    $controle="";
    global $data;
    $usuario = readline("Digite seu usuário:\n");
    $senha = readline("Digite sua senha:\n ");

    if (array_key_exists($usuario, $registros)){
        echo "Logado com sucesso!!\n";
        $usuarioLogado = $usuario;
        $controle = (true);
    }
    historico("O usuario $usuario logou as $data");
}

//fun Registro
function registro($opcao){
    global $registros;
    global $data;
    $regUsuario = readline("Crie um usuario: \n ");
    $regSenha = readline ("Crie uma senha: \n ");
    if(array_key_exists($regUsuario, $registros)){
        echo "Esse usuário já existe\n";
        do{
            $regUsuario = readline("Crie um usuario:\n ");
            $regSenha = readline ("Crie uma senha:\n ");
        }while($regUsuario == $registros);
    }
    $registros[$regUsuario]= $regSenha;
    print_r($registros);
    historico("Os usuários do registro foram atualizados as $data");
    echo"Seu usuário foi criado com sucesso!\n ";
}


//func menu
function menu(){
    global $usuarioLogado;

    echo "Bem vindo!! $usuarioLogado\n";
    echo"1-Vender\n
        2-Cadastrar novo usuário\n
        3-Verificar Logs\n
        4-Deslogar\n";
        do{
            $escolha = readline("O que você deseja fazer?");
        }while($escolha < 1 and $escolha>4);

    if($escolha == "1"){
        vender();  
    }
    else if($escolha == "2"){
        registro($escolha);
    }
    else if($escolha == "3"){
        historico($escolha);
    }
    else if($escolha == "4"){
        deslogar();
    }

}

//func vender
function vender(){
    global $listaProd;
    global $soma;
    global $data;
    do{
        $prod = readline("Qual Produto você vendeu? \n");
        $valor = readline("Por quanto você vendeu? R$\n");
        $voltar = readline("Deseja continuar?\n 1-SIM\n 2-NÃO");
        $listaProd[$prod] = $valor;
        $soma += $valor;
        historico("O $prod foi vendido po R$$valor as $data");
    }while($voltar != 2);
    print_r($listaProd);
    echo "Você vendeu esse valr R$$valor\n";
}

//fun log

function historico($escolha){
    global $log;
    $log[]=$escolha;

}

//func deslogar
function deslogar(){
    global $usuarioLogado;
    global $data;
    $usuarioLogado=null;
    echo "Deslogado com sucesso";
    historico("O $usuarioLogado deslogou as $data");
    
}




while(true){
    if($usuarioLogado == null){
        echo"Faça o registro se você nao tiver um login\n";
        echo"Oque você deseja fazer\n";
        $opcao = readline("1-logar\n 2-registrar \n");
        start($opcao);
    }
    else{
        menu();
    }
}