<?php
use App\Models\Brand;
$id = $_REQUEST['id'];
$brand = Brand::find($id);
if ($brand == NULL)
{
    header("location:index.php?option=brand&cat=trash");
}
$brand->delete();
header("location:index.php?option=brand&cat=trash");
