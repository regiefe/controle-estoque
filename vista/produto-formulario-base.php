<tr>
  <td>Produto</td>
  <td><input class="form-control" type="text" name="produto" value="<?=htmlspecialchars($produto['produto'] ?? '')?>"></td>
</tr>
<tr>
  <td>Preco</td>
  <td><input class="form-control" type="number" name="preco" value="<?=htmlspecialchars($produto['preco'] ?? '')?>"></td>
</tr>
<tr>
  <td>Descrição</td>
  <td><textarea class="form-control" name="descricao"><?=htmlspecialchars($produto['descricao'] ?? '')?></textarea></td>
</tr>
<tr>
  <td></td>
  <td><input type="checkbox" name="usado" <?=$usado ?? ''?> value="true">Usado</td>
</tr>
<tr>
  <td>Categorias</td>
  <td>
    <select name="categoria_id" class="form-control">
      <?php foreach ($categorias as $categoria):
            $essaEhCategoria = ($produto['categoria_id'] ?? null) == $categoria['id'];
            $selecao = $essaEhCategoria ? "selected='selected'" : "";
        ?>
        <option value="<?=$categoria['id']?>" <?=$selecao?>>
          <?=htmlspecialchars($categoria['nome'])?>
        </option>
      <?php endforeach ?>
    </select>
  </td>
</tr>
<tr>
  <td><button class="btn btn-primary"><?=htmlspecialchars($botaoTexto ?? 'Salvar')?></button></td>
</tr>
