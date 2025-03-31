```php name=plugins/vmcustom/vm_manufacturer_orders/views/tmpl/orders.php
<?php
defined('_JEXEC') or die;

echo '<h1>' . JText::_('PLG_VM_MANUFACTURER_ORDERS_TITLE') . '</h1>';
echo '<form action="index.php?option=com_virtuemart&task=createManufacturerOrder" method="post">';
echo '<table class="adminlist">';
echo '<thead><tr>';
echo '<th>' . JText::_('COM_VIRTUEMART_PRODUCT_NAME') . '</th>';
echo '<th>' . JText::_('COM_VIRTUEMART_PRODUCT_SKU') . '</th>';
echo '<th>' . JText::_('COM_VIRTUEMART_PRODUCT_IN_STOCK') . '</th>';
echo '<th>' . JText::_('COM_VIRTUEMART_PRODUCT_ORDERED') . '</th>';
echo '<th>' . JText::_('COM_VIRTUEMART_MANUFACTURER_NAME') . '</th>';
echo '<th>' . JText::_('PLG_VM_MANUFACTURER_ORDERS_STATUS_SELECT') . '</th>';
echo '</tr></thead>';
echo '<tbody>';

foreach ($products as $product) {
    echo '<tr>';
    echo '<td>' . $product->product_name . '</td>';
    echo '<td>' . $product->product_sku . '</td>';
    echo '<td>' . $product->product_in_stock . '</td>';
    echo '<td>' . $product->product_ordered . '</td>';
    echo '<td>' . $product->manufacturer_name . '</td>';
    echo '<td><input type="checkbox" name="selectedProducts[]" value="' . $product->virtuemart_product_id . '"></td>';
    echo '</tr>';
}

echo '</tbody></table>';
echo '<button type="submit" class="btn btn-primary">' . JText::_('PLG_VM_MANUFACTURER_ORDERS_CREATE_ORDER') . '</button>';
echo '</form>';
?>