<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
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
   
    
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <form method="post" action="" name="listForm">
    <!-- start brand list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table width="100%" cellpadding="3" cellspacing="1" id="listTable">
                <tr>
                    <th>编号</th>
                    <th>公司名称</th>
                    <th>公司积分</th>
                    <th>操作</th>
                </tr>
                <?php if(!empty($company_list)){?>
                    <?php if(is_array($company_list)):?><?php $index=0; ?><?php  foreach($company_list as $company){ ?>
                    <tr>
                        <td class="first-cell"><?php echo $company['company_id'];?></td>
                        <td ><?php echo $company['company_name'];?></td>
                        <td ><?php echo $company['company_points'];?></td>
                        <td align="center">
                             <a href="<?php echo U('Admin/ErpPointsLog/index',array('act'=>'list','company_id'=>$company['company_id']));?>" title="消费履历">消费履历</a> |
                             <a href="<?php echo U('index',array('act'=>'edit','company_id'=>$company['company_id']));?>" title="编辑">编辑</a> |
                             <a href="javascript:;" onclick="listTable.remove(<?php echo $company['company_id'];?>, '确定要删除吗？')" title="删除">删除</a>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10">没有数据</td></tr>
                <?php }?>
                <tr>
                    <td align="right" nowrap="true" colspan="6">
                        <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
      <div id="turn-page">
        総計  <span id="totalRecords"><?php echo $record_count;?></span>
        個記録があり、全部 <span id="totalPages"><?php echo $page_count;?></span>
        ページわけ、いまは　<span id="pageCurrent"><?php echo $filter['page'];?></span>
        ページ，毎ページ <input type='text' size='3' id='pageSize' value="<?php echo $filter['page_size'];?>" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">一ページ</a>
          <a href="javascript:listTable.gotoPagePrev()">前へ</a>
          <a href="javascript:listTable.gotoPageNext()">次へ</a>
          <a href="javascript:listTable.gotoPageLast()">末ページ</a>
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
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
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