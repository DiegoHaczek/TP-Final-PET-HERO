<?php 
    namespace Config;

    use Config\Request as Request;

    class Router
    {
        public static function Route(Request $request)
        {
            $controllerName = $request->getcontroller() . 'Controller';

            $methodName = $request->getmethod();

            $methodParameters = $request->getparameters();          

            $controllerClassName = "Controllers\\". $controllerName;            

            $controller = new $controllerClassName;
            
            if(!isset($methodParameters))            
                call_user_func(array($controller, $methodName));
            else

            if(isset($methodParameters[0]['tmp_name'])){

            $methodParameters['tmp_name'] = $methodParameters[0]['tmp_name'];
            $methodParameters['fotoperfil'] = $methodParameters[0]['name'];
            
            unset($methodParameters[0]);

            //var_dump($methodParameters);
            

            }

            call_user_func_array(array($controller, $methodName), $methodParameters);

        }
    }
?>