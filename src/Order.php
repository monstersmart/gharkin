<?php
namespace Gharkin;

use Gharkin\Discounts\DiscountInterface;
use SimpleXMLElement;
use Gharkin\Lib\SimpleXMLElementHelper;

class Order {
    protected $xml;
    protected $order;
    protected $discounts = array();
    public function __construct($xml)
    {
        $this->xml = $xml;

        $order = SimpleXMLElementHelper::parseFile($xml, true);

        $this->order = $this->_parseOrder($order);
    }
    public function addDiscount(DiscountInterface $discount) {
        $this->discounts[] = $discount;
        return $this;
    }
    public function getTotal() {

        foreach ($this->discounts as $discount) {
            /* @var $discount DiscountInterface */
            $this->order = $discount->apply($this->order);
        }

        $sum = 0;

        foreach ($this->order as $order) {
            $sum += $order['price'];
        }

        return $sum;
    }
    protected function _parseOrder($order) {

        $list = array();

        foreach ($order['xml']['children'][0]['children'] as $node) {
            $item = array();

            foreach ($node['attributes'] as $attr) {

                if ($attr['name'] === 'title') {
                    $item['title'] = $attr['val'];
                }

                if ($attr['name'] === 'price') {
                    $item['price'] = intval($attr['val'] * 100);
                }
            }

            $item['category'] = $node['children'][0]['text'];

            $list[] = $item;
        }

        return $list;
    }
}