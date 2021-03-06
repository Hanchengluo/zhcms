/* $Id : shopping_flow.js 4865 2007-01-31 14:04:10Z paulgao $ */

var selectedShipping = null;
var selectedPayment  = null;
var selectedPack     = null;
var selectedCard     = null;
var selectedSurplus  = '';
var selectedBonus    = 0;
var selectedIntegral = 0;
var selectedOOS      = null;
var alertedSurplus   = false;

var groupBuyShipping = null;
var groupBuyPayment  = null;

/* *
 * 改变配送方式
 */
function selectShipping(obj)
{
    if (selectedShipping == obj)
    {
        return;
    }
    else
    {
        selectedShipping = obj;
    }
    
    //是否支持货到付款，1，支持；0，不支持
    var supportCod = obj.attributes['supportCod'].value + 0;
    var theForm = obj.form;
    
    for (i = 0; i < theForm.elements.length; i ++ )
    {
        if (theForm.elements[i].name == 'payment' && theForm.elements[i].attributes['isCod'].value == '1')
        {
            if (supportCod == 0)//不支持货到付款
            {
                theForm.elements[i].checked = false;
                theForm.elements[i].disabled = true;
            }
            else//支持货到付款
            {
                theForm.elements[i].disabled = false;
            }
        }
    }
    if (obj.attributes['insure'].value + 0 == 0)
    {
        document.getElementById('ECS_NEEDINSURE').checked = false;
        document.getElementById('ECS_NEEDINSURE').disabled = true;
    }
    else
    {
        document.getElementById('ECS_NEEDINSURE').checked = false;
        document.getElementById('ECS_NEEDINSURE').disabled = false;
    }
    var now = new Date();
    var ajaxurl=APP+'&c=EcFlow&m=index&step=select_shipping';
    Ajax.call(ajaxurl, 'shipping=' + obj.value, orderShippingSelectedResponse, 'GET', 'JSON');
  
}

/**
 *
 */
function orderShippingSelectedResponse(result)
{
    if (result.need_insure)
    {
        try
        {
            document.getElementById('ECS_NEEDINSURE').checked = true;
        }
        catch (ex)
        {
            alert(ex.message);
        }
    }
    
    try
    {
        if (document.getElementById('ECS_CODFEE') != undefined)
        {
            document.getElementById('ECS_CODFEE').innerHTML = result.cod_fee;
        }
    }
    catch (ex)
    {
        alert(ex.message);
    }
    
    orderSelectedResponse(result);
}

/* *
 * 改变支付方式
 */
function selectPayment(obj)
{
    if (selectedPayment == obj)
    {
        return;
    }
    else
    {
        selectedPayment = obj;
    }
    var ajaxurl=APP+'&c=EcFlow&m=index&step=select_payment';
    Ajax.call(ajaxurl, 'payment=' + obj.value, orderSelectedResponse, 'GET', 'JSON');
}
/* *
 * 团购购物流程 --> 改变配送方式
 */
function handleGroupBuyShipping(obj)
{
    alert('shopping_flow.js---handleGroupBuyShipping');
}

/* *
 * 团购购物流程 --> 改变支付方式
 */
function handleGroupBuyPayment(obj)
{
    alert('shopping_flow.js---handleGroupBuyPayment');
}

/* *
 * 改变商品包装
 */
function selectPack(obj)
{
    if (selectedPack == obj)
    {
        return;
    }
    else
    {
        selectedPack = obj;
    }
    var ajaxurl=APP+'&c=EcFlow&m=index&step=select_pack';
    Ajax.call(ajaxurl, 'pack=' + obj.value, orderSelectedResponse, 'GET', 'JSON');
}

/* *
 * 改变祝福贺卡
 */
function selectCard(obj)
{
    if (selectedCard == obj)
    {
        return;
    }
    else
    {
        selectedCard = obj;
    }
    var ajaxurl=APP+'&c=EcFlow&m=index&step=select_card';
    Ajax.call(ajaxurl, 'card=' + obj.value, orderSelectedResponse, 'GET', 'JSON');
}

/* *
 * 选定了配送保价
 */
function selectInsure(needInsure)
{
    needInsure = needInsure ? 1 : 0;
    var ajaxurl=APP+'&c=EcFlow&m=index&step=select_insure';
    Ajax.call(ajaxurl, 'insure=' + needInsure, orderSelectedResponse, 'GET', 'JSON');
}

/* *
 * 团购购物流程 --> 选定了配送保价
 */
function handleGroupBuyInsure(needInsure)
{
  alert('shopping_flow.js---handleGroupBuyInsure');
}

/* *
 * 回调函数
 */
function orderSelectedResponse(result)
{
    if (result.error)
    {
        alert(result.error);
        location.href = './';
    }
    
    try
    {
        var layer = document.getElementById("ECS_ORDERTOTAL");
        
        layer.innerHTML = (typeof result == "object") ? result.content : result;
        
        if (result.payment != undefined)
        {
            var surplusObj = document.forms['theForm'].elements['surplus'];
            if (surplusObj != undefined)
            {
                surplusObj.disabled = result.pay_code == 'balance';
            }
        }
    }
    catch (ex) { }
}

/* *
 * 改变余额
 */
function changeSurplus(val)
{
    alert('shopping_flow.js---changeSurplus');
}

/* *
 * 改变余额回调函数
 */
function changeSurplusResponse(obj)
{
    alert('shopping_flow.js---changeSurplusResponse');
}

/* *
 * 改变积分
 */
function changeIntegral(val)
{
    if (selectedIntegral == val)
    {
        return;
    }
    else
    {
        selectedIntegral = val;
    }
    
    var ajaxurl=APP+'&c=EcFlow&m=index&step=change_integral';
    Ajax.call(ajaxurl, 'points=' + val, changeIntegralResponse, 'GET', 'JSON');

}

/* *
 * 改变积分回调函数
 */
function changeIntegralResponse(obj)
{
    if (obj.error)
    {
        try
        {
            document.getElementById('ECS_INTEGRAL_NOTICE').innerHTML = obj.error;
            document.getElementById('ECS_INTEGRAL').value = '0';
            document.getElementById('ECS_INTEGRAL').focus();
        }
        catch (ex) { }
    }
    else
    {
        try
        {
            document.getElementById('ECS_INTEGRAL_NOTICE').innerHTML = '';
        }
        catch (ex) { }
            orderSelectedResponse(obj.content);
    }
}

/* *
 * 改变红包
 */
function changeBonus(val)
{
    if (selectedBonus == val)
    {
        return;
    }
    else
    {
        selectedBonus = val;
    }
    var ajaxurl=APP+'&c=EcFlow&m=index&step=change_bonus';
    Ajax.call(ajaxurl, 'bonus=' + val, changeBonusResponse, 'GET', 'JSON');
}

/* *
 * 改变红包的回调函数
 */
function changeBonusResponse(obj)
{
    if (obj.error)
    {
        alert(obj.error);
        
        try
        {
            document.getElementById('ECS_BONUS').value = '0';
        }
        catch (ex) { }
    }
    else
    {
        orderSelectedResponse(obj.content);
    }
}

/**
 * 验证红包序列号
 * @param string bonusSn 红包序列号
 */
function validateBonus(bonusSn)
{
    var ajaxurl=APP+'&c=EcFlow&m=index&step=validate_bonus';
    Ajax.call(ajaxurl, 'bonus_sn=' + bonusSn, validateBonusResponse, 'GET', 'JSON');
}

function validateBonusResponse(obj)
{
    if (obj.error)
    {
        alert(obj.error);
        orderSelectedResponse(obj.content);
        try
        {
            document.getElementById('ECS_BONUSN').value = '0';
        }
        catch (ex) { }
    }
    else
    {
        orderSelectedResponse(obj.content);
    }
}

/* *
 * 改变发票的方式
 */
function changeNeedInv()
{
    var obj        = document.getElementById('ECS_NEEDINV');
    var objType    = document.getElementById('ECS_INVTYPE');
    var objPayee   = document.getElementById('ECS_INVPAYEE');
    var objContent = document.getElementById('ECS_INVCONTENT');
    var needInv    = obj.checked ? 1 : 0;
    var invType    = obj.checked ? (objType != undefined ? objType.value : '') : '';
    var invPayee   = obj.checked ? objPayee.value : '';
    var invContent = obj.checked ? objContent.value : '';
    objType.disabled = objPayee.disabled = objContent.disabled = ! obj.checked;
    if(objType != null)
    {
        objType.disabled = ! obj.checked;
    }
    
    var ajaxurl=APP+'&c=EcFlow&m=index&step=change_needinv';
    Ajax.call(ajaxurl, 'need_inv=' + needInv + '&inv_type=' + encodeURIComponent(invType) + '&inv_payee=' + encodeURIComponent(invPayee) + '&inv_content=' + encodeURIComponent(invContent), orderSelectedResponse, 'GET');
}

/* *
 * 改变发票的方式
 */
function groupBuyChangeNeedInv()
{
    alert('shopping_flow.js---groupBuyChangeNeedInv');
}

/* *
 * 改变缺货处理时的处理方式
 */
function changeOOS(obj)
{
    if (selectedOOS == obj)
    {
        return;
    }
    else
    {
        selectedOOS = obj;
    }
    var ajaxurl=APP+'&c=EcFlow&m=index&step=change_oos';
    Ajax.call(ajaxurl, 'oos=' + obj.value, null, 'GET');
}

/* *
 * 检查提交的订单表单
 */
function checkOrderForm(frm)
{
    var paymentSelected = false;
    var shippingSelected = false;
    
    // 检查是否选择了支付配送方式
    for (i = 0; i < frm.elements.length; i ++ )
    {
        if (frm.elements[i].name == 'shipping' && frm.elements[i].checked)
        {
            shippingSelected = true;
        }
        
        if (frm.elements[i].name == 'payment' && frm.elements[i].checked)
        {
            paymentSelected = true;
        }
    }
    
    if ( ! shippingSelected)
    {   
        alert(flow_no_shipping);
        return false;
    }
    
    if ( ! paymentSelected)
    {
        alert(flow_no_payment);
        return false;
    }
    
    // 检查用户输入的余额
    if (document.getElementById("ECS_SURPLUS"))
    {
        var surplus = document.getElementById("ECS_SURPLUS").value;
        var ajaxurl=APP+'&c=EcFlow&m=index&step=check_surplus';
        var error   = Utils.trim(Ajax.call(ajaxurl, 'surplus=' + surplus, null, 'GET', 'TEXT', false));
        
        if (error)
        {
            try
            {
                document.getElementById("ECS_SURPLUS_NOTICE").innerHTML = error;
            }
            catch (ex)
            {
            }
            return false;
        }
    }
    
    // 检查用户输入的积分
    if (document.getElementById("ECS_INTEGRAL"))
    {
        var integral = document.getElementById("ECS_INTEGRAL").value;
        var ajaxurl=APP+'&c=EcFlow&m=index&step=check_integral';
        var error    = Utils.trim(Ajax.call(ajaxurl, 'integral=' + integral, null, 'GET', 'TEXT', false));
        
        if (error)
        {
            return false;
            try
            {
                document.getElementById("ECS_INTEGRAL_NOTICE").innerHTML = error;
            }
            catch (ex)
            {
            }
        }
    }
    frm.action = frm.action + '&step=done';
    return true;
}

/* *
 * 检查收货地址信息表单中填写的内容
 */
function checkConsignee(frm)
{
    var msg = new Array();
    var err = false;
    
    if (frm.elements['country'] && frm.elements['country'].value == 0)
    {
        msg.push(country_not_null);
        err = true;
    }
    
    if (frm.elements['province'] && frm.elements['province'].value == 0 && frm.elements['province'].length > 1)
    {
        err = true;
        msg.push(province_not_null);
    }
    
    if (frm.elements['city'] && frm.elements['city'].value == 0 && frm.elements['city'].length > 1)
    {
        err = true;
        msg.push(city_not_null);
    }
    
    if (frm.elements['district'] && frm.elements['district'].length > 1)
    {
        if (frm.elements['district'].value == 0)
        {
            err = true;
            msg.push(district_not_null);
        }
    }
    
    if (Utils.isEmpty(frm.elements['consignee'].value))
    {
        err = true;
        msg.push(consignee_not_null);
    }
    
    if ( ! Utils.isEmail(frm.elements['email'].value))
    {
        err = true;
        msg.push(invalid_email);
    }
    
    if (frm.elements['address'] && Utils.isEmpty(frm.elements['address'].value))
    {
        err = true;
        msg.push(address_not_null);
    }
    
    if (frm.elements['zipcode'] && frm.elements['zipcode'].value.length > 0 && (!Utils.isNumber(frm.elements['zipcode'].value)))
    {
        err = true;
        msg.push(zip_not_num);
    }
    
    if (Utils.isEmpty(frm.elements['tel'].value))
    {
        err = true;
        msg.push(tele_not_null);
    }
    else
    {
        if (!Utils.isTel(frm.elements['tel'].value))
        {
            err = true;
            msg.push(tele_invaild);
        }
    }
    
    if (frm.elements['mobile'] && frm.elements['mobile'].value.length > 0 && (!Utils.isTel(frm.elements['mobile'].value)))
    {
        err = true;
        msg.push(mobile_invaild);
    }
    
    if (err)
    {
        message = msg.join("\n");
        alert(message);
    }
    return ! err;
}
