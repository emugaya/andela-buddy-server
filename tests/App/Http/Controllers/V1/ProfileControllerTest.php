<?php

namespace Tests\App\Http\Controllers\V1;

use TestCase;

/**
 * Class for UserController test
 *
 * @package Tests\App\Http\Controllers\V1
 */
class ProfileControllerTest extends TestCase
{

    /**
     * Setup test dependencies
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->makeUser();
    }

    /**
     * Setup test calculation
     *
     * @return void
     */
    public function testCalculationSuccess()
    {
        $this->assertEquals(2+2, 4);
    }
}
