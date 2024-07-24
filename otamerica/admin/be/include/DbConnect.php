<?php

class DbConnect
{
    private $conn;

    function __construct()
    {
    }
    /**
     * Establishing database connection
     * @return database connection handler
     */
    function connect()
    {
        //include_once dirname(__FILE__) . "../config.php";
        include __DIR__ . "/../common/config.php";
        try {
            $this->conn = new PDO(
              $config['secure']['database']['connection'],
              $config['secure']['database']['username'],
              $config['secure']['database']['password']
            );

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // returing connection resource
            return $this->conn;
        } catch (PDOException $ex) {
            error_log($ex);
            // if the environment is development, show error details, otherwise show generic message
            if (defined("ENVIRONMENT") && ENVIRONMENT == "development") {
                echo "An error occured connecting to the database! Details: " .
                    $ex->getMessage();
            } else {
                echo "An error occured connecting to the database!";
            }
            exit();
        }
    }
}
?>
