<?php use_helper('I18N', 'Date') ?>
<?php include_partial('profesional_tipo_dos/assets') ?>

<div id="sf_admin_container">
    <h1><?php echo __('Listado de subsectores profesionales', array(), 'messages') ?></h1>

    <?php include_partial('profesional_tipo_dos/flashes') ?>

    <div id="sf_admin_header">
        <?php include_partial('profesional_tipo_dos/list_header', array('pager' => $pager)) ?>
    </div>

    <div id="sf_admin_bar" class="filters_center" style="float: none;margin: auto;width: 450px;<?php echo (count($filtershow) <= 1) ? 'display: none;' : ''; ?>">
        <?php include_partial('profesional_tipo_dos/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
    </div>
    <?php if (count($filtershow) != 0): ?>
        <div class="clean clear clear_0" >&nbsp;</div>
    <?php endif; ?>

    <div id="sf_admin_content">
        <form action="<?php echo url_for('profesional_tipo_dos_collection', array('action' => 'batch')) ?>" method="post">
            <?php include_partial('profesional_tipo_dos/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions">
                <?php include_partial('profesional_tipo_dos/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('profesional_tipo_dos/list_actions', array('helper' => $helper)) ?>
            </ul>
        </form>
    </div>

    <div id="sf_admin_footer">
        <?php include_partial('profesional_tipo_dos/list_footer', array('pager' => $pager)) ?>
    </div>
</div>

<?php include_partial('global/setListWidth'); ?>
<script language="javascript">
    $(document).ready(function() {
        $(".sf_admin_list").css('padding-right', '0px');

<?php if ($sf_user->hasFlash('alert')): ?>
            alert("<?php echo $sf_user->getFlash('alert') ?>");
<?php endif; ?>

    });

    $("#hide_show_filters").click(function(){
        $("#sf_admin_bar").toggle();
    });

</script>