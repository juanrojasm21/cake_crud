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
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h3><?= 'Usuario: '.h($user->name) ?></h3>
                <h6 class="card-subtitle mb-2 text-muted">Información personal</h6>
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Nombre:     ') ?></th>
                        <td><?= h($user->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Usuario:    ') ?></th>
                        <td><?= h($user->username) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email:      ') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Pass:       ') ?></th>
                        <td><?= h($user->pass) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Rol:        ') ?></th>
                        <td><?= h($user->role) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id:     ') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Activo') ?></th>
                        <td><?= $this->Number->format($user->active) ?></td>
                    </tr>
                </table>                                                
            </div>
        </div>
            
    </div>
    
</div>
