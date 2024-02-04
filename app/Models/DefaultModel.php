<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class DefaultModel extends Model{
    protected $db, $builder;

    public function __construct(){

        $this->db= \Config\Database::connect();
        $this->builder = $this->db->table('recuperacao');
    }

    public function get_despesa($id){
        $this->builder->select('id, descricao, valor, data');
        $dados = $this->builder->getWhere("id = $id")->getResultArray();
        return $dados[0];
    }
    
    public function add_despesa($dados){
        $this->builder->insert($dados);
    }
    public function deletar_despesa($id){
        $this->builder->where("id = $id");
        $this->builder->delete();
    }
    public function alterar_despesa($id, $despesa){
        $this->builder->where("id = $id");
        $this->builder->update($despesa);
    }
    public function lista_despesas(){
        $this->builder->select('id, descricao, valor, data');
        $this->builder->orderBy("data", "asc");
        return $this->builder->get()->getResultArray();
    }
}