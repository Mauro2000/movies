<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Admins;
class User extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
       $admin= Admins::created([
            'name'=>"admin",
            'email'=>"admin@gmail.com",
            'password'=>bcrypt(12345)

        ]);

        $this->seeInDatabase('admins',['name'=>'admin']);
    }
}
