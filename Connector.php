<?php

define( 'DB_HOST', 'localhost:3306' );
define( 'DB_USER', 'alertacd_master' );
define( 'DB_PASS', 'haki00000' );
define( 'DB_NAME', 'alertacd_base');

/*define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', 'dr4g0n' );
define( 'DB_NAME', 'alertacd_base');*/



class Connector {
    
     /*protected $DB_HOST = 'localhost:3306';
    protected $DB_USER = "alertacd_master";
    protected $DB_PASS = "haki00000";
    protected $DB_NAME = "alertacd_base";*/

   protected $DB_HOST = 'localhost';
    protected $DB_USER = "root";
    protected $DB_PASS = "dr4g0n";
    protected $DB_NAME = "alertacd_base";

    private $conn = null;
    public $result;
    public function __construct() {
        try {
            // Establece la conexion a la BD
            $this->conn = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
            // Valida la conexion
            if (mysqli_connect_errno()) { // En caso de error, imprime el error
                printf("Ocurrio un error al establecer la conexión a la Base de Datos: %s\n", mysqli_connect_error());
                exit();
            } 
        } catch (Exception $ex) {
            die("Ocurrio un error al establecer la conexión a la Base de Datos: " . $ex);
        }
    }

    public function __destruct() {
        // Cierra la conexion a la BD
        $this->conn->close();
        $this->conn = NULL;
    }

    public function sec($variable) {
        /*
         * Funcion para filtrar variables
         * Elimina tags html y expresiones regulares
         * Previene XSS y SQL injection
         */
        //$variable = strip_tags($variable);
        $variable = htmlentities($variable);
        $variable = $this->conn->real_escape_string($variable);

        return $variable;
    }

    public function execute($query) {
        $this->conn->prepare($query);
        if ($this->result = $this->conn->query($query)) {
            return true;
        } else {
            printf($this->conn->error);
            return false;
        }
    }

}

?>