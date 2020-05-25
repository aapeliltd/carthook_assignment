<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserControllerTest extends TestCase
{

    use RefreshDatabase; //refresh the database after each test.
    /**
     * @test
     */
    public function will_fail_with_a_500_if_user_is_not_found_or_something_happen()
    {
        $response = $this->json('GET', 'api/users/-1');

        $response->assertStatus(500);
    }



    /**
     * @test
     */
    public function can_return_a_user()
    {
        //Given
        $user = $this->create("User");
        //When
        $response = $this->json('GET', "api/users/$user->id");
        //Then
        $response->assertStatus(200);
    }

    /**
     * @test
     */

    public function can_return_a_collection_of_users()
    {
        //because we want to test collections of users
        //will create three users for the purpose of test
        $user1 = $this->create('User');
        $user2 = $this->create('User');
        $user3 = $this->create('User');

        $response = $this->json('GET', '/api/users');

        $response->assertStatus(200);
    }
}
