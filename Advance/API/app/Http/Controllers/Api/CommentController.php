<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CommentResource;
use App\Model\Comment;
use App\Repositories\Comments\CommentRepositoryInterface;
use App\Traits\Paginate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    use Paginate;

    protected $commentInterface;

    public function __construct(CommentRepositoryInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function index($post_id)
    {
        $comments = CommentResource::collection($this->commentInterface->comments($post_id));
        if ($comments) {
            return response([
                'data' => $this->Paginate($comments, 10),
                'message' => 'Success'
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'internal server error',

            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



    public function show($post_id, $comment_id)
    {
        $comment =  new CommentResource($this->commentInterface->find($post_id, $comment_id));
        if ($comment) {
            return response([
                'data' => $comment,
                'message' => 'Success'
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'internal server error',

            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
