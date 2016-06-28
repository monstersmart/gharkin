<?php
namespace Tests\Discounts;

use Gharkin\Discounts\Discount3for2;
use Gharkin\Order;
use Tests\AbstractTest;

class Discount3for2DisabledTest extends AbstractTest {
    public function testDiscount() {

        $file = self::getRoot().'/tests/datasets/3ForThePriceOf2.xml';

        $order = new Order($file);

//        $order->addDiscount(new Discount3for2());

        $this->assertEquals(2443, $order->getTotal());
    }
}