<script>
var admin_field_textarea_validate_js_message1='方忖を秘薦してください。';
</script>
<script type="text/javascript" src="<?php echo __ROOT__;?>/zh/Zhcms/Admin/Data/Field/textarea/validate.js"></script>
<table class="table1">
    <tr class="input action">
        <th class="w400">パラメ�`タ</th>
        <td>
            <table class="table1">
                <tr>
                    <td class="w100">ﾚさ</td>
                    <td><input type="text" name="set[width]" class="w100 textarea_width" value="<?php echo $field['set']['width'];?>"/> </td>
                </tr>
                <tr>
                    <td>互さ</td>
                    <td><input type="text" name="set[height]" class="w100 textarea_height" value="<?php echo $field['set']['height'];?>"/> </td>
                </tr>
                <tr>
                    <td>デフォルトの��</td>
                    <td><textarea class="w300 h60" name="set[default]"><?php echo $field['set']['default'];?></textarea></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
