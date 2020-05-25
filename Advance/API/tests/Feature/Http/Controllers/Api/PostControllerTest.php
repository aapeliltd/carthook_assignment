<?php

namespace Tests\Feature\tests\feature\Http\controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase; //refresh the database after each test.
    /**
     * @test
     */
    public function will_fail_with_a_500_if_post_is_not_found_or_something_happen()
    {
        $response = $this->json('GET', 'api/users/-1/posts/-1');

        $response->assertStatus(404);
    }



    /**
     * @test
     */
    public function can_return_a_post()
    {
        //Given
        $post = $this->createPost("Post");
        //When
        $response = $this->json('GET', "api/users/$post->user_id/posts/$post->id");
        //Then
        $response->assertStatus(200);
    }

    /**
     * @test
     */

    public function can_return_a_collection_of_posts()
    {

        $user = $this->create('User');
        $response = $this->json('GET', "/api/users/$user->id/posts");

        $response->assertStatus(200);
    }
}
