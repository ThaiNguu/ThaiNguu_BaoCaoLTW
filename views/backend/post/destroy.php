<?php
use App\Models\Post;
$id = $_REQUEST['id'];
$post = Post::find($id);
if ($post == NULL)
{
    header("location:index.php?option=post&cat=trash");
}
$post->delete();
header("location:index.php?option=post&cat=trash");
