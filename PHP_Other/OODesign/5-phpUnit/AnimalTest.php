<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Animal;

class CourseTest extends TestCase
{
    public function testGetName()
    {
        $name = 'dog';
        $course = new Animal($name);
        $this->assertEquals($name, $course->getName());
    }
}