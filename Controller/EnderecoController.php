<?php

namespace Api_Cep\Controller;

use Api_Cep\Model\{EnderecoModel, CidadeModel};
use Exception;

class EnderecoController extends Controller
{
    public static function GetCepByLogradouro(): void
    {
        try
        {
            $logradouro = $_GET['logradouro'];

            $model = new EnderecoModel();
            $model ->getCepByLogradouro($logradouro);
            
            parent::GetResponseAsJson($model->rows);

        } catch(Exception $e){
            parent::GetResponseAsJson($e);
        }
    }

    public static function GetLogradouroByBairroAndCidade(): void
    {
    }

    public static function GetLogradouroByCep(): void
    {
    }

    public static function GetBairroByIdCidade(): void
    {
    }

    public static function GetCidadesByUF(): void
    {
    }
};
