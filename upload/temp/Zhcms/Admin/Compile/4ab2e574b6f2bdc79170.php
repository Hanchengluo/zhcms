<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
ZHPHP = '<?php echo $GLOBALS['user']['ZHPHP'];?>';
ZHPHPDATA = '<?php echo $GLOBALS['user']['ZHPHPDATA'];?>';
ZHPHPTPL = '<?php echo $GLOBALS['user']['ZHPHPTPL'];?>';
ZHPHPEXTEND = '<?php echo $GLOBALS['user']['ZHPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
TEMPLATE = '<?php echo $GLOBALS['user']['TEMPLATE'];?>';
ROOTURL = '<?php echo $GLOBALS['user']['ROOTURL'];?>';
WEBURL = '<?php echo $GLOBALS['user']['WEBURL'];?>';
CONTROLURL = '<?php echo $GLOBALS['user']['CONTROLURL'];?>';
PHPSELF = '<?php echo $GLOBALS['user']['PHPSELF'];?>';
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
<script language="JavaScript">

</script>
</head>
<body>

<h1>
<?php if($action_link){?>
<span class="action-span"><a href="<?php echo $action_link['href'];?>"><?php echo $action_link['text'];?></a></span>
<?php }?>
<?php if($action_link2){?>
<span class="action-span"><a href="<?php echo $action_link2['href'];?>"><?php echo $action_link2['text'];?></a>&nbsp;&nbsp;</span>
<?php }?>
<span class="action-span1">
    <a href="index.php?act=main"><?php echo C("WEBNAME");?></a> 
</span>
<span id="search_id" class="action-span1">
    <?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?>
</span>
<div style="clear:both"></div>
</h1>

    <script language="JavaScript">
    <!--
    // 这里把JS用到的所有语言都赋值到这里
    var process_request = "正在处理您的请求...";
    var todolist_caption = "记事本";
    var todolist_autosave = "自动保存";
    var todolist_save = "保存";
    var todolist_clear = "清除";
    var todolist_confirm_save = "是否将更改保存到记事本？";
    var todolist_confirm_clear = "是否清空内容？";
    var posit_name_empty = "广告位名称不能为空!";
    var ad_width_empty = "请输入广告位的宽度!";
    var ad_height_empty = "请输入广告位的高度!";
    var ad_width_number = "广告位的宽度必须是一个数字!";
    var ad_height_number = "广告位的高度必须是一个数字!";
    var no_outside_address = "建议您指定该广告所要投放的站点的名称，方便于该广告的来源统计!";
    var width_value = "广告位的宽度值必须在1到1024之间!";
    var height_value = "广告位的高度值必须在1到1024之间!";
    var ad_name_empty = "请输入广告名称!";
    var ad_link_empty = "请输入广告的链接URL!";
    var ad_text_empty = "广告的内容不能为空!";
    var ad_photo_empty = "广告的图片不能为空!";
    var ad_flash_empty = "广告的flash不能为空!";
    var ad_code_empty = "广告的代码不能为空!";
    var empty_position_style = "广告位的模版不能为空!";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <form method="post" action="" name="listForm">
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>广告位名称</th>
                    <th>位置宽度</th>
                    <th>位置高度</th>
                    <th>广告位描述</th>
                    <th>操作</th>
                </tr>
                <?php if(!empty($position_list)){?>
                    <?php if(is_array($position_list)):?><?php $index=0; ?><?php  foreach($position_list as $list){ ?>
                    <tr>
                        <td class="first-cell">
                            <span onclick="javascript:listTable.edit(this, 'edit_position_name', <?php echo $list['position_id'];?>)"><?php echo $list['position_name'];?></span>
                        </td>
                        <td align="right">
                            <span onclick="javascript:listTable.edit(this, 'edit_ad_width', <?php echo $list['position_id'];?>)"><?php echo $list['ad_width'];?></span>
                        </td>
                        <td align="right">
                            <span onclick="javascript:listTable.edit(this, 'edit_ad_height', <?php echo $list['position_id'];?>)"><?php echo $list['ad_height'];?></span>
                        </td>
                        <td align="left"><span><?php echo $list['position_desc'];?></span></td>
                        <td align="center">
                            <a href="ads.php?act=list&pid=<?php echo $list['position_id'];?>" title="查看广告内容">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_view.gif" border="0" height="16" width="16" />
                            </a>
                            <a href="<?php echo U('index',array('act'=>'edit','id'=>$list['position_id']));?>" title="编辑">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" border="0" height="16" width="16" />
                            </a>
                            <a href="javascript:;" onclick="listTable.remove(<?php echo $list['position_id'];?>, '您确认要删除这条记录吗?')" title="移除">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16" />
                            </a>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="5">没有找到任何记录</td></tr>
                <?php }?>
                <tr>
                    <td align="right" nowrap="true" colspan="5"><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
      <div id="turn-page">
        <?php echo L("admin_eccommon_page_t1");?>  <span id="totalRecords"><?php echo $record_count;?></span>
        <?php echo L("admin_eccommon_page_t2");?> <span id="totalPages"><?php echo $page_count;?></span>
        <?php echo L("admin_eccommon_page_t3");?> <span id="pageCurrent"><?php echo $filter['page'];?></span>
        <?php echo L("admin_eccommon_page_t4");?> <input type='text' size='3' id='pageSize' value="<?php echo $filter['page_size'];?>" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()"><?php echo L("admin_eccommon_page_t5");?></a>
          <a href="javascript:listTable.gotoPagePrev()"><?php echo L("admin_eccommon_page_t6");?></a>
          <a href="javascript:listTable.gotoPageNext()"><?php echo L("admin_eccommon_page_t7");?></a>
          <a href="javascript:listTable.gotoPageLast()"><?php echo L("admin_eccommon_page_t8");?></a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <?php 
                echo smarty_create_pages($filter['page'],$page_count);
            ?>
          </select>
        </span>
      </div>
</td>
                </tr>
            </table>
            
            
<?php if($full_page){?>
        </div>
    </form>
<!-- end 添加货品 -->

<script type="text/javascript">
listTable.recordCount = <?php echo $record_count;?>;
listTable.pageCount = <?php echo $page_count;?>;

  
<?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
<?php $index++; ?><?php }?><?php endif;?>


</script>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script language="JavaScript">
if (document.getElementById("listDiv"))
{
    
    document.getElementById("listDiv").onmouseover = function(e)
    {
        obj = Utils.srcElement(e);
    
        if (obj)
        {
            if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
            else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
            else return;
    
            for (i = 0; i < row.cells.length; i++)
            {
                if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#F4FAFB';
            }
        }
    
    }
    
    document.getElementById("listDiv").onmouseout = function(e)
    {
        obj = Utils.srcElement(e);
        
        if (obj)
        {
            if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
            else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
            else return;
            
            for (i = 0; i < row.cells.length; i++)
            {
                if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#FFF';
            }
        }
    }

    
    document.getElementById("listDiv").onclick = function(e)
    {
        var obj = Utils.srcElement(e);
    
        if (obj.tagName == "INPUT" && obj.type == "checkbox")
        {
            if (!document.forms['listForm'])
            {
                return;
            }
            var nodes = document.forms['listForm'].elements;
            var checked = false;
            
            for (i = 0; i < nodes.length; i++)
            {
                if (nodes[i].checked)
                {
                    checked = true;
                    break;
                }
            }
            
            if(document.getElementById("btnSubmit"))
            {
                document.getElementById("btnSubmit").disabled = !checked;
            }
            for (i = 1; i <= 10; i++)
            {
                if (document.getElementById("btnSubmit" + i))
                {
                    document.getElementById("btnSubmit" + i).disabled = !checked;
                }
            }
        }
    }
}
</script>
<?php }?>