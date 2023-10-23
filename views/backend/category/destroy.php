<?php
use App\Models\Category;
$id = $_REQUEST['id'];
$category = Category::find($id);
if ($category == NULL)
{
    header("location:index.php?option=category&cat=trash");
}
$category->delete();
header("location:index.php?option=category&cat=trash");
