<?php


function getPosts($page,$count)
{
    if(rows('SELECT * FROM posts ORDER BY id DESC {$count} OFFSET' . $page *$count)) {
        return transform($posts);
    }
    return [];
}