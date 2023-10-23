<?php
use App\Models\Contact;
$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == NULL)
{
    header("location:index.php?option=contact");
}
$contact->status=0;
$contact ->updated_at = date('Y-m-d H:i:s');
$contact ->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$contact->save();
header("location:index.php?option=contact");