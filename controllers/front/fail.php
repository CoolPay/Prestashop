<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    Kjeld Borch Egevang
 *  @copyright 2015
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  $Date: 2018/10/18 $
 *  E-mail: hello@coolpay.com
 */

/**
 * @since 1.5.0
 */
class CoolPayFailModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        Context::getContext()->smarty->assign('status', Tools::getValue('status'));
        $this->setTemplate('fail.tpl');
    }
}
