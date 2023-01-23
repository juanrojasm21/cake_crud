<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class='col-md-6 offset-md-3 '>
        <?= $this->Html->link( __('Regresar'), ['action' => 'index']) ?>
        <br></br>
        <?= $this->Flash->render()?>
        <div class="card" style="width: 40rem; padding:2rem;">
            <div class='page-header'>
                <h2>Crear usuario</h2>
            </div>
            <?= $this->Form->create($user) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name',[
                        'label' => [
                            'class' => 'thingy',
                            'text' => 'Nombre'
                        ]]);
                    echo $this->Form->control('username', [
                        'label' => [
                            'class' => 'thingy',
                            'text' => 'Usuario'
                        ]]);
                    echo $this->Form->control('email',[
                        'label' => [
                            'class' => 'thingy',
                            'text' => 'Email'
                        ]], ['type' => 'email']);
                    echo $this->Form->control('pass', ['type' => 'password'], [
                        'label' => [
                            'class' => 'thingy',
                            'text' => 'Pass'
                        ]]);
                    echo $this->Form->control('role', ['options'=>['admin'=>'Administrador', 'user'=>'Usuario'], 'label'=>'Rol']);
                    echo $this->Form->control('active', [
                        'options'=>[1=>'Activo', 0=>'Inactivo'],
                        'label' => [
                            'class' => 'thingy',
                            'text' => 'Activo'
                        ]]);
                ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Enviar'), ['class'=> 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>