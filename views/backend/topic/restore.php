<?php
use App\Models\Topic;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$topic = Topic::find($id);
if ($topic == NULL)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=topic&cat=trash");
}
$topic->status=2;
$topic ->updated_at = date('Y-m-d H:i:s');
$topic ->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topic->save();
MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
header("location:index.php?option=topic&cat=trash");