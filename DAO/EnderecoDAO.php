<?php 

namespace Api_Cep\DAO;

use Api_Cep\Model\EnderecoModel;

class EnderecoDAO extends DAO 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectByCep(int $cep)
    {
        $sql = "SELECT * FROM logradouro WHERE cep = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$cep);
        $stmt->execute();

        $endereco_obj = $stmt->fetchObject("API_CEP\Model\EnderecoModel");

        $endereco_obj->arr_cidades = $this->selectCidadesByUF($endereco_obj->UF);

        return $endereco_obj;
    }

    public function selectLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
    {
        $sql = "SELECT * FROM logradouro WHERE descricao_bairro = ? AND id_cidade = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$bairro);
        $stmt->bindValue(2,$id_cidade);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectCidadesbyUF($uf)
    {
        $sql = "SELECT * FROM cidades WHERE uf = ? ORDER BY descricao";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$uf);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

}