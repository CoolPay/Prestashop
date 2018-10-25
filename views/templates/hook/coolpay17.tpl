{*
* NOTICE OF LICENSE
* $Date: 2016/11/11 04:32:14 $
* Written by Kjeld Borch Egevang
* E-mail: hello@coolpay.com
*}

<p class="payment_module coolpay">
{foreach from=$imgs item=img}
{if $imgs|@count gt 2}
		<img src="{$module_dir|escape:'htmlall':'UTF-8'}views/imgf/{$img|escape:'htmlall':'UTF-8'}.gif" alt="{l s='Pay with credit cards ' mod='coolpay'}" />
{else}
		<img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/{$img|escape:'htmlall':'UTF-8'}.png" alt="{l s='Pay with credit cards ' mod='coolpay'}" />
{/if}
{/foreach}
{if $fees|@count gt 0}
<span style="display:table">
{foreach from=$fees item=fee}
	<span style="display:table-row">
		<span style="display:table-cell">
			<i>
				{$fee.name|escape:'htmlall':'UTF-8'}
			</i>
		</span>
		<span style="display:table-cell">
				{$fee.amount|escape:'htmlall':'UTF-8'}
		</span>
	</span>
{/foreach}
</span>
{/if}
</p>
