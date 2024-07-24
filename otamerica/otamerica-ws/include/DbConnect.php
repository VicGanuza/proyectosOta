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
        include_once "../common/config.php";
        try {
            $this->conn = new PDO(
              $config['secure']['database']['connection'],
              $config['secure']['database']['username'],
              $config['secure']['database']['password']//,
               //array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
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
/*
    function connectUserActiveDirectory($username, $password)
    {
        include_once "ConfigAD.php";
        $ldap = ldap_connect(LDAP_SERVER);
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
        $this->conn = ldap_bind(
            $ldap,
            LDAP_DOMAIN . "\\" . $username,
            $password
        );
        return $this->conn;
    }

    function connectEmailActiveDirectory($username, $password)
    {
        include_once "ConfigAD.php";
        $ldap = ldap_connect(LDAP_SERVER);
        $connection_user = LDAP_USER;
        $domain = LDAP_DOMAIN;
        $this->conn = ldap_bind(
            $ldap,
            "{$connection_user}@{$domain}",
            LDAP_PASS
        );
        return $this->conn;
    }

    function connectConf()
    {
        //include_once dirname(__FILE__) . "../config.php";
        include_once "Config.php";
        try {
            $this->conn = new PDO(
                "mysql:host=" .
                    DB_HOST .
                    ";dbname=" .
                    DB_NAME_CONFIG .
                    ";charset=utf8",
                DB_USERNAME,
                DB_PASSWORD
            );

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // returing connection resource
            return $this->conn;
        } catch (PDOException $ex) {
            // if the environment is development, show error details, otherwise show generic message
            error_log($ex);
            if (defined("ENVIRONMENT") && ENVIRONMENT == "development") {
                echo "An error occured connecting to the database! Details: " .
                    $ex->getMessage();
            } else {
                echo "An error occured connecting to the database!";
            }
            exit();
        }
    }

    function connectGral($base)
    {
        //include_once dirname(__FILE__) . "../config.php";
        include_once "Config.php";
        try {
            $this->conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . $base . ";charset=utf8",
                DB_USERNAME,
                DB_PASSWORD
            );

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // returing connection resource
            return $this->conn;
        } catch (PDOException $ex) {
            // if the environment is development, show error details, otherwise show generic message
            if (defined("ENVIRONMENT") && ENVIRONMENT == "development") {
                echo "An error occured connecting to the database! Details: " .
                    $ex->getMessage();
            } else {
                error_log($ex);
                echo "An error occured connecting to the database!";
            }
            exit();
        }
    }*/
}
?>
