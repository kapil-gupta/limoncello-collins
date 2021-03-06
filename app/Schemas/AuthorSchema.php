<?php namespace App\Schemas;

use \App\Models\Author;
use \Neomerx\JsonApi\Schema\SchemaProvider;

class AuthorSchema extends SchemaProvider
{
    /**
     * @inheritdoc
     */
    protected $resourceType = 'authors';

    /**
     * @inheritdoc
     */
    protected $baseSelfUrl = '/authors';

    /**
     * @inheritdoc
     */
    protected function getBaseSelfUrl()
    {
        // NOTE: You can dynamically set resource urls

        return \Request::getSchemeAndHttpHost() . $this->baseSelfUrl . '/';
    }

    /**
     * @inheritdoc
     */
    public function getId($author)
    {
        /** @var Author $author */
        return $author->id;
    }

    /**
     * @inheritdoc
     */
    public function getAttributes($author)
    {
        /** @var Author $author */
        return [
            'first_name' => $author->first_name,
            'last_name'  => $author->last_name,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getLinks($author)
    {
        /** @var Author $author */
        return [
            'posts' => [self::DATA => $author->posts->all()],
        ];
    }
}
