<?php
use App\Models\Contact;
$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == NULL)
{
    header("location:index.php?option=contact&cat=trash");
}
$contact->delete();
header("location:index.php?option=contact&cat=trash");
