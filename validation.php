<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    Kjeld Borch Egevang
 *  @copyright 2018 Coolpay
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  $Date: 2018/10/19 05:14:59 $
 *  E-mail: hello@coolpay.com
 */

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__).'/coolpay.php');

if (_PS_VERSION_ >= '1.5.0.0') {
    die('Bad version');
}

$json = Tools::file_get_contents('php://input');
/* HTTP_RAW_POST_DATA deprecated since PHP 5.6 */
if (!$json) {
    $json = $GLOBALS['HTTP_RAW_POST_DATA'];
}
$checksum = $_SERVER['HTTP_COOLPAY_CHECKSUM_SHA256'];

$coolpay = new Coolpay();
$coolpay->validate($json, $checksum);
