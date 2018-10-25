{*
* NOTICE OF LICENSE
* $Date: 2016/01/31 17:51:40 $
* Written by Kjeld Borch Egevang
* E-mail: hello@coolpay.com
*}

{if $status == 'ok'}
<p>{l s='Your order on' mod='coolpay'} <span class="bold">{$shop_name|escape:'htmlall':'UTF-8'}</span> {l s='is complete.' mod='coolpay'}
	<br /><br /><span class="bold">{l s='Your order will be sent very soon.' mod='coolpay'}</span>
	<br /><br />{l s='For any questions or for further information, please contact our' mod='coolpay'} <a href="{$base_dir_ssl|escape:'htmlall':'UTF-8'}contact-form.php">{l s='customer support' mod='coolpay'}</a>.
</p>

{else}

<p class="alert alert-warning warning">{l s='Your order on' mod='coolpay'} <strong>{$shop_name|escape:'htmlall':'UTF-8'}</strong> {l s='failed because the payment was not confirmed.' mod='coolpay'}
	<br /><br />{l s='For any questions or for further information, please contact our' mod='coolpay'} <a href="{$base_dir_ssl|escape:'htmlall':'UTF-8'}contact-form.php">{l s='customer support' mod='coolpay'}</a>.
</p>
{/if}
