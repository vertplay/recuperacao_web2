<form action="<?=base_url('/add')?>" method="POST" enctype="multipart/form-data">
    <label for="descricao">Cadastrar Despesa:</label><br>
        <input type="text" name="descricao" id="descricao" placeholder="descrição" required><br/>
        <input type="number" step="0.01" name="valor" id="valor" placeholder="valor" required><br/>
        <input type="date" name="data" id="data" value="<?=date('Y-m-d' ,time())?>" required> <br/>
    <button type="submit" name="Enviar">Enviar</button>
</form>
<hr>


<?php foreach($despesas as $t){?>
    <div style="border-bottom:1px solid #000">
        <p><?=$t['descricao']?> | <?=date_format(date_create($t['data']), 'd/m/Y')?></p>
        <p>R$ <?=number_format($t['valor'], 2)?> </p>
        <a href="<?=base_url('/editar/'.$t['id'])?>">Editar</a> <a href="<?=base_url('/deletar/'.$t['id'])?>">Deletar</a>
    </div>


<?php } ?>