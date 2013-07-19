<?php

/**
 * sfAdminDash base components.
 *
 * @package    plugins
 * @subpackage sfAdminDash
 * @author     Ivan Tanev aka Crafty_Shadow @ webworld.bg <vankata.t@gmail.com>
 * @version    SVN: $Id: BasesfAdminDashComponents.class.php 25335 2009-12-14 12:49:08Z Crafty_Shadow $
 */
class BasesfAdminDashComponents extends sfComponents {

    /**
     * The main navigation component for the sfAdminDash plugin
     */
    public function executeHeader() {
        $this->items = sfAdminDash::getItems();
        $this->categories = sfAdminDash::getCategories();
        $this->called_from_component = true; // BC check

        if (sfConfig::get('sf_error_404_module') == $this->getContext()->getModuleName() && sfConfig::get('sf_error_404_action') == $this->getContext()->getActionName()) {
            sfAdminDash::setProperty('include_path', false); // we don't render the breadcrumbs when we are in a 404 error module/action
            $this->module_link = null;
            $this->action_link = null;
        } else {
            $this->module_link = strtolower((preg_replace('/\B([A-Z])/', '_$1', $this->getContext()->getModuleName())));
            if (!sfAdminDash::routeExists($this->module_link, $this->getContext())) {
                // if we cannot sniff the module link, we set it to null and later simply output is as a string in the breadcrumbs
                $this->module_link = null;
                // but before we do that, one last check - it's possible that the module name is different from the object name and that's the reason we can't sniff it
                foreach (sfAdminDash::getAllItems() as $name => $item)
                    if ($name == $this->getContext()->getModuleName()) {
                        $this->module_link = $item['url'];
                        break;
                    }
            }

            $this->module_link_name = sfAdminDash::getModuleName($this->getContext());

            if ($this->getContext()->getActionName() != 'index') {
                $this->action_link = $this->getContext()->getRouting()->getCurrentInternalUri();
                $this->action_link_name = sfAdminDash::getActionName($this->getContext());
            } else {
                $this->action_link = null;
            }
            if ($this->getContext()->getModuleName() == 'listaNegraProducto') {
                $this->module_link = 'producto_listaNegraProducto';
            }
            if ($this->getContext()->getModuleName() == 'cuestionario_baja') {
                $this->module_link = 'cuestionario_baja';
            }
            if ($this->getContext()->getModuleName() == 'cuestionariobajavalue') {
                $this->module_link = 'cuestionario_baja_value';
            }
            if ($this->getContext()->getModuleName() == 'contribuciones_destacadas_empresa') {
                $this->module_link = 'contribucion_contribuciones_destacadas_empresa';
            }
            if ($this->getContext()->getModuleName() == 'contribuciones_destacadas_producto') {
                $this->module_link = 'contribucion_contribuciones_destacadas_producto';
            }
            if ($this->getContext()->getModuleName() == 'blocked_users') {
                $this->module_link = 'sf_guard_user_profile_blocked_users';
            }
        }
    }

}