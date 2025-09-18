<?php

//clase que se va encargar de conectarnos a la base de datos
//aplicando el patron singlenton
class Connection{

    private static $instance = null;
    private $pdo; //atributo que se va encargar de obtener la conexion de la bd
    public $data;

    private function __construct()
    {
        //conectar a la bd
        try{
            //tipo de conexion, host (servidor), nombre de base de datos
            $dsn = "mysql:host=bip6eudzkrh5wuccahbn-mysql.services.clever-cloud.com;
                    dbname=bip6eudzkrh5wuccahbn;
                    charset=utf8";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->pdo = new PDO($dsn, "ucx7nuyetgo603il", "qlpuIwIx3azAH4MEz5RU", $options);

        }catch(PDOException $e){
            echo "Error al conectarnos a la bd" . $e->getMessage();
        }
    }

    //metodo para obtener una instancia unica
    public static function getInstance(){
        if(!self::$instance){
            //si es la primera vez creamos la instancia
            self::$instance = new Connection();
        }

        //reutilizamos la instancia que ya existe 
        return self::$instance;
    }

    //metodo para obtener el objeto de la conexion
    public function getConnection(){
        return $this->pdo;
    }
}
