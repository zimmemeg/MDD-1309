<?php

//This class will run depending on if the user is successful with logging in.
//Will pull out the correct template and display it based on what happens.
class AuthView {
    public function show($template, $data = array()){
        $templatePath = "views/${template}.inc";
        if(file_exists($templatePath)){
            include $templatePath;
        }
    }
}
