<?php 
    require_once '../modelo/banco-usuario.php';
    require_once '../modelo/con.php';
    $lsUsuario = listaUsuarios($con);
?>
<h2>Usuario cadastrado</h2>
<?php foreach($lsUsuario as $usuario):?>
<table class="table">
  <tr>
    <td>Email</td>
    <td><?=$usuario['email']?></td> 
    <td>
        <form action="../controle/remover-usuario.php" method="post">
            <input type="hidden" name="id" value="<?=$usuario['id']?>" >
            <button class="btn btn-danger">Remover</button>
        </form>
    </td> 
  </tr> 
</table>
<?php endforeach;?>  
</body>
</html>
<?php require_once 'cabecalho.php';?>