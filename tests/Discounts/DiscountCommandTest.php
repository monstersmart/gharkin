<?php
namespace Tests\Discounts;

use Gharkin\Order;
use Tests\AbstractTest;

class DiscountCommandTest extends AbstractTest {
    public function testDiscount()
    {

        $file = self::getRoot() . '/tests/datasets/BuyShampooGetConditionerFor50off.xml';

        $root = self::getRoot();

        $root = realpath($root);

        ob_start();
        system("cd $root && php console.php sum tests/datasets/BuyShampooGetConditionerFor50off.xml --discount=BuyShampooGetConditionerFor50off");
        $cmd = ob_get_clean();

        $cmd = trim($cmd);

        $this->assertEquals(774, $cmd);
    }
}