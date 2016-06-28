<?php
namespace Gharkin\Discounts;

interface DiscountInterface {
    public function apply($list);
}