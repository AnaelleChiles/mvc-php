<?php
use Application\Model\Post\PostRepository;

require_once('src/model/post.php');
function homepage()
{
    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();
    require('templates/homepage.php');
}