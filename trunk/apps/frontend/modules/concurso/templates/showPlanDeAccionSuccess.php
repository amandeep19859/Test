<?php use_helper('Text','Concursos','Date') ?>
<div id="title_concurso"><?php print link_to($concurso->name, url_for_concurso($concurso)) ?></div>
<div id="fecha"><?php echo format_datetime($concurso->created_at, "p", "es_ES") ?></div>
<p class="strong"><?php print __('Plan de Acción') ?></p>
<div id="text">
    <?php print html_entity_decode($contribucion->getPlanAccion()) ?>
</div>
