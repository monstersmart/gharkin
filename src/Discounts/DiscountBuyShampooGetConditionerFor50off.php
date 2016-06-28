<?php
namespace Gharkin\Discounts;

class DiscountBuyShampooGetConditionerFor50off implements DiscountInterface {

    public function apply($list)
    {
        $foundShampoo = false;
        $foundConditioner = false;

        foreach ($list as $key => $l) {
            if ($l['category'] === 'Conditioner') {
                $foundConditioner = $key;
            }
            if ($l['category'] === 'Shampoo') {
                $foundShampoo = true;
            }
        }

        if ($foundConditioner !== false && $foundShampoo !== false) {
            $list[$key]['price'] = intval(floor($list[$key]['price'] / 2));
        }

        return $list;
    }
}