<script>
var admin_field_editor_validate_js_message1='エディタの高さは空にできません';
var admin_field_editor_validate_js_message2='数字を入力してください。';
</script>
<script type="text/javascript" src="<?php echo __ROOT__;?>/zh/Zhcms/Admin/Data/Field/editor/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">パラメータ</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w60">高さ</td>
                    <td><input type="text" name="set[height]" class="w100 editor_height" value="<?php echo $field['set']['height'];?>" class="w100"/> px</td>
                </tr>
                <tr>
                    <td>デフォルトの値</td>
                    <td><textarea class="w300 h60" name="set[default]"><?php echo $field['set']['default'];?></textarea></td>
                </tr>
            </table>
        </td>
    </tr>
</table>