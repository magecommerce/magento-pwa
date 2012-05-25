<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Sales
 * @subpackage  integration_tests
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Tests transaction model:
 *
 * @see Mage_Sales_Model_Order_Payment_Transaction
 * @magentoDataFixture Mage/Sales/_files/transactions.php
 */
class Mage_Sales_Model_Order_Payment_TransactionTest extends PHPUnit_Framework_TestCase
{
    public function testLoadByTxnId()
    {
        $order = new Mage_Sales_Model_Order();
        $order->loadByIncrementId('100000001');

        $model = new Mage_Sales_Model_Order_Payment_Transaction;
        $model->setOrderPaymentObject($order->getPayment())
            ->loadByTxnId('invalid_transaction_id');

        $this->assertNull($model->getId());

        $model->loadByTxnId('trx1');
        $this->assertNotNull($model->getId());
    }
}
