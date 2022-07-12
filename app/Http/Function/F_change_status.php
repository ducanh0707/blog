<?php

function F_change_status($val){
?>
   <?php if($val->status == 'off'){ ?>
      <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
         <i class="fa fa-exclamation-circle text-danger"></i>
      </a>
   <?php }elseif($val->status == 'on'){ ?>
      <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
         <i class="fa fa-check-circle text-success"></i>
      </a>
   <?php } ?>
<?php
   }

