<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box" id='history_div'>
    <div class="box_1">
        <h3><span>浏览历史</span></h3>
        <div class="boxCenterList clearfix" id='history_list'>
            <?php  
                echo insert_history();
            ?>
        </div>
    </div>
</div>
<div class="blank5"></div>
