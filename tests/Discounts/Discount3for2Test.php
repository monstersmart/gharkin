<?php
namespace Tests\Discounts;

use Gharkin\Order;
use Tests\AbstractTest;

class Discount3for2Test extends AbstractTest {
    public function testDiscount() {

        $file = $this->getRoot().'/tests/datasets/xml.xml';

        $order = new Order($file);

        $this->assertEquals(null, $order->getTotal());
    }
}