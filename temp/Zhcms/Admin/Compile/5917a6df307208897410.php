<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="form-div">
    <form action="javascript:search_brand()" name="searchForm">
        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
        キーワード <input type="text" name="brand_name" size="15" />
        <input type="submit" value="検索" class="button" />
    </form>
</div>

<script language="JavaScript">
    function search_brand()
    {
        listTable.filter['brand_name'] = Utils.trim(document.forms['searchForm'].elements['brand_name'].value);
        listTable.filter['page'] = 1;
        
        listTable.loadList();
    }

</script>