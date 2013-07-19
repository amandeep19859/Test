<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo get_partial('colaboradorpuntoshistorico/created_at', array('type' => 'list', 'colaboradorpuntoshistorico' => $colaboradorpuntoshistorico)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_puntos">
  <?php echo get_partial('colaboradorpuntoshistorico/puntos', array('type' => 'list', 'colaboradorpuntoshistorico' => $colaboradorpuntoshistorico)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_tipo_punto">
  <?php
      $tipoPunto = $colaboradorpuntoshistorico->getTipoPunto();                  
      $strlen =  strlen($tipoPunto);
      $temp='';
      
      if($strlen > 20)
      {
        $temp .= substr($tipoPunto, 0, 20);
        $temp .= "<br />";
        $temp .= substr($tipoPunto, 20, 20);
        echo $temp;
      }
      else
      {
        echo $tipoPunto;
      }      
  ?>
</td>
<td class="sf_admin_text sf_admin_list_td_descripcion">
  <?php echo $colaboradorpuntoshistorico->getDescripcion() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo get_partial('colaboradorpuntoshistorico/user_id', array('type' => 'list', 'colaboradorpuntoshistorico' => $colaboradorpuntoshistorico)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_hierarchy" style="width: 150px;">
  <?php echo get_partial('colaboradorpuntoshistorico/hierarchy', array('type' => 'list', 'colaboradorpuntoshistorico' => $colaboradorpuntoshistorico)) ?>
</td>
