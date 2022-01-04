<?php

function plz_api_login(){
  register_rest_route( 
    'plz',
    'login',
    [
      'methods' => 'POST',
      'callback' => 'plz_login_callback'
    ]
  );
}

function plz_login_callback($request){

  $credentials = [
    'user_login' => $request['email'],
    'user_password' => $request['password'],
    'remember' => true
  ];

  $user = wp_signon($credentials);

  return $user->get_error_message();
}


add_action("rest_api_init", "plz_api_login");