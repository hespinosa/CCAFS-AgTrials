<script>
    saveAndClose();
    function saveAndClose(){
        parent.document.getElementById("variablesmeasured").value = "<?php echo $name ?>";
        parent.document.getElementById("VariablesMeasureds").innerHTML  = "<?php echo html_entity_decode($html, ENT_QUOTES, 'UTF-8') ?>";
        self.parent.tb_remove();
        window.parent.ChangeList();
        if(window.parent.$('#variablesmeasured').attr('value') != '')
            window.parent.$('#Div_variablesmeasured_list_Clear').show();
        else
            window.parent.$('#Div_variablesmeasured_list_Clear').hide();
    }
</script>