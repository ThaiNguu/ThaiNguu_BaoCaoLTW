<?php
use App\Libraries\MyClass;
?>
<?php unset($_SESSION['message']);?>
                  <?php if (isset($_SESSION['message'])):?>
                     <?= $arr =MyClass::get_flash('message');?>
                  <div class="alert alert-<?= $arr['type'];?>">
                  <?=$arr['msg'];?> 
                  </div>
               <?php endif;?>