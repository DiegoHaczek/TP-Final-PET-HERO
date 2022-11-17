<?php 
    namespace Config;

    use Config\Request as Request;

    class Router
    {
        public static function Route(Request $request)
        {
            try{

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

            if(isset($methodParameters[1]['tmp_name'])){

                $methodParameters['tmp_nameFichamedica'] = $methodParameters[1]['tmp_name'];
                $methodParameters['fichamedica'] = $methodParameters[1]['name'];

                unset($methodParameters[1]);

            }
            
            unset($methodParameters[0]);
        
            }

            call_user_func_array(array($controller, $methodName), $methodParameters);

            
            }catch(Exception $e){
                
            }finally{
                header('location:index.php');
            }

        }
    }
?>