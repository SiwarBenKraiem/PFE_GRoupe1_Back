<?php

namespace Tests\Unit;

use App\User;
use PHPUnit\Framework\TestCase;

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

        $user = new User();
        $data['nom'] = 'test';
        $data['email'] = 'test@test.tst';
        $data['prenom'] = 'testp';
        $data['password'] = \Hash::make("123456");;
        $data['Role'] = 3;
        $data['suppression'] = false;
        $data['code_domaine'] = 1;
        $data['code_specialite'] = 1;
        $user->save();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['nom'], $user->nom);

        $delete = $user->delete();
        $this->assertTrue($delete);
    }
}
