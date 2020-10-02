<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Essas Credenciais Não Correspondem Aos Nossos Registros.',
    'throttle' => 'Muitas Tentativas De Login. Tente Novamente Em :seconds Segundos.',

    /*
    |--------------------------------------------------------------------------
    | Custom Auth Implementation
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'roles' => [
            'tutor' => 'Tutor',
            'student' => 'Aluno',
        ],
        'role' => 'Função',
        'name' => 'Usuario',
        'email' => 'E-mail',
        'password' => 'Senha',
        'password_confirmation' => 'Confirmar Senha',
        'remember_me' => 'Lembrar-me',
        'allow_newsletters' => 'Eu Aceito Receber E-mails Informativos',
        'locale' => 'Idioma',
        'timezone' => 'Fuso Horário',
    ],

    'login' => [
        'title' => 'Fala Education',
        'description' => 'Já Cadastrado? Entre Agora!',
        'submit' => 'Entrar',
        'forgot_password_link' => 'Esqueceu Sua Senha?',
        'register_link' => 'Não Tem Uma Conta Ainda?',
    ],

    'register' => [
        'title' => 'Criar Uma Conta',
        'description' => 'Tenha Acesso A Nossa Comunidade Hoje!',
        'submit' => 'Inscrever-se',
        'login_link' => 'Já Tem Uma Conta?',
    ],

    'verify' => [
        'title' => 'Verifique Seu Endereço De E-mail',
        'description' => 'Antes De Prosseguir, Verifique Seu E-mail Para Um Link De Verificação.',
        'alert' => 'Um Novo Link De Verificação Foi Enviado Para Seu E-mail.',
        'verification_link' => "Não Recebeu O E-mail? Clique Aqui Para Re-enviar.",
    ],

    'passwords' => [

        'email' => [
            'title' => 'Lembrete De Senha',
            'description' => "Por Favor, Forneça O E-mail Da Sua Conta E Nós Lhe Enviaremos Sua Senha.",
            'submit' => 'Enviar o link de redefinição de senha',
            'login_link' => 'Lembrou sua conta? Entre!',
        ],

        'reset' => [
            'title' => 'Redefinir Senha',
            'description' =>'Digite Uma Nova Senha Para Sua Conta.',
            'submit' => 'Mudar a Senha',
        ],

    ],

];