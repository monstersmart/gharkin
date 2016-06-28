<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase {
    public function getRoot() {
        return dirname(dirname(__FILE__));
    }
}