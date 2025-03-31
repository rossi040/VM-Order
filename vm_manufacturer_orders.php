```php name=plugins/vmcustom/vm_manufacturer_orders/vm_manufacturer_orders.php
<?php
defined('_JEXEC') or die;

class plgVmCustomManufacturerOrders extends JPlugin
{
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
    }

    public function plgVmOnDisplayProductToolbar(&$view, &$html)
    {
        $html[] = '<button id="manufacturerOrderBtn" class="btn btn-small" onclick="window.location=\'index.php?option=com_virtuemart&view=custom&task=manufacturerOrders\'">
            <span class="icon-basket"></span> ' . JText::_('PLG_VM_MANUFACTURER_ORDERS_BUTTON') . '
        </button>';
        return true;
    }

    public function onAfterRoute()
    {
        $app = JFactory::getApplication();
        if (!$app->isClient('administrator')) return;

        $option = $app->input->get('option');
        $view = $app->input->get('view');
        $task = $app->input->get('task');

        if ($option === 'com_virtuemart' && $view === 'custom' && $task === 'manufacturerOrders') {
            $this->displayOrdersView();
            $app->close();
        }
    }

    protected function displayOrdersView()
    {
        require_once(JPATH_PLUGINS . '/vmcustom/vm_manufacturer_orders/helpers/orderhelper.php');
        $helper = new ManufacturerOrdersHelper();
        
        $products = $helper->getProductsWithNegativeStock();
        $manufacturers = $helper->getAllManufacturers();
        
        include JPATH_PLUGINS . '/vmcustom/vm_manufacturer_orders/views/tmpl/orders.php';
    }
}
?>