<?php
use App\Models\Order;
$id = $_REQUEST['id'];
$order = Order::find($id);
if ($order == NULL)
{
    header("location:index.php?option=order&cat=trash");
}
$order->delete();
header("location:index.php?option=order&cat=trash");
