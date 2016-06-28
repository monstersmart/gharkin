<?php

namespace Tests;

use PHPUnit_Framework_TestCase;

abstract class AbstractTest extends PHPUnit_Framework_TestCase {
    public function getRoot() {
        return dirname(dirname(__FILE__));
    }
}