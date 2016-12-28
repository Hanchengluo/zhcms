<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容ページ作成</title>
    <zhjs/>
    <script>
        //栏目缓存数据
        var category = {$category};
    </script>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>

</head>
<body>
<form method="post" action="__METH__" class="zh-form">
    <div class="wrap">
        <div class="title-header">暖かいヒント</div>
        <div class="help">
        	作成失敗の場合、毎回作成件数を小さく設置してください
        </div>
        <div class="title-header">ルール設置</div>
        <table class="table2">
            <tr>
                <td class="w200">Modelで更新</td>
                <td class="w300">カテゴリ範囲選択</td>
                <td>操作内容選択</td>
            </tr>
            <tr>
                <td class="w200" rowspan="5">
                    <select name="mid" id="mid" style="height: 200px;width: 99%" size="2">
                        <option value="0" selected="selected">Model限定なし</option>
                        <list from="$model" name="m">
                            <option value="{$m.mid}">{$m.model_name}</option>
                        </list>
                    </select>
                </td>
                <td class="w300" rowspan="5">
                    <select name="cid[]" id="cid" style="height: 200px;width: 99%"
                            title="Ctrl 或いは　Shiftを押しながら、複数選択できます" multiple="multiple">
                        <option value="0" selected="selected">カテゴリ限定なし</option>
                        <list from="$category" name="c" multiple="multiple">
                            <option value="{$c.cid}"
                            {$c.opt}>{$c.catname}</option>
                        </list>
                    </select>
                </td>
                <td>
                    <font color="red">
                        毎回更新
                        <input class="w100" type="text" value="20" id="row" name="step_row">
                        件
                    </font></td>
                </td>
            </tr>
            <tr>
                <td> すべての情報更新 <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('all')"/>
                </td>
            </tr>
            <tr style="display: none;">
                <td>
                    最新発表の <input class="input" type="text" size="4" value="100" name="total_row"> 件内容
                    <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('new')"/>
                </td>
            </tr>
            <tr style="display: none;">
                <td>発表開始時間
                    <input class="w80" type="text" id="start_time" name="start_time"> ～
                    <input class="w80" type="text" id="end_time" name="end_time"> の内容
                    <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('time')"/>
                    <script>
                        $('#start_time').calendar({format: 'yyyy/MM/dd'});
                        $('#end_time').calendar({format: 'yyyy/MM/dd'});
                    </script>
                </td>
            </tr>
            <tr style="display: none;">
                <td>
                    更新ID <input class="input" type="text" size="4" name="start_id"> ～
                    <input class="input" type="text" size="4" name="end_id"> の内容
                    <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('id')"/>
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>