<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contratanos/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nuevo formulario  Contrátanos para Empresa/Entidad', array(), 'messages') ?></h1>

  <?php include_partial('contratanos/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('contratanos/form_header', array('contratanos' => $contratanos, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('contratanos/form', array('contratanos' => $contratanos, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('contratanos/form_footer', array('contratanos' => $contratanos, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    showBefore();
    $('#contratanos_antes').bind('change', function(){
      showBefore();
    });
    
    
  });
  function showBefore(){
    if($('#contratanos_antes').val() == 1){
        $('.sf_admin_form_field_what').show();
      }else{
        $('.sf_admin_form_field_what').hide();
      }
  }
  
  function ceuta_melilla(f,g){
    var state2city = new Array();<?php foreach (StatesTable::getCiudadesAutonomas() as $city) printf('state2city[%d]=%d;', $city['states_id'], $city['id']) ?>

    if(state2city[f.val()]) g.val(state2city[f.val()]).attr("disabled","disabled");
  }
    $("#contratanos_states_id").change(function(){ ceuta_melilla($(this),$("#contratanos_city_id")) });
    $("#newContratanosForm").bind("submit",function(){$("#contratanos_city_id").removeAttr("disabled");});
    ceuta_melilla($("#contratanos_states_id"),$("#contratanos_city_id"));
</script>