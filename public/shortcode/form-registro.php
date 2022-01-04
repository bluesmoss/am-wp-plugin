<?php

function plz_script_registro(){
    wp_register_script("plz-registro", plugins_url("../assets/js/registro.js", __FILE__));
}

add_action("wp_enqueue_scripts", "plz_script_registro");

function plz_add_register_form(){

    wp_enqueue_script("plz-registro");

    $response = '
    <div class="signin">
        <div class="signin__container">
            <h1 class="sigin__titulo">Register</h1>
            <form class="signin__form" id="signup">
                <div class="signin__name name--campo">
                    <label for="Name">Name</label>
                    <input name="name" type="text" id="Name">
                </div>
                <div class="signin__email name--campo">
                    <label for="email">Email</label>
                    <input name="email" type="email" id="email">
                </div>
                <div class="signin__pass name--campo">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password">
                </div>
                <div class="signin__submit">
                    <input type="submit" value="Create">
                </div>
                <div class="msg"></div>
            </form>
        </div>
    </div>
    ';

    return $response;

}

add_shortcode("plz_registro","plz_add_register_form");
