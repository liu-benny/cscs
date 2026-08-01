<?php
    class Controller{
        /*
            This is our base controller 
            It will have two functions - one to invoke views and one to invoke models 
        */

        public function view($name, $data = []){
            if(file_exists(__DIR__ . '/../views/' . $name . '.php')){
                require_once __DIR__ . '/../views/' . $name . '.php';
            }
            else{
                echo __DIR__ . '/../views/' . $name . '.php does not exists';
            }
        }

        public function model($modelName){
            require_once __DIR__ . '/../models/' . $modelName . '.php';
            return new $modelName;
        }




    }
?>