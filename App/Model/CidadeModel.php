<?php 

namespace Api_Cep\Model;

use Api_Cep\DAO\EnderecoDAO;

class CidadeModel extends Model
{
    public $id_cidade, $descricao, $uf, $codigo_ibge, $ddd;

    public function getCidadesByUF($uf)
    {
        $dao = new EnderecoDAO;

        $this->rows = $dao->selectCidadesbyUF($uf);
    }
}