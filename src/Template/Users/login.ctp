<?= $this->Html->css('login')?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <?= $this->Flash->render('auth')?>
    <!-- Login Form -->
    <br></br>
    <?= $this->Form->create()?>
      <h3 class="fadeIn first">Sistema de usuarios</h3>
      <?= $this->Form->input('username', [ 'class' => 'fadeIn second', 'placeholder' => "Usuario", 'label' => false, 'required'])?>
      <?= $this->Form->input('pass', ['style' => '-webkit-text-security: disc;', 'class' => 'fadeIn third', 'placeholder' => "Contraseña", 'label' => false, 'required'])?>
      <?= $this->Form->button('Ingresar', ['class' => 'fadeIn fourth btn btn-primary' ])?>
    <?= $this->Form->end()?>
    <br></br>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Creado en CakePHP por -> Juan Pablo Rojas</a>
    </div>

  </div>
</div>