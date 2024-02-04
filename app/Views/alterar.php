<form action="<?=base_url('/editar')?>" method="POST" enctype="multipart/form-data">
    <label for="descricao">Alterar Despesa:</label><br>
        <input type="text" name="descricao" id="descricao" placeholder="descrição" value="<?=$descricao?>" required><br/>
        <input type="number" step="0.01" name="valor" id="valor" placeholder="valor" value="<?=$valor?>" required><br/>
        <input type="date" name="data" id="data" value="<?=$data?>" required> <br/>
    <button type="submit" name="Enviar" value="<?=$id?>">Enviar</button>
</form>
<hr>