<?php use_helper('mihelper'); ?>

<div class="box_main">
    <div class="box_top_c"></div>
    <div class="box_mid">
        <div class="box_left">
            <ul>
                <li class="prod_head">
                    <?php if ($producto->getconcursoDestacado()->getId()) : ?>
                        <a href="<?php echo url_for('concurso/show?id=' . $producto->getconcursoDestacado()->getId()) ?>">
                            <?php echo '<strong style="color:#B41B1D;"> ' . $producto->getName() . '</strong>
                                        <strong style="color:#166393;"> ' . $producto->getMarca() . '</strong>' ?>
                        </a>
                        <?php echo '<strong style="color:#7D7873;"> ' . $producto->getModelo() . '</strong>'; ?>
                    <?php else: ?>
                        <?php echo '<strong style="color:#B41B1D;"> ' . $producto->getName() . '</strong>
                                    <strong style="color:#166393;"> ' . $producto->getMarca() . '</strong>
                                    <strong style="color:#7D7873;"> ' . $producto->getModelo() . '</strong>'; ?>
                    <?php endif ?>
                </li>
                <li class="sect_org"><?php echo $producto->getTresProduct(); ?></li>
                <li class="audit_rel">
                    <a title='Comentarios de los consumidores' rel="Comentarios de los consumidores" class='auditorias' href='<?php echo url_for('lista_negra_comentarios', array('slug' => $producto->getSlug(), 'tipo' => 'producto')) ?>'>Comentarios</a>
                </li>
                <li class="indi">
                    <a title='Por qué aparece aquí este producto no recomendado' rel="¿Por qué aparece aquí?" class='texto_lista_negra' href='javascript:void(0)'>
                        ¿Por qué aparece aquí?
                    </a>
                    <div style='display:none'>
                        <span style="float: left; margin-top:20px; font-size: 14px;"><?php echo $sf_data->getRaw('producto')->getTextoListaNegra(); ?></span>
                    </div>
                </li>
                <li class="fav">
                    <?php echo image_tag('star.png'); ?><a href="javascript:void(0)" data-id="<?php echo $producto->getId() ?>" title="Añade a Favoritos un producto recomendado" class="favourit anadir_favoriros">añade a favoritos</a>
                </li>
            </ul>
        </div>
        <div class="box_btn" style="height: auto; ">
            <div style="height: 42px;">&nbsp;</div>
            <a title="Comenta un producto no recomendado" class="btn-audita login_required" href="<?php echo url_for('lista_negra_producto_comenta', array('slug' => $producto->getSlug()), array('dialog_id' => 'login_required')) ?>">Comenta</a>
        </div>
        <div class="box_rss">
            <span class="rss" title="Añade productos recomendados a RSS"></span>
        </div>
    </div>
    <div class="box_btm_c"></div>
</div>