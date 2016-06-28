<?php
namespace Tests\Discounts;

use Gharkin\Discounts\Discount3for2;
use Gharkin\Discounts\DiscountBuyShampooGetConditionerFor50off;
use Gharkin\Order;
use Tests\AbstractTest;

class DiscountBuyShampooGetConditionerFor50offTest extends AbstractTest {
    public function testDiscount() {

        $file = self::getRoot().'/tests/datasets/BuyShampooGetConditionerFor50off.xml';

        $order = new Order($file);

        $order->addDiscount(new DiscountBuyShampooGetConditionerFor50off());

        $this->assertEquals(774, $order->getTotal());
    }
}