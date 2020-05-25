<?php

namespace Tests\Feature\tests\feature\Http\controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase; //refresh the database after each test.
    /**
     * @test
     */
    public function will_fail_with_a_500_if_comment_is_not_found_or_something_happen()
    {
        $response = $this->json('GET', 'api/posts/-1/comments/-1');

        $response->assertStatus(404);
    }





}
