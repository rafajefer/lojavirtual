<?php

class Conexao {

    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host='.SERVIDOR.';dbname='.BANCO, USUARIO, SENHA,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".CHARSET));
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (Exception $ex) {
                echo "Erro na conexão: " . $ex->getMessage();
            }
            return self::$instance;
        }
    }

    public static function prepare($sql) {
        return self::getInstance()->prepare($sql);
    }

}
