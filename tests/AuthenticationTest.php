<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\Helpers\MakeUser;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    /**
     * Test that Authentication fails with invalid user 
     *
     * @return void
     */
    public function testAuthenticationFailure()
    {
        $this->get("/");

        $this->assertEquals("Unauthorized.", $this->response->getContent());
    }

    /**
     * Test Authentication success
     * 
     * @return void
     */
    public function testAuthenticationSuccess()
    {
        $this->makeUser();

        $this->get("/");

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
}
