<?php


//var globais
$usuario="";
$senha= "";
$regUsuario ="";
$regSenha = "";
$registros = [
    'admin' => '123'

];
$usuarioLogado = "";



//fun menu
function menu($opcao){
    if($opcao == "1"){
        login($opcao);
    }
    else if ($opcao == "2"){
        registro($opcao);
    }
    else{
        echo "Erro rode dnv";
    }
}


//fun login
function login($opcao){
    global $registros;
    global $controle;
    $usuario = readline("Digite seu usuário:\n");
    $senha = readline("Digite sua senha:\n ");

    if (array_key_exists($usuario, $registros)){
        echo "Logado com sucesso!!\n";
        $controle = (true);
    }

}


//func deslogar
function deslogar($controle){

}



//fun Registro
function registro($opcao){
    global $registros;
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
    echo"Seu usuário foi criado com sucesso!
    ";
}


while(true){
    echo"Faça o registro se você nao tiver um login\n";
    $opcao = readline("1-logar\n 2-registrar \n");
    menu($opcao);
}