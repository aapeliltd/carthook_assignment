<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Model\Post;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Traits\Paginate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;




class PostController extends Controller
{
    use Paginate;

    protected $postInterface;

    public function __construct(PostRepositoryInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }


    public function index($user_id)
    {
        $posts = PostResource::collection($this->postInterface->userPosts($user_id));

        if ($posts) {
            return response([
                'data' => $this->Paginate($posts, 10),
                'message' => 'Success'
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'internal server error',
            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($user_id, $post_id)
    {
        $post =  new PostResource($this->postInterface->find($post_id));
        if ($post) {
            return response([
                'data' => $post,
                'message' => 'Success'
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'internal server error',

            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPostByTitle(Request $request)
    {
        $title = $request->title;
        $posts = PostResource::collection($this->postInterface->searchPostByTitle($title));

        if ($posts) {
            return response([
                'data' => $this->Paginate($posts, 10),
                'message' => 'Success'
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'internal server error',
            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
