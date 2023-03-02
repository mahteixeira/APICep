<?php 

use Exception;
use \PDO;
use PDOExeception;

abstract class DAO extends PDO
{
    protected $conexao;

    public function __construct()
    {
        try
        {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];

            $dns = "mysql:hosts" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

            $this->conexao = new PDO($dns, $_ENV['db']['user'], $_ENV['db']['pass'], $options);
        }
        
        catch (PDOException $e) {
            throw new Exception("Ocorreu um erro ao tentar conectar com o banco",0,$e);
        }
        
    }
}