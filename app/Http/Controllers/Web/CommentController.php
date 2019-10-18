<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CommentRequest;
use App\Models\ClassModel;
use App\Models\Comment;
use App\Models\CommentVote;
use App\Models\FunctionModel;
use App\Models\Project;

class CommentController extends Controller
{
    /**
     * Store interface.
     *
     * @param \App\Http\Requests\Web\CommentRequest $request
     * @param \App\Models\Project $project
     * @param \App\Models\ClassModel $class
     * @param \App\Models\FunctionModel $function
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(
        CommentRequest $request,
        Project $project,
        ClassModel $class,
        FunctionModel $function
    ) {
        $comment = $function->comments()->create([
            'content' => $request->comment,
            'user_id' => user()->id
        ]);

        flash(__('messages.record.create_success'))->success();
        return redirect(route(
            'projects.classes.functions.show',
            compact(
                'project',
                'class',
                'function'
            )
        ) . "#comment-{$comment->id}");
    }

    /**
     * Vote up interface.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function voteUp(Comment $comment)
    {
        return $this->vote($comment, true);
    }

    /**
     * Vote down interface.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function voteDown(Comment $comment)
    {
        return $this->vote($comment, false);
    }

    private function vote(Comment $comment, $positive)
    {
        if (($user_id = user()->id) == $comment->user_id) {
            return response()->json(['error' => true]);
        }
        CommentVote::deleteAndCreateIfDifferent([
            'comment_id' => $comment->id,
            'user_id' => $user_id,
        ], compact('positive'));

        return response()->json([
            'error' => false,
            'votes_quantity' => $comment->votes_quantity
        ]);
    }
}
