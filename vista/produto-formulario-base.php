<tr>
  <td>Produto</td>
  <td><input class="form-control" type="text" name="produto" value="<?=$produto->produto?>"></td>
</tr>
<tr>
  <td>Preco</td>
  <td><input class="form-control" type="number" name="preco" value="<?=$produto->preco?>"></td>
</tr>
<tr>
  <td>Descrição</td>
  <td><textarea class="form-control" name="descricao"><?=$produto->descricao?></textarea></td>
</tr>
<tr>
  <td></td>
  <td><input type="checkbox" name="usado" <?=$usado?> value="true">Usado</td>
</tr>
<tr>
  <td>Categorias</td>
  <td>
    <select name="categoria_id" class="form-control">
      <?php foreach ($categorias as $categoria):
            $essaEhCategoria = $produto->categoria_id == $categoria['id'];
            $selecao = $essaEhCategoria ? "selected='selected'":"";
        ?>
        <option value="<?=$categoria['id']?>" <?=$selecao?>>
          <?=$categoria['nome']?>
        </option>
      <?php endforeach ?>
    </select>
  </td>
</tr>
<tr>
  <td><button class="btn btn-primary">Alterar</button></td>
</tr>
