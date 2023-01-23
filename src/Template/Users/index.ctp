<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
    array_push($columns, [
        'title' => __('Acciones'), // or ''
        'data' => 'id',
        'sortable' => false,
        'searchable' => false,
        'render' => $this->DataTables->callback('myLinkBuilder', [$this->Url->build(['action' => 'edit']), $this->Url->build(['action' => 'view']), $this->Url->build(['action' => 'delete'])]),
    ]);
    debug($columns);
    $options = [
        'ajax' => [
            'url' => $this->Url->build() // current controller, action, params
        ],
        'data' => $data,
        'deferLoading' => $data->count(), // https://datatables.net/reference/option/deferLoading
        'columns' => $columns,
        'prefixSearch' => true
    ];
    
?> 

<div class="row">
    <div class='col-md-12'>
        <nav class="navbar bg-light">
            <form class="container-fluid justify-content-end">
                <?= $this->Html->link(__('Salir'), ['action' => 'logout'], ['class'=> 'btn btn-primary']) ?>
                
            </form>
        </nav>
        
        <div class='page-header'>
            <br></br>
            <h2>Usuarios</h2>
        </div>
        <br>
        <div>
            <?= $this->Html->link( __('Agregar'), ['action' => 'add'], ['class'=> 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Exportar CSV'), ['action' => 'exportTxtCsv', 'csv'], ['class'=> 'btn btn-primary']); ?>
            <?= $this->Html->link(__('Exportar TXT'), ['action' => 'exportTxtCsv', 'txt'], ['class'=> 'btn btn-primary']); ?>
            <?= $this->Html->link(__('Exportar Excel'), ['action' => 'exportExcel', 'csv'], ['class'=> 'btn btn-primary']); ?>
        </div>
        <br>
        <div class = 'row'>
            <div class='col-md-12'>
                <?php echo $this->DataTables->table('users-table', $options, ['class' => 'table table-striped']); ?>
            </div>
        </div>
        <br>
    </div>
    
</div>
