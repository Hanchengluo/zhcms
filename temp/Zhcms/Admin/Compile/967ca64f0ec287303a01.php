<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>カテゴリ修正</title>
    <script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Category/js/addEdit.js"></script>
        <script>
    var admin_category_add_edit_js_form_message1='Modelを選択してください';
    var admin_category_add_edit_js_form_message2='カテゴリ名称は必須';
    var admin_category_add_edit_js_form_message3='カテゴリ名称';
    var admin_category_add_edit_js_form_message4='静態ディレクトリは必須';
    var admin_category_add_edit_js_form_message5='ディレクトリはすでに使われている';
    var admin_category_add_edit_js_form_message6='静態ディレクトリを入力してください';
    var admin_category_add_edit_js_form_message7='Indexテンプレートは空にできません';
    var admin_category_add_edit_js_form_message8='カテゴリタイプが[カテゴリ表紙 ]選択する時、このテンプレートを表示する';
    var admin_category_add_edit_js_form_message9='一覧ページテンプレートは空にできません';
    var admin_category_add_edit_js_form_message10='カテゴリタイプが[普通のカテゴリ ]選択する時、このテンプレートを表示する';
    var admin_category_add_edit_js_form_message11='内容ページテンプレートは空にできません';
    var admin_category_add_edit_js_form_message12='内容ページテンプレートを入力してください';
    var admin_category_add_edit_js_form_message13='カテゴリURLルールは必須';
    var admin_category_add_edit_js_form_message14='{cid} カテゴリID, {catdir} カテゴリディレクトリ, {page} 一覧のページ';
    var admin_category_add_edit_js_form_message15='URL入力エラー';
    var admin_category_add_edit_js_form_message16='カテゴリタイプは「外部リンク」選んで後有効';
    var admin_category_add_edit_js_form_message17='内容ページURLルールは必須';
    var admin_category_add_edit_js_form_message18='{y}、{m}、{d} 年月日,{timestamp}UNIX時間 {catdir}カテゴリディレクトリ {cid}カテゴリcid {aid}文章ID';
    var admin_category_add_edit_js_form_message19='投稿奨励は必須';
    var admin_category_add_edit_js_form_message20='投稿奨励は数値で入力してください';
    var admin_category_add_edit_js_form_message21='文章を発表する時の奨励です、マイナスの場合積分を減る';
    var admin_category_add_edit_js_form_message22='閲読積分は必須';
    var admin_category_add_edit_js_form_message23='閲読積分は数値で入力してください';
    var admin_category_add_edit_js_form_message24='カテゴリ下の文章の料金基準を観光。もし文章単特で設定する場合、文章設置優先。';
    var admin_category_add_edit_js_form_message25='重複有料日数は必須';
    var admin_category_add_edit_js_form_message26='重複有料日数は数値で入力してください、>1';
    var admin_category_add_edit_js_form_message27='重複有料日数，>1。';
    var admin_category_add_edit_js_select_template_message1='テンプレートファイル選択';
    var admin_category_add_edit_js_select_template_message2='閉じる';
    </script>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post" class="zh-form" onsubmit="return zh_submit(this,'<?php echo U(index);?>')">
    <input type="hidden" value="<?php echo $field['cid'];?>" name="cid"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">カテゴリ一覧</a></li>
                <li><a href="javascript:;" class="action">カテゴリ変更</a></li>
            </ul>
        </div>
        <input type="hidden" name="mid" value="<?php echo $field['mid'];?>"/>
        <div class="tab">
            <ul class="tab_menu">
                <li lab="base"><a href="#">基本設置</a></li>
                <li lab="tpl"><a href="#">テンプレート設置</a></li>
                <li lab="html"><a href="#">静態HTML設置</a></li>
                <li lab="seo"><a href="#">SEO</a></li>
                <li lab="access"><a href="#">権限設置</a></li>
                <li lab="charge"><a href="#">有料設置</a></li>
            </ul>
            <div class="tab_content">
                <div id="base">
                    <table class="table1">
                        <tr>
                            <th class="w100">カテゴリ階層</th>
                            <td>
                                <select name="pid">
                                    <option value="0">トップ階層カテゴリ</option>
                                    <?php $zh["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                                        <option value="<?php echo $c['cid'];?>"
                                        <?php echo $c['selected'];?> <?php echo $c['disabled'];?>>
                                        <?php echo $c['_name'];?>
                                        </option>
                                    <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>カテゴリ名称</th>
                            <td>
                                <input type="text" name="catname" value="<?php echo $field['catname'];?>" class="w300" required=""/>
                            </td>
                        </tr>
                        <tr>
                            <th>カテゴリタイプ</th>
                            <td>
                                <label>
                                    <input type="radio" name="cattype" value="1" <?php if($field['cattype']==1){?>checked="checked"<?php }?>/> 普通のカテゴリ
                                </label>
                                <label>
                                    <input type="radio" name="cattype" value="2" <?php if($field['cattype']==2){?>checked="checked"<?php }?>/> カテゴリ表紙
                                </label>
                                <label>
                                    <input type="radio" name="cattype" value="3" <?php if($field['cattype']==3){?>checked="checked"<?php }?>/> 外部リンク(URL遷移リンク入力必要)
                                </label>
                                <label><input type="radio" name="cattype" value="4" <?php if($field['cattype']==4){?>checked="checked"<?php }?>/>単独ページ(直接文章発表，例:会社紹介)</label>
                            </td>
                        </tr>
                        <tr>
                            <th>静態ディレクトリ</th>
                            <td>
                                <input type="text" name="catdir" value="<?php echo $field['catdir'];?>" class="w300" required=""/>
                            </td>
                        </tr>
                        <tr>
                            <th>遷移Url</th>
                            <td>
                                <input type="text" name="cat_redirecturl" value="<?php echo $field['cat_redirecturl'];?>" class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <th>カテゴリアクセス方式</th>
                            <td>
                                <label>
                                    <input type="radio" name="cat_url_type" value="1" <?php if($field['cat_url_type']==1){?>checked="checked"<?php }?>/> 静態
                                </label>
                                <label>
                                    <input type="radio" name="cat_url_type" value="2" <?php if($field['cat_url_type']==2){?>checked="checked"<?php }?>/> 動態
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>文章アクセス方式</th>
                            <td>
                                <label>
                                    <input type="radio" name="arc_url_type" value="1" <?php if($field['arc_url_type']==1){?>checked="checked"<?php }?>/> 静態
                                </label>
                                <label>
                                    <input type="radio" name="arc_url_type" value="2" <?php if($field['arc_url_type']==2){?>checked="checked"<?php }?>/> 動態
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>ナビで表示</th>
                            <td>
                                <label>
                                    <input type="radio" name="cat_show" value="1" <?php if($field['cat_show']==1){?>checked="checked"<?php }?>/> YES
                                </label>
                                <label>
                                    <input type="radio" name="cat_show" value="0" <?php if($field['cat_show']==0){?>checked="checked"<?php }?>/> NO
                                </label>
                                <span class="validate-message">フロントで&lt;channel&gt;ラベルを使う時表示するかどうか</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="tpl" class="con">
                    <table class="table1">
                        <tr>
                            <th class="w100">表紙テンプレート</th>
                            <td>
                                <input type="text" name="index_tpl" required="" class="w200" id="index_tpl" value="<?php echo $field['index_tpl'];?>"
                                       onclick="select_template('index_tpl')" readonly="" onfocus="select_template('index_tpl');"/>
                                <button type="button" class="zh-cancel" onclick="select_template('index_tpl')">表紙テンプレートを選択</button>
                                <span id="zh_index_tpl"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>一覧ページテンプレート</th>
                            <td>
                                <input type="text" name="list_tpl" required="" id="list_tpl" class="w200" value="<?php echo $field['list_tpl'];?>"
                                       onclick="select_template('list_tpl')" readonly="" onfocus="select_template('list_tpl');"/>
                                <button type="button" class="zh-cancel" onclick="select_template('list_tpl')">一覧ページテンプレートを選択</button>
                                <span id="zh_list_tpl"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容ページテンプレート</th>
                            <td>
                                <input type="text" name="arc_tpl" required="" id="arc_tpl" class="w200" value="<?php echo $field['arc_tpl'];?>"
                                       onclick="select_template('arc_tpl')" readonly="" onfocus="select_template('arc_tpl');"/>
                                <button type="button" class="zh-cancel" onclick="select_template('arc_tpl')">内容ページテンプレートを選択</button>
                                <span id="zh_arc_tpl"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="html" class="con">
                    <table class="table1">
                        <tr>
                            <th class="w100">カテゴリページURLルール</th>
                            <td>
                                <input type="text" name="cat_html_url" required="" class="w300" value="<?php echo $field['cat_html_url'];?>"/>
                                <span id="zh_cat_html_url"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>内容ページURLルール</th>
                            <td>
                                <input type="text" name="arc_html_url" required="" class="w300" value="<?php echo $field['arc_html_url'];?>"/>
                                <span id="zh_arc_html_url"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="seo">
                    <table class="table1">
                        <tr>
                            <th>キーワード</th>
                            <td>
                                <input type="text" name="cat_keyworks" value="<?php echo $field['cat_keyworks'];?>" class="w350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>説明</th>
                            <td>
                                <textarea name="cat_description" class="w350 h100"><?php echo $field['cat_description'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="w100">SEOタイトル</th>
                            <td>
                                <input type="text" name="cat_seo_title" value="<?php echo $field['cat_seo_title'];?>" class="w350"/>
                            </td>
                        </tr>
                        <tr>
                            <th>SEO説明</th>
                            <td>
                                <textarea name="cat_seo_description" class="w400 h150"><?php echo $field['cat_seo_description'];?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>

                <div id="access">
                    <table class="table1">
                        <tr>
                            <th class="w100">
                                投稿審査なし
                            </th>
                            <td>
                                <label><input type="radio" name="member_send_state" value="1" <?php if($field['member_send_state'] == 1){?>checked=""<?php }?>/> YES </label>
                                <label><input type="radio" name="member_send_state" value="0" <?php if($field['member_send_state'] == 0){?>checked=""<?php }?>/> NO </label>
                            </td>
                        </tr>
                    </table>
                    <table class="table1">
                        <tr>
                            <th class="w100">
                                グループの権限管理 
                            </th>
                            <td>
                                <table class="table2">
                                    <thead>
                                    <tr>
                                        <td class="w250">グループ名</td>
                                        <td>查看</td>
                                        <td>新規</td>
                                        <td>修正</td>
                                        <td>削除</td>
                                        <td>ソート</td>
                                        <td>移動</td>
                                        <td>審査</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $zh["list"]["r"]["total"]=0;if(isset($access['admin']) && !empty($access['admin'])):$_id_r=0;$_index_r=0;$lastr=min(1000,count($access['admin']));
$zh["list"]["r"]["first"]=true;
$zh["list"]["r"]["last"]=false;
$_total_r=ceil($lastr/1);$zh["list"]["r"]["total"]=$_total_r;
$_data_r = array_slice($access['admin'],0,$lastr);
if(count($_data_r)==0):echo "";
else:
foreach($_data_r as $key=>$r):
if(($_id_r)%1==0):$_id_r++;else:$_id_r++;continue;endif;
$zh["list"]["r"]["index"]=++$_index_r;
if($_index_r>=$_total_r):$zh["list"]["r"]["last"]=true;endif;?>

                                        <tr>
                                            <td>
                                                <a href="javascript:" onclick="select_access_checkbox(this)"><?php echo $r['rname'];?></a>
                                                <input type="hidden" name="access[<?php echo $r['rid'];?>][rid]" value="<?php echo $r['rid'];?>"/>
                                                <input type="hidden" name="access[<?php echo $r['rid'];?>][admin]" value="1"/>
                                            </td>
                                            <td><input type="checkbox" name="access[<?php echo $r['rid'];?>][show]" value="1" <?php if($r['show']){?>checked=""<?php }?>/></td>
                                            <td><input type="checkbox" name="access[<?php echo $r['rid'];?>][add]" value="1" <?php if($r['add']){?>checked=""<?php }?>/></td>
                                            <td><input type="checkbox" name="access[<?php echo $r['rid'];?>][edit]" value="1" <?php if($r['edit']){?>checked=""<?php }?>/></td>
                                            <td><input type="checkbox" name="access[<?php echo $r['rid'];?>][del]" value="1" <?php if($r['del']){?>checked=""<?php }?>/></td>
                                            <td><input type="checkbox" name="access[<?php echo $r['rid'];?>][order]" value="1" <?php if($r['order']){?>checked=""<?php }?>/></td>
                                            <td><input type="checkbox" name="access[<?php echo $r['rid'];?>][move]" value="1" <?php if($r['move']){?>checked=""<?php }?>/></td>
                                            <td><input type="checkbox" name="access[<?php echo $r['rid'];?>][audit]" value="1" <?php if($r['audit']){?>checked=""<?php }?>/></td>
                                        </tr>
                                    <?php $zh["list"]["r"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th class="w100">
                                会員グループ権限
                            </th>
                            <td>
                                <table class="table2">
                                    <thead>
                                    <tr>
	                                    <td class="w250">グループ名</td>
	                                    <td>查看</td>
	                                    <td>投稿</td>
	                                    <td>修正</td>
	                                    <td>削除</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $zh["list"]["r"]["total"]=0;if(isset($access['user']) && !empty($access['user'])):$_id_r=0;$_index_r=0;$lastr=min(1000,count($access['user']));
$zh["list"]["r"]["first"]=true;
$zh["list"]["r"]["last"]=false;
$_total_r=ceil($lastr/1);$zh["list"]["r"]["total"]=$_total_r;
$_data_r = array_slice($access['user'],0,$lastr);
if(count($_data_r)==0):echo "";
else:
foreach($_data_r as $key=>$r):
if(($_id_r)%1==0):$_id_r++;else:$_id_r++;continue;endif;
$zh["list"]["r"]["index"]=++$_index_r;
if($_index_r>=$_total_r):$zh["list"]["r"]["last"]=true;endif;?>

                                        <tr>
                                            <td>
                                                <a href="javascript:" onclick="select_access_checkbox(this)"><?php echo $r['rname'];?></a>
                                                <input type="hidden" name="access[<?php echo $r['rid'];?>][rid]" value="<?php echo $r['rid'];?>"/>
                                                <input type="hidden" name="access[<?php echo $r['rid'];?>][admin]" value="0"/>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access[<?php echo $r['rid'];?>][show]" value="1" <?php if($r['show']){?>checked=""<?php }?>/>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access[<?php echo $r['rid'];?>][add]" value="1" <?php if($r['add']){?>checked=""<?php }?>/>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access[<?php echo $r['rid'];?>][edit]" value="1" <?php if($r['edit']){?>checked=""<?php }?>/>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access[<?php echo $r['rid'];?>][del]" value="1" <?php if($r['del']){?>checked=""<?php }?>/>
                                            </td>
                                        </tr>
                                    <?php $zh["list"]["r"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>

                <div id="charge">
                    <table class="table1">
                        <tr>
                            <th class="w100">会員の閲読金貨設置</th>
                            <td>
                                <label><input type="radio" name="allow_user_set_credits" value="1" <?php if($field['allow_user_set_credits'] == 1){?>checked=""<?php }?>/> 許可</label>
                                <label><input type="radio" name="allow_user_set_credits" value="0" <?php if($field['allow_user_set_credits'] == 0){?>checked=""<?php }?>/> 許可なし</label>
                                <span class="validate-message">
                                    会員投稿する時、閲読金貨設置権限設置（フロント側だけ有効）
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w100">投稿奨励</th>
                            <td>
                                <input type="text" name="add_reward" required="" class="w100" value="<?php echo $field['add_reward'];?>"/> 金貨
                                <span id="zh_add_reward"></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w100">閲読金貨</th>
                            <td>
                                <input type="text" name="show_credits" required="" class="w100" value="<?php echo $field['show_credits'];?>"/> 金貨
                                <span id="zh_show_credits"></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w100">繰り返し料金設定</th>
                            <td>
                                <input type="text" name="repeat_charge_day" required="" class="w100" value="<?php echo $field['repeat_charge_day'];?>"/> 日
                                <span id='zh_repeat_charge_day'>

                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="zh-success" value="確定"/>
        <input type="button" class="zh-cancel" value="取り消し" onclick="location.href='http://www.metacms.com/index.php?a=Admin&c=Category'"/>
    </div>
</form>
</body>
</html>