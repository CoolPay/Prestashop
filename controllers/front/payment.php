<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    Kjeld Borch Egevang
 *  @copyright 2015 Quickpay
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  $Date: 2016/11/12 20:35:49 $
 *  E-mail: helpdesk@coolpay.net
 */

/**
 * @since 1.5.0
 */
class CoolPayPaymentModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $coolpay = new Coolpay();
        $coolpay->payment();
    }
}
