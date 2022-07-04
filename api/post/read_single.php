<?php
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';


    //Instanitate DB & connect
    $database = new Database();
    $db = $database->connect();


    //Instanitate blog post object
    $post = new Post($db);


    //get iod from url
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();


    //get post 
    $post->read_single();

    //create array
    $post_arr = array(
        'id' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name
    );

  //make json 
    print_r(json_encode($post_arr));