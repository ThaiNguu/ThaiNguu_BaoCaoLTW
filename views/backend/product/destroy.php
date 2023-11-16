<?php
use App\Models\Product;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == NULL)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=product&cat=trash");
}
$product->delete();
MyClass::set_flash('message',['msg'=>'Xóa vĩnh viễn thành công','type'=>'success']);
header("location:index.php?option=product&cat=trash");
