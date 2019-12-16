<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->
<div class="clientes form large-12 medium-8 columns content">
    <legend>
        <h3><?= __('Atualizar clientes') ?>

        </h3>
    </legend>

    <html>

    <body>
        <?= $this->Form->create('clientes', array('id' => 'frm-mail', 'action' => 'atualizaclientexml', 'enctype' => 'multipart/form-data')) ?>
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <table width="600">
            <tr>
                <td>Aqui voce pode selecionar o arquivos com e extensão .xml:</td>
                <td><input type="file" name="file" /></td>
                <td><input type="submit" value="Enviar" /></td>
            </tr>
        </table>

        </form>
    </body>

    </html>


</div>

<script>
    function validForm() {

        var ret = true;
        var msg = "Campos com * são de preenchimento obrigatório!";


        if (ret) {
            $('#btn-save').attr('disabled', 'disabled');
            $("#frm-mail").submit();
        } else {
            objMsg.title = "Oooooops!";
            objMsg.message = msg;
            window.setTimeout(alertMsg, 10);
        }

        return ret;
    }
</script>