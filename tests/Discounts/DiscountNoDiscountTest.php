<?php
namespace Tests\Discounts;

use Gharkin\Order;
use Tests\AbstractTest;

class DiscountNoDiscountTest extends AbstractTest {
    public function testDiscount() {

        $file = $this->getRoot().'/tests/datasets/xml.xml';

        $order = new Order($file);

        $this->assertEquals(998, $order->getTotal());
    }
}