<script>
//点击确定
$(function () {
    //全选
    $("#select_all").click(function () {
        
        $("[type='checkbox']").each(function(i){
               if( $(this).attr("checked") == "checked"){
                    $(this).attr("checked",false);
               }else{
                    $(this).attr("checked",true);
               }
               updateSelect($(this));
         });
    })
})
</script>
<table class="table2 zh-form">
				<thead>
					<tr>
						<td class="w80">
                        <if value="$select_type == 'single' ">
                            操作
                        <else/>
                            <button id="select_all" class="zh-cancel">反选</button>
                        </if>
						</td>
						<td class="w30">id</td>
                        <foreach from="$showt" value="$showtv">
                            <td>{$showtv}</td>
                        </foreach>

					</tr>
				</thead>
				<list from="$data" name="c" >
					<tr>
						<td>
                            <if value="$select_type == 'single' ">
                                <button id="select_all" class="zh-success" name="id[]"   value="{$c.id}" onclick="singleSelect(this);">选择</button>
                            <else/>
                                <input type="checkbox" name="id[]" value="{$c.id}" onclick="updateSelect(this)"/>
                            </if>
						</td>
						<td>{$c.id}</td>
                        <foreach from="$c.showf_value_array" value="$showf_value_array_v">
                            <td>{$showf_value_array_v}</td>
                        </foreach>
					</tr>
				</list>
			</table>
			<div class="page1">
				{$page}
			</div>