
//提示框
function dr_tips( msg, code, time) {
    if (!time) {
        time = 3000;
    }
    var tip = '<i class="layui-icon"></i>';
    if (code == 1) {
        tip = '<i class="layui-icon"></i>';
    } else if (code == 0) {
        tip = '<i class="layui-icon">ဇ</i>';
    }
    layer.msg(tip+'  '+msg);
}
//轮播
layui.use('carousel', function(){
  	var carousel = layui.carousel;
  	//建造实例
  	carousel.render({
    elem: '#thumb'
    ,width: '100%' //设置容器宽度
	,height: '100%'
    ,arrow: 'always' //始终显示箭头
    ,indicator: 'none' //切换动画方式
  });
});
//相册层
layer.photos({
  photos: '#thumb'
  ,anim: 5
});
//代码修饰器
layui.code({
  	elem: 'pre', //默认值为.layui-code
	about: false
});
//提示层
layui.use('layer', function() {
    var layer = layui.layer;
    $(".show-title h1 i").hover(function() {
        if ($(this).text() != '') {
            layer.tips($(this).text(), $(this).parent("h1"), { area: ["auto"], tips: [3, '#5fb878'] });
        }
    }, function() {
        layer.closeAll();
    });


});
//退出
function dr_loginout(msg) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/user/login/outLogin",
        success: function(data) {
            dr_tips(msg,1);
            setTimeout('location.reload()', 2000);
        },
        error: function(HttpRequest, ajaxOptions, thrownError) {
            alert(HttpRequest.responseText);
        }
    })
}
/**
 * 操控剪切板
 */
function CopyText(text)
{
    var oInput = document.createElement('textarea');
    oInput.value = text;
    document.body.appendChild(oInput);
    oInput.select(); // 选择对象
    document.execCommand("Copy"); // 执行浏览器复制命令
    oInput.className = 'oInput';
    oInput.style.display='none';
}

//搜索headurl
function searchsubmit(){
    var a = $("#searchheadInput");
    if ("" == a.val().replace(/\s/, "")) return layer.alert("\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u8bcd",{icon: 0});
    location.href = "/portal/search/static_/?keyword=" + a.val()
};
//搜索headurl
function searchsub(){
    var b = $("#searchInput");
    if ("" == b.val().replace(/\s/, "")) return layer.alert("\u8bf7\u8f93\u5165\u641c\u7d22\u5173\u952e\u8bcd",{icon: 0});
    location.href = "/portal/search/static_/?keyword=" + b.val()
};

//滚动
function autoScroll2(obj){
	$(obj).find("ul").animate({ 
		marginTop : "-15px"
	},500,function(){
		$(this).css({marginTop : "0px"}).find("li:eq(0)").appendTo(this);
	})
}
$(function(){ 
	setInterval('autoScroll2(".show-gun")',2000);
});