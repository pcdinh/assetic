<?php

namespace Assetic\Test\Filter;

use Assetic\Filter\FilterCollection;

class FilterCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $filter = new FilterCollection();
        $this->assertInstanceOf('Assetic\\Filter\\FilterInterface', $filter, 'FilterCollection implements FilterInterface');
    }

    public function testEnsure()
    {
        $filter = $this->getMock('Assetic\\Filter\\FilterInterface');
        $asset = $this->getMock('Assetic\\Asset\\AssetInterface');

        $filter->expects($this->once())->method('filterLoad');

        $coll = new FilterCollection();
        $coll->ensure($filter);
        $coll->ensure($filter);
        $coll->filterLoad($asset);
    }
}