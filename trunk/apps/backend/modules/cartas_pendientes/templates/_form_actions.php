<ul class="sf_admin_actions" style="margin: 10px 10px 10px 0 !important;">
    <input type="hidden" value="<?php echo $sf_params->get('letter_id') ?>" name="letter_id" />
    <?php if ($form->isNew()): ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
        <?php echo $helper->linkToList(array('params' => array(), 'class_suffix' => 'list', 'label' => 'Back to list',)) ?>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
        <?php echo $helper->linkToSaveAndAdd($form->getObject(), array('params' => array(), 'class_suffix' => 'save_and_add', 'label' => 'Save and add',)) ?>
    <?php else: ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
        <?php echo $helper->linkToList(array('params' => array(), 'class_suffix' => 'list', 'label' => 'Back to list',)) ?>
        <li class="sf_admin_action_volver">
            <?php if (method_exists($helper, 'linkToVolver')): ?>
                <?php echo $helper->linkToVolver($form->getObject(), array('label' => 'Volver a la carta', 'params' => array(), 'class_suffix' => 'volver',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Volver a la carta', array(), 'messages'), 'cartas_pendientes/ListVolver?id=' . $sf_params->get('letter_id'), array()) ?>
            <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
        <?php echo $helper->linkToSaveAndAdd($form->getObject(), array('params' => array(), 'class_suffix' => 'save_and_add', 'label' => 'Save and add',)) ?>
    <?php endif; ?>
</ul>