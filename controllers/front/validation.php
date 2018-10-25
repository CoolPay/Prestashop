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
class CoolPayValidationModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $json = Tools::file_get_contents('php://input');
        if (!$json) {
            $json = $GLOBALS['HTTP_RAW_POST_DATA']; // Deprecated since PHP 5.6
        }
        $checksum = $_SERVER['HTTP_COOLPAY_CHECKSUM_SHA256'];

        $coolpay = new Coolpay();
        $coolpay->validate($json, $checksum);
    }
}
