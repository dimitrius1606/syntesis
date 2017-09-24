<h3 style="height:30px; margin: 10px auto; cursor: pointer; color: red" onclick="history.go(-1);">Voltar</h3>
<?php
echo $this->Form->create('Cliente');
echo $this->Form->input('nome');
echo $this->Form->input('sobrenome');
echo $this->Form->hidden('dt_criacao', array('default' => date('y-m-d')));
echo $this->Form->input('Enviar', array('label' => FALSE, 'type' => 'submit'));
echo $this->Form->end();
?>