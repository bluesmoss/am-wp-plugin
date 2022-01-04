<?php

function plz_api_registro(){
  register_rest_route( 
    'plz',
    'registro',
    [
      'methods' => 'POST',
      'callback' => 'plz_registro_callback'
    ]
  );
}

function plz_registro_callback($request){

  $userExist = get_user_by("login", $request['name']);
  $emailExist = get_user_by("email", $request['email']);

  if($userExist){
    return array('msg' => 'the user already exists');
  }

  if($emailExist){
    return array('msg' => 'the email already exists');
  }

  $args = [
    'user_login'=> $request["name"],
    'user_pass' => $request["password"],
    'user_email' => $request['email'],
    'user_rol' => 'editor'
  ];

  $user = wp_insert_user($args);
  return ['register user', $user];
}


add_action("rest_api_init", "plz_api_registro");