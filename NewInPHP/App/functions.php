<?php

use App\Models\Article;

return [
    function (Article $article) {
        return $article->id;
    },
    function (Article $article) {
        return $article->title;
    },
    function (Article $article) {
        return $article->text;
    },
    /**
     * @param Article $article
     * @return mixed
     */
    function (Article $article) {
        return $article->author->name;
    }
];