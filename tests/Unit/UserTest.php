<?php

namespace Tests\Unit;

use App\Post;
use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    

    public function testHasLikedPosts()
    {
        $expect = true;

        $actual = User::testHasLikedPosts();

        $this->assertEquals($expect,$actual);
    }


    
}
