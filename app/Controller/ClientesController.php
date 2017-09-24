<?php

App::uses('AppController', 'Controller');

class ClientesController extends AppController {

    public $helpers = array("Form", "Html");

    public function index() {
        $this->set("title", "Clientes");

        $clientes = $this->Cliente->find('all');
        $this->set('clientes', $clientes);

        $today = $this->Cliente->find('all', array('conditions'=>array('DATE(dt_criacao)' => date('Y-m-d'))));
        $this->set('today', sizeof($today));

        $thisMonth = $this->Cliente->find('all', array('conditions'=>array('EXTRACT(MONTH FROM dt_criacao)' => date('m'))));
        $this->set('thisMonth', sizeof($thisMonth));
    }

    public function adicionar() {
        $this->set('title', 'Adicionar usuário');

        if ($this->request->is("post")) {
            $this->Cliente->create();

            if ($this->Cliente->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__("Registro salvo com sucesso."));
                $this->redirect(array("action" => '/index/'));
            } else {
                $this->Session->setFlash(__("Erro: não foi possível salvar o registro."));
                $this->redirect(array("action" => '/adicionar/'));
            }
        }
    }

    public function editar($id = NULL) {
        $this->set("title", "Editar Usuário");
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Cliente->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'));
                $this->redirect(array('action' => '/index/'));
            } else {
                $this->Session->setFlash(__('Erro: não foi possível salvar o registro.'));
            }
        } else {
            $this->request->data = $this->Cliente->read(NULL, $id);
        }
    }

    public function excluir($id = NULL) {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }
        if ($this->Cliente->delete()) {
            $this->Session->setFlash(__('Registro excluído com sucesso.'));
            $this->redirect(array('action' => '/index/'));
        }
        $this->Session->setFlash(__('Erro: não foi possível excluir o registro.'));
        $this->redirect(array('action' => '/index/'));
    }	

}

?>