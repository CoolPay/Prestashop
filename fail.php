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
include(dirname(__FILE__).'/../../header.php');
require_once(dirname(__FILE__).'/coolpay.php');

if (_PS_VERSION_ >= '1.5.0.0') {
    die('Bad version');
}

$coolpay = new Coolpay();
$smarty = $coolpay->context->smarty;
$smarty->assign('status', Tools::getValue('status'));
$smarty->display(dirname(__FILE__).'/views/templates/front/fail.tpl');

include(dirname(__FILE__).'/../../footer.php');
