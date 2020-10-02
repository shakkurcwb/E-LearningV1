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

    'failed'   => 'Estas credenciales no coinciden con nuestros registros.',
    'throttle' => 'Demasiados intentos de acceso. Por favor intente nuevamente en :seconds segundos.',

    /*
    |--------------------------------------------------------------------------
    | Custom Auth Implementation
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'roles' => [
            'tutor' => 'Tutor',
            'student' => 'Estudiante',
        ],
        'role' => 'Papel',
        'name' => 'Nombre de Usuario',
        'email' => 'Correo Electrónico',
        'password' => 'Contraseña',
        'password_confirmation' => 'Confirmar Contraseña',
        'remember_me' => 'Recordarme',
        'allow_newsletters' => 'Acepto Recibir Boletines',
        'locale' => 'Idioma',
        'timezone' => 'Zona Horaria',
    ],

    'login' => [
        'title' => 'Fala Education',
        'description' => '¿Ya está registrado? ¡Iniciar!',
        'submit' => 'Iniciar Sesión',
        'forgot_password_link' => '¿Olvidó Su Contraseña?',
        'register_link' => '¿Aún No Tiene Una Cuenta?',
    ],

    'register' => [
        'title' => 'Crea Tu Cuenta',
        'description' => 'Obtenga Acceso A Nuestra Comunidad Hoy!',
        'submit' => 'Registrarse',
        'login_link' => '¿Ya tiene una cuenta?',
    ],

    'verify' => [
        'title' => 'Verifique Su Correo Electrónico',
        'description' => 'Antes De Continuar, Verifique Su Correo Electrónico Para Obtener Un Enlace De Verificación.',
        'alert' => 'Se Ha Enviado Un Nuevo Enlace De Verificación A Su Dirección De Correo Electrónico.',
        'verification_link' => "¿No Recibió El Correo Electrónico? Haga Clic Aquí Para Reenviarlo.",
    ],

    'passwords' => [

        'email' => [
            'title' => 'Recordatorio De Contraseña',
            'description' => "Por Favor, Escriba El Correo Electrónico De Su Cuenta Y Le Enviaremos Su Contraseña.",
            'submit' => 'Enviar Enlace De Restablecimiento De Contraseña',
            'login_link' => '¿Recuerdas Tu Cuenta? ¡Iniciar!',
        ],

        'reset' => [
            'title' => 'Restablecer Contraseña',
            'description' =>'Ingrese Una Nueva Contraseña Para Su Cuenta.',
            'submit' => 'Actualizar Contraseña',
        ],

    ],

];