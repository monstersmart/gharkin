<?php
namespace Gharkin;

use SimpleXMLElement;

class Order {
    protected $xml;
    protected $order;
    protected $discounts = array();
    public function __construct($xml)
    {
        $this->xml = $xml;

        $order = simplexml_load_file($xml);

        $this->order = $this->_parseOrder($order);
    }
    public function addDiscount(DiscountInterface $discount) {
        $this->discounts[] = $discount;
        return $this;
    }
    public function getTotal() {

    }
    protected function _parseOrder(SimpleXMLElement $xml) {

        $list = array();


//        var_dump($xml->products);



        return $list;
    }
}