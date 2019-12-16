<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
//pr($clientes);
//exit;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

<div class="clientes form large-12 medium-8 columns content">


    <h3><?= __('Envio de E-mail') ?>
    </h3>



    <?= $this->Form->create('clientes', array('id' => 'frm-mail', 'action' => 'mailenv')) ?>


    <hr>
    <div>
        Cliente:
        <select data-placeholder="Adicione os cliente" multiple class="chosen-select" id="cliente" name="cliente[]">
            <?php foreach ($clientes as $cliente) : ?>
                <option value="<?= $cliente['email'] ?>">
                    <?= $cliente['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        Assunto: <input type="text" name="Subject" value=""><br>
        Corpo: <textarea name="Body" class="form-control" cols="15" rows="5"></textarea>
    </div>
    </form>

    <button id="btn-save" type="button" onclick="return validForm();" class="btn btn-shadow  disable-submit-button text-white"><i class="la la-check"></i>SALVAR</button>

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



<script type="text/javascript">
    $(".chosen-select").chosen({
        no_results_text: "Nada Selecionado!"
    })


    $("#deselect-colunas2").click(function() {
        var ids = [];
        var cont = 0;
        $("#cliente option").each(function() {
            var $this = $(this);
            if ($this.length) {
                var id = $this.val();
                ids[cont] = id;
                cont++;
            }
        });
        $("#cliente").val('').trigger("change");
    });
    $("#select-colunas2").click(function() {
        var ids = [];
        var cont = 0;
        $("#cliente option").each(function() {
            var $this = $(this);
            if ($this.length) {
                var id = $this.val();
                ids[cont] = id;
                cont++;
            }
        });
        $("#cliente").val(ids).trigger("change");
    });
</script>