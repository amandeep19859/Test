
<?php if ($colaboradorpuntoshistorico->getTipoPunto() == 'Asignación de caja' || $colaboradorpuntoshistorico->getTipoPunto() == 'AsignaciÃ³n de caja'): ?>
  <?php if ($colaboradorpuntoshistorico->getPuntos()): ?>
    <?php $points = $colaboradorpuntoshistorico->getPuntos(); ?>
    <?php if (ceil($points) == floor($points)): ?>
      <?php echo $sf_user->getMoneyInFormat($points) . ' €'; ?>
    <?php else: ?>
      <?php echo $sf_user->getMoneyInFormat(abs($points)) . ' €'; ?>
    <?php endif; ?>
  <?php endif; ?>
<?php else: ?>
  <?php echo intval($colaboradorpuntoshistorico->getPuntos()) ? $sf_user->getMoneyInFormat(floor($colaboradorpuntoshistorico->getPuntos())) : ''; ?>
<?php endif; ?>

