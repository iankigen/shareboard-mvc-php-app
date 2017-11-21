<?php

class Bootstrap{
    private $controller;
    private $action;
    private $request;

    public function __construct($request){
        $this->request = $request;

        if ($this->request['controller'] == ''){

            $this->controller = 'home';
        }else{
            $this->controller = $this->request['controller'];
        }

        if ($this->request['action'] == ''){

            $this->action = 'index';
        }else{
            $this->action = $this->request['action'];
        }

    }

    public function createController(){
        // check if controller is an existing class
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);

            // check extends
            if(in_array('Controller', $parents)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                }else{
                    // 404 page not found
                    echo "<center><h1>404</h1><br><h3>Method does not exist</h3></center>";
                }
            }else{
                // 404 page not found
                echo "<center><h1>404</h1><br><h3>Base controller does not exist</h3></center>";
            }

        }else{
            // 404 page not found
            echo "<center><h1>404</h1><br><h3>Class does not exist</h3></center>";
        }
    }
}