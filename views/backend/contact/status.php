<?php
use App\Models\contact;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == NULL)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=contact");
}
$contact->status=($contact->status==1) ? 2 : 1;
$contact ->updated_at = date('Y-m-d H:i:s');
$contact ->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$contact->save();
MyClass::set_flash('message',['msg'=>'Thay đổi trạng thái thành công','type'=>'success']);
header("location:index.php?option=contact");