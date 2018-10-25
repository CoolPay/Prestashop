{*
* NOTICE OF LICENSE
* $Date: 2016/02/02 11:50:13 $
* Written by Kjeld Borch Egevang
* E-mail: hello@coolpay.com
*}

{if $status == 'currency'}
<p class="alert alert-warning warning">{l s='Your order on' mod='coolpay'} <strong>{$shop_name|escape:'htmlall':'UTF-8'}</strong> {l s='failed because the currency was changed.' mod='coolpay'}
</p>
<div class="box">
	{l s='Please fill the cart again.' mod='coolpay'}
	<br /><br />{l s='For any questions or for further information, please contact our' mod='coolpay'} <a href="{$base_dir_ssl|escape:'htmlall':'UTF-8'}contact-form.php">{l s='customer support' mod='coolpay'}</a>.
</div>
{/if}

{if $status == 'test'}
<p class="alert alert-warning warning">{l s='Your order on' mod='coolpay'} <strong>{$shop_name|escape:'htmlall':'UTF-8'}</strong> {l s='failed because a test card was used for payment.' mod='coolpay'}
</p>
<div class="box">
	{l s='Please fill the cart again.' mod='coolpay'}
	<br /><br />{l s='For any questions or for further information, please contact our' mod='coolpay'} <a href="{$base_dir_ssl|escape:'htmlall':'UTF-8'}contact-form.php">{l s='customer support' mod='coolpay'}</a>.
</div>
{/if}
