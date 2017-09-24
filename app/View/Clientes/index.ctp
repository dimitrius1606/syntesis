<h2>Listagem de Clientes</h2>
<div style="float:right; height:70px;">
    <b>Cadastrados este mês: <?=$thisMonth;?></b><br>
    <b>Cadastrados hoje: <?=$today;?></b>
</div>

<h4><?php echo $this->Html->link('Adicionar', array('action' => 'adicionar')); ?></h4>
<table>
    <tr>
        <th style="width:65px;text-align:center;">Código</th>
        <th>Nome</th>
        <th>sobrenome</th>
        <th>Data de Criação</th>
        <th>Última alteração</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($clientes as $cliente) {
        $dt_criacao = '';
        $dt_alteracao = '';

        $dtc = new \Datetime($cliente['Cliente']['dt_criacao']);
        $dt_criacao = $dtc->format('d/m/Y');

        $dta = new \Datetime($cliente['Cliente']['dt_alteracao']);
        $dt_alteracao = $dta->format('d/m/Y');
            ?>
            <tr>
                <td><?php echo $cliente['Cliente']['id']; ?></td>
                <td><?php echo $cliente['Cliente']['nome']; ?></td>
                <td><?php echo $cliente['Cliente']['sobrenome']; ?></td>
                <td><?php echo $cliente['Cliente']['dt_criacao']; ?></td>
                <td><?php echo $cliente['Cliente']['dt_alteracao']; ?></td>
                <td><?php echo $this->Html->link('Editar', array('action' => 'editar', $cliente['Cliente']['id'])); ?>
                    <?php echo $this->Html->link(
                        'Excluir', array(
                            'action' => 'excluir',
                            $cliente['Cliente']['id']), array('confirm' => 'Você tem certeza que quer excluir este usuário?')
                    ); ?></td>
            </tr>
    <?php
    }
    ?>
</table>




