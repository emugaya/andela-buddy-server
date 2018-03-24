<?php

use App\Models\User;

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    public function setUp()
    {
        parent::setup();
    }

    /**
     * Creates a user to be used during testing.
     * 
     * @return user - User tobe used while making the tests.
     */
    public function makeUser()
    {
        return $this->be(
            factory(User::class)->make(
                [
                    "uid" => "-KyFMvDqvxLghZdYkO7z",
                    "name" => "Test User",
                    "firstname" => "Test",
                    "lastname" => "User",
                    "email" => "test.user@andela.com"
                ]
            )
        );
    }
}
