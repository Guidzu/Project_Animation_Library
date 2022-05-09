<?php
declare(strict_types=1);

namespace App\Routing;

class Router
{   
    private const DEFAULT_PATH = 'home';
    private array $routing = [];
    private string $action;
    public string $path;
    
    public function __construct()
    {
        $this->setPath();
    }
    
    //definit l'url grace a la variable GET
    private function setPath(): void
    {
        $this->path = $_GET['url'] ?? self::DEFAULT_PATH;
    }
    
    //création du tableau de routes
    public function addRoute(string $path, string $action): void
    {
        array_push($this->routing, [$path => $action]);
    }
    
    //Recherche l'url demandé dans le tableau de routes, retourne le nom du controller ou Null
    public function checkRoad(): ?string
    {
        $action = null;
        
        foreach($this->routing as $road){
            if(array_key_exists($this->path, $road)){
                $action = $road[$this->path];
            }
        }
        
        return $action;
    }
    
    //lance le router
    public function launch(): void
    {
        $action = $this->checkRoad();
        
        if($action) {
            $this->run($action);
        } else {
            $this->errorPage();
        }
    }
    
    //lance le controller
    private function run(string $controller)
    {
        ob_start();
        require_once '../src/Controllers/'.$controller.'.php';
        $content = ob_get_clean();  
        require_once '../Views/Layout.phtml';
        // echo 'je lance le controller : '.$controller;
    }
    
    //renvoie une page d'erreur avec un status 404
    private function errorPage(): void
    {
        header('HTTP/1.1 404 not found');
        require_once '../Views/404.phtml';
        exit();
    }
}