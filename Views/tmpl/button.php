```php name=plugins/vmcustom/vm_manufacturer_orders/views/tmpl/button.php
<button id="manufacturerOrderBtn" class="btn btn-small" onclick="window.location='index.php?option=com_virtuemart&view=custom&task=manufacturerOrders'">
    <span class="icon-basket"></span> <?php echo JText::_('PLG_VM_MANUFACTURER_ORDERS_BUTTON'); ?>
</button>