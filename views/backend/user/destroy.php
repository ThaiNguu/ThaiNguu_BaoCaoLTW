<?php
use App\Models\User;
$id = $_REQUEST['id'];
$user = User::find($id);
if ($user == NULL)
{
    header("location:index.php?option=user&cat=trash");
}
$user->delete();
header("location:index.php?option=user&cat=trash");
