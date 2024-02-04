<?php

namespace App\Controllers;
use App\Models\DefaultModel;

class Home extends BaseController
{
    protected $model;

    public function __construct() {
        $this->model = new DefaultModel();
    }

    public function index()
    {   
        $dados['despesas'] = $this->model->lista_despesas();
        //dd($dados);
        return view('index', $dados);
    }

    public function add_despesa(){
        $descricao = $this->request->getPost('descricao');
        $valor = $this->request->getPost('valor');
        $data = $this->request->getPost('data'); 
        $dados = array(
            'descricao' => $descricao,
            'valor' => $valor,
            'data' => $data
        );
        $this->model->add_despesa($dados);

        return redirect()->to(base_url());
    }

    public function deletar_despesa($id){
        $this->model->deletar_despesa($id);

        return redirect()->to(base_url());
    }

    public function form_alteracao($id){
        $dados = $this->model->get_despesa($id);
        return view('alterar',$dados);
    }

    public function editar_despesa(){
        $descricao = $this->request->getPost('descricao');
        $valor = $this->request->getPost('valor');
        $data = $this->request->getPost('data');
        $dados = array(
            'descricao' => $descricao,
            'valor' => $valor,
            'data' => $data
        );
        $id = $this->request->getPost('Enviar');
        $this->model->alterar_despesa($id,$dados);

        return redirect()->to(base_url());
    }
}
