<?php

function plz_script_login(){
    wp_register_script("plz-login", plugins_url("../assets/js/login.js", __FILE__));
    wp_localize_script("plz-login", "plz", array(
        "rest_url" => rest_url("plz"),
        "home_url" => home_url(),
    ));
}

add_action("wp_enqueue_scripts", "plz_script_login");

function plz_add_login_form(){

    wp_enqueue_script("plz-login");

    $response = '
    <main class="signin">
        <div class="signin__container">
            <form class="signin__form" id="signin">
                <div class="signin__email name--campo">
                    <label for="email">Email address</label>
                    <input name="email" type="email" id="email">
                </div>
                <div class="signin__pass name--campo">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password">
                </div>
                <div class="signin__submit">
                    <input type="submit" value="Log in">
                </div>
                <div class="signin_create-link">
                    <a href="'.home_url("sing-up").'">Sign up</a>
                </div>
                <div class="msg"></div>
            </form>
        </div>
    </main>
    ';

    return $response;
}

add_shortcode("plz_login","plz_add_login_form");
