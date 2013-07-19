<?php use_helper('I18N', 'Date') ?>
<?php include_partial('planes_de_accion_producto/assets') ?>

<div id="sf_admin_container">
    <h1><?php echo __('Listado de Planes de acción de Producto', array(), 'messages') ?></h1>

    <?php include_partial('planes_de_accion_producto/flashes') ?>

    <div id="sf_admin_header">
        <?php include_partial('planes_de_accion_producto/list_header', array('pager' => $pager)) ?>
    </div>

    <div id="sf_admin_bar">
        <?php include_partial('planes_de_accion_producto/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">
        <form action="<?php echo url_for('contribucion_planes_de_accion_producto_collection', array('action' => 'batch')) ?>" method="post">
            <?php include_partial('planes_de_accion_producto/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions">
                <?php include_partial('planes_de_accion_producto/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('planes_de_accion_producto/list_actions', array('helper' => $helper)) ?>
            </ul>
        </form>
    </div>

    <div id="sf_admin_footer">
        <?php include_partial('planes_de_accion_producto/list_footer', array('pager' => $pager)) ?>
    </div>
</div>
<script language="javascript">
    $(document).ready(function() {
        if('<?php echo!count($filtershow); ?>'){
            $("#sf_admin_bar").hide();
        }
        $("#sf_admin_bar").css('float', 'none');
        $("#sf_admin_bar").css('margin', 'auto');
        $("#sf_admin_bar").css('width', '490px');
    
        $(".sf_admin_list").css('padding-right', '0px');
    
    });
  
    $("#hide_show_filters").click(function(){
        $("#sf_admin_bar").toggle();
    });
</script>
<script type='text/javascript'>
    function disableSectorTres() {
        if ($('#contribucion_filters_producto_tipo_tres_id option').size() <= 1 && $('#contribucion_filters_producto_tipo_dos_id option').size() > 1) {
            $('#contribucion_filters_producto_tipo_tres_id')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Selecciona tipo de producto</option>');
            $('#contribucion_filters_producto_tipo_tres_id').attr('disabled', 'disabled');
        }
        else {

            $('#contribucion_filters_producto_tipo_tres_id').removeAttr('disabled');
        }
    }
    ;

    $(function () {
        disableSectorTres();
        $("#contribucion_filters_producto_tipo_dos_id").change(function () {
            disableSectorTres();
            
            if($("#contribucion_filters_producto_tipo_dos_id").val() == ''){
                $('#contribucion_filters_producto_tipo_tres_id').attr('disabled', 'disabled');
                //   $('#empresa_filters_empresa_sector_tres_id').removeAttr('disabled');
            }
        })

        if($("#contribucion_filters_producto_tipo_dos_id").val() == ''){
            $('#contribucion_filters_producto_tipo_tres_id').removeAttr('disabled');
        }
        //  autoProvincias('empresa_filters');
    });
</script>

