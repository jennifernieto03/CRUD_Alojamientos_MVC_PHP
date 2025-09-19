<?php

//clase que se va encargar de conectarnos a la base de datos
//aplicando el patron singlenton
class Connection
{

    private static $instance = null;
    private $pdo; //atributo que se va encargar de obtener la conexion de la bd
    public $data;

    private function __construct()
    {
        //conectar a la bd
        try {

            $env = parse_ini_file(__DIR__ . '/../.env.ini');
            $host = $env['HOST'];
            $database_name = $env['DATABASE_NAME'];
            $user = $env['USER'];
            $password = $env['PASSWORD'];
            $port = $env['PORT'];
            $connection_url = $env['CONECTION_URL'];

            //tipo de conexion, host (servidor), nombre de base de datos
            $dsn = "mysql:host={$host};
                    dbname={$database_name};
                    charset=utf8";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->pdo = new PDO($dsn, "{$user}", "{$password}", $options);
        } catch (PDOException $e) {
            echo "Error al conectarnos a la bd" . $e->getMessage();
        }
    }

    //metodo para obtener una instancia unica
    public static function getInstance()
    {
        if (!self::$instance) {
            //si es la primera vez creamos la instancia
            self::$instance = new Connection();
        }

        //reutilizamos la instancia que ya existe 
        return self::$instance;
    }

    //metodo para obtener el objeto de la conexion
    public function getConnection()
    {
        return $this->pdo;
    }
}
