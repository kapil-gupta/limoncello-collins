<?php namespace App\Schemas;

use \App\Models\Comment;
use \Neomerx\JsonApi\Schema\SchemaProvider;

class CommentSchema extends SchemaProvider
{
    /**
     * @inheritdoc
     */
    protected $resourceType = 'comments';

    /**
     * @inheritdoc
     */
    protected $baseSelfUrl = '/comments/';

    /**
     * @inheritdoc
     */
    public function getId($comment)
    {
        /** @var Comment $comment */
        return $comment->id;
    }

    /**
     * @inheritdoc
     */
    public function getAttributes($comment)
    {
        /** @var Comment $comment */
        return [
            'body' => $comment->body,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getLinks($comment)
    {
        /** @var Comment $comment */
        return [
            'post' => [self::DATA => $comment->post, self::INCLUDED => true],
        ];
    }
}
