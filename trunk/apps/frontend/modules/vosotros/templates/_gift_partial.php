<?php use_helper('mihelper'); ?>
<div class="item">
    <?php if ($gift_record->getId()) : ?>
        <a href="<?php echo url_for('gift_list') ?>">
        <?php endif; ?>
        <div class="col_left">
            <?php
            if (file_exists(sfConfig::get('sf_gift_upload_path') . '/' . 'thumb_' . $gift_record->getImage())) {
                echo image_tag(sfConfig::get('sf_gift_upload_path') . '/' . 'thumb_' . $gift_record->getImage(), array('class' => 'gift-image',
                    'data-id' => $gift_record->getId(),
                    'class' => 'ciudad',
                    'id' => 'gift_image_' . $gift_record->getId(),
                    'data-med' => sfConfig::get('sf_gift_upload_path') . '/' . 'med_' . $gift_record->getImage()));
            }
            ?>
            <ul class='lista_detalles'>

                <li class="title"><?php echo $gift_record->getName(); ?></li>


                <li class="sector"><?php echo $gift_record->getRequirePoints(); ?><span class="negrita azul" ><?php echo __(' puntos'); ?></span></li>
                <li>
                    <span class="negrita verde"><?php echo __('Disponible para:'); ?></span>
                    <?php $heirarchy_records = $option['hierarchy_records'] ?>
                    <?php foreach ($heirarchy_records as $index => $hierarchy): ?>
                        <?php if ($gift_record->getHierarchy() <= $index): ?>
                            <p><?php echo $hierarchy ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </li>

            </ul>
        </div>


</div>    
<div class="hidden a-list" id="audit-list-<?php echo $gift_record->getId() ?>"></div>