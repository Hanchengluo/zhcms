<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--翻页 start-->
<form name="selectPageForm" action="" method="get">
    <input type="hidden" name="m" value="<?php echo $pager['current_meth'];?>"/>
    <input type="hidden" name="c" value="<?php echo $pager['current_control'];?>"/>
    <input type="hidden" name="a" value="<?php echo $pager['current_app'];?>"/>
    <?php if($pager['styleid'] == 0){?>
        <div id="pager">
            総計 <?php echo $pager['record_count'];?> 個の商品，全部 <?php echo $pager['page_count'];?> ページ。
            <span>
                <a href="<?php echo $pager['page_first'];?>">第一ページ </a> 
                <a href="<?php echo $pager['page_prev'];?>">前</a>
                <a href="<?php echo $pager['page_next'];?>">次</a> 
                <a href="<?php echo $pager['page_last'];?>">一番末页</a>
            </span>
            <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                <?php if($key == 'keywords'){?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                <?php  }else{ ?>
                    <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
            <select name="page" id="page" onchange="selectPage(this)">
                <?php if(isset($pager['array']) && !empty($pager['array'])):$arr["options"]=$pager['array'];$arr["selected"]=$pager['page'];echo html_options($arr);endif;
?>
            </select>
        </div>
    <?php  }else{ ?>
        <!--翻页 start-->
        <div id="pager" class="pagebar">
            <span class="f_l f6" style="margin-right:10px;">総計<b><?php echo $pager['record_count'];?></b> 個の商品</span>
            <?php if($pager['page_first']){?>
                <a href="<?php echo $pager['page_first'];?>">第一ページ ...</a>
            <?php }?>
            <?php if($pager['page_prev']){?>
                <a class="prev" href="<?php echo $pager['page_prev'];?>">前</a>
            <?php }?>
            <?php if($pager['page_count'] <> 1){?>
                <?php if(is_array($pager['page_number'])):?><?php $index=0; ?><?php  foreach($pager['page_number'] as $key=>$item){ ?>
                    <?php if($pager['page'] == $key){?>
                        <span class="page_now"><?php echo $key;?></span>
                    <?php  }else{ ?>
                        <a href="<?php echo $item;?>">[<?php echo $key;?>]</a>
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
            <?php }?>
            <?php if($pager['page_next']){?>
                <a class="next" href="<?php echo $pager['page_next'];?>">次</a>
            <?php }?>
            <?php if($pager['page_last']){?>
                <a class="last" href="<?php echo $pager['page_last'];?>">...一番末页</a>
            <?php }?>
            <?php if($pager['page_kbd']){?>
                <?php if(is_array($pager['search'])):?><?php $index=0; ?><?php  foreach($pager['search'] as $key=>$item){ ?>
                    <?php if($key == 'keywords'){?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo urldecode($item);?>" />
                    <?php  }else{ ?>
                        <input type="hidden" name="<?php echo $key;?>" value="<?php echo $item;?>" />
                    <?php }?>
                <?php $index++; ?><?php }?><?php endif;?>
                <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
                    <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
                </kbd>
            <?php }?>
        </div>
        <!--翻页 END-->
    <?php }?>
</form>
<script type="Text/Javascript" language="JavaScript">
function selectPage(sel)
{
    sel.form.submit();
}
</script>