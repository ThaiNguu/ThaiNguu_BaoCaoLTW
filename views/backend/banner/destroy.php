<?php
use App\Models\Banner;
$id = $_REQUEST['id'];
$banner = Banner::find($id);
if ($banner == NULL)
{
    header("location:index.php?option=banner&cat=trash");
}
$banner->delete();
header("location:index.php?option=banner&cat=trash");