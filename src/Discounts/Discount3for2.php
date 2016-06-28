<?php
namespace Gharkin\Discounts;

class Discount3for2 implements DiscountInterface {

    public function apply($list)
    {
        $cheapest = null;
        $key = null;

        foreach ($list as $k => $l) {
            if (is_null($cheapest)) {
                $cheapest = $l['price'];
                $key = $k;
            }

            if ($l['price'] < $cheapest) {
                $cheapest = $l['price'];
                $key = $k;
            }
        }

        if ($cheapest) {
            $list[$key]['price'] = 0;
        }

        return $list;
    }
}