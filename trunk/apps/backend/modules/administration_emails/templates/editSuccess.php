<?php use_helper('I18N', 'Date') ?>
<?php include_partial('administration_emails/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editar correo de Administrador', array(), 'messages') ?></h1>

  <?php include_partial('administration_emails/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('administration_emails/form_header', array('administration_emails' => $administration_emails, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('administration_emails/form', array('administration_emails' => $administration_emails, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('administration_emails/form_footer', array('administration_emails' => $administration_emails, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#administration_emails_user_id').bind('change', function(){
      $.ajax({
        url:'/backend.php/administration_emails/getDefaults',
        data:{id: $(this).val()},
        type: 'GET',
        dataType: 'JSON',
        success: function(record){
          if(record.status == 200){
            $('#administration_emails_permission_id').val(record.data);
          }else{
            $('#administration_emails_permission_id').val(0);
          }
        }
      })
    });
  })
</script>