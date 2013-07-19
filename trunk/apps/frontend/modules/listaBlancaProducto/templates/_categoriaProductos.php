<div id="menu">
    <ul class="lista-categorias accordion" rel='<?php echo url_for('lista_blanca_productos') ?>'>
        <?php
        $i = 0;
        foreach ($categoriasSectorUno as $categoria) : $i++
            ?>

            <li class="<?php echo ($i == 0) ? 'first' : '' ?>">
                <a data-link="<?php echo url_for($url, array('sector1' => $categoria->getSlug())) ?>"
                   href='#'>
                       <?php echo image_tag('/images/uploads/thumbnails/' . $categoria->getImage(), array('class' => 'miniatura-categoria')) ?>
                    <div style="height:36px;">
                        <table cellpadding="0" cellspacing="0" border="0" width="78%" height="100%">
                            <tr>
                                <td height="100%" valign="middle"><span><?php echo $categoria->getName() ?></span></td>
                            </tr>
                        </table>
                    </div>
                </a>

                <ul>
                    <?php foreach ($categoria->getProductoTipoDos() as $categoria2) : ?>
                        <li><a href='#'
                               data-link="<?php echo url_for($url, array('sector1' => $categoria->getSlug(), 'sector2' => $categoria2->getSlug())) ?>"><?php echo $categoria2->getName() ?></a>

                            <?php if ($categoria2->getProductoTipoTres()->count() > 0) : ?>
                                <ul>
                                    <?php foreach ($categoria2->getProductoTipoTres() as $categoria3) : ?>
                                        <li><a href='#' data-link="<?php
                        echo url_for($url, array(
                            'sector1' => $categoria->getslug(),
                            'sector2' => $categoria2->getSlug(),
                            'sector3' => $categoria3->getSlug()))
                                        ?>">
                                                <?php echo $categoria3->getName(); ?></a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </li>

        <?php endforeach ?>
    </ul>
</div>