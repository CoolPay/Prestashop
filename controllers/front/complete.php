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
class CoolPayCompleteModuleFrontController extends ModuleFrontController
{
    public function init()
    {
        $id_cart = (int)Tools::getValue('id_cart');
        $id_module = (int)Tools::getValue('id_module');
        $key = Tools::getValue('key');
        if (!$id_module || !$key) {
            Tools::redirect('history.php');
        }
        for ($i = 0; $i < 10; $i++) {
            /* Wait for validation */
            $trans = Db::getInstance()->getRow('SELECT *
                FROM '._DB_PREFIX_.'coolpay_execution
                WHERE `id_cart` = '.$id_cart.'
                ORDER BY `id_cart` ASC');
            if ($trans && $trans['accepted']) {
                break;
            }
            sleep(1);
        }
        if ($trans && !$trans['accepted']) {
            $coolpay = new Coolpay();
            $setup = $coolpay->getSetup();
            $json = $coolpay->doCurl('payments/'.$trans['trans_id']);
            $vars = $coolpay->jsonDecode($json);
            $json = Tools::jsonEncode($vars);
            if ($vars->accepted == 1) {
                $checksum = $coolpay->sign($json, $setup->private_key);
                $coolpay->validate($json, $checksum);
            }
        }
        unset($this->context->cookie->id_cart);
        parent::init();
        $id_order = Order::getOrderByCartId((int)$id_cart);
        if (!$id_order) {
            Tools::redirect('history.php');
        }
        $order = new Order((int)$id_order);
        $customer = new Customer($order->id_customer);
        if (!Validate::isLoadedObject($order) ||
                $customer->secure_key != $key) {
            Tools::redirect('history.php');
        }
        Tools::redirect(
            'index.php?controller=order-confirmation&id_cart='.$id_cart.
            '&id_module='.$id_module.
            '&id_order='.$id_order.
            '&key='.$key
        );
    }
}
