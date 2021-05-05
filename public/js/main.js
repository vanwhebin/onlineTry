var body = jQuery('body');
var st = 0;
var lastSt = 0;
var navText = ['<i class="mdi mdi-chevron-left"></i>', '<i class="mdi mdi-chevron-right"></i>'];
var iconspin = '<i class="fa fa-spinner fa-spin"></i> ';
var iconcheck = '<i class="fa fa-check"></i> ';
var iconwarning = '<i class="fa fa-warning "></i> ';
var is_tencentcaptcha = false;

window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.loadHidden = false;

jQuery(function () {
    'use strict';
    smallimage();
    slider();
    megaMenu();
    categoryBoxes();
    picks();
    offCanvas();
    search();
    pagination();
    sidebar();
    signup_popup();
    tap_full();
});

//滚动到下面隐藏导航栏
function navbar() {
    'use strict';
    st = jQuery(window).scrollTop();
    var adHeight = jQuery('.ads.before_header').outerHeight();
    var navbarHeight = jQuery('.site-header').height();
    var stickyTransparent = jQuery('.navbar-sticky_transparent.with-hero');
    var adsBeforeHeader = jQuery('.navbar-sticky.ads-before-header, .navbar-sticky_transparent.ads-before-header');
    var stickyStickyTransparent = jQuery('.navbar-sticky.navbar-slide, .navbar-sticky_transparent.navbar-slide');
    if (st > (navbarHeight + adHeight)) {
        stickyTransparent.addClass('navbar-sticky');
    } else {
        stickyTransparent.removeClass('navbar-sticky');
    }
    if (st > adHeight) {
        adsBeforeHeader.addClass('stick-now');
    } else {
        adsBeforeHeader.removeClass('stick-now');
    }
    if (st > lastSt && st > (navbarHeight + adHeight + 100)) {
        stickyStickyTransparent.addClass('slide-now');
    } else {
        if (st + jQuery(window).height() < jQuery(document).height()) {
            stickyStickyTransparent.removeClass('slide-now');
        }
    }
    lastSt = st;
}
jQuery(window).scroll(function () {
    'use strict';

    if (body.hasClass('navbar-sticky') || body.hasClass('navbar-sticky_transparent')) {
        window.requestAnimationFrame(navbar);
    }
});
//

//搜索窗口
var $ = layui.jquery,
    layer = layui.layer;
$('.search').on('click', function () {
    layer.open({
        type: 1,
        title: '',
        shadeClose: true,
        area: ['600px', '350px'],
        content: $('#searchheadBox')
    });
});
$('input#searchheadInput').keydown(function (e) {
    if (e.keyCode == 13) {
        searchsubmit();
    }
});
$('input#searchInput').keydown(function (e) {
    if (e.keyCode == 13) {
        searchsub();
    }
});

document.addEventListener('lazyloaded', function (e) {
    var options = {
        disableParallax: /iPad|iPhone|iPod|Android/,
        disableVideo: /iPad|iPhone|iPod|Android/,
        speed: 0.1,
    };

    if (
        jQuery(e.target).parents('.hero').length ||
        jQuery(e.target).hasClass('hero')
    ) {
        jQuery(e.target).jarallax(options);
    }

    if (
        (jQuery(e.target).parent().hasClass('module') && jQuery(e.target).parent().hasClass('parallax')) ||
        jQuery(e.target).parent().hasClass('entry-navigation')
    ) {
        jQuery(e.target).parent().jarallax(options);
    }
});

//图片悬浮放大
function smallimage(){

    var x = 22;
    var y = 20;

    $(".smallimage").hover(function(e){
        $("body").append('<p id="bigimage"><img src="'+ this.src + '" alt="" /></p>');
        $(this).fadeTo('slow',0.5);
        widthJudge(e);
        $("#bigimage").fadeIn('fast');
    },function(){
        $(this).fadeTo('slow',1);
        $("#bigimage").remove();
    });

    $(".smallimage").mousemove(function(e){
        widthJudge(e);
    });

    function widthJudge(e){
        var marginRight = document.documentElement.clientWidth - e.pageX;
        var imageWidth = $("#bigimage").width();
        if(marginRight < imageWidth)
        {
            x = imageWidth + 22;
            $("#bigimage").css({top:(e.pageY - y ) + 'px',left:(e.pageX - x ) + 'px'});
        }else{
            x = 22;
            $("#bigimage").css({top:(e.pageY - y ) + 'px',left:(e.pageX + x ) + 'px'});
        };
    }
}


var guanbi = 0;

//判断登录
function check_login() {
    $.get("/user/login/wxLogin", {
        userId: "{$userId}"
    }, function (data) {
        if (data.status == 1) {
            layer.closeAll();


            layer.alert(data.msg,
                {
                    icon: 1,
                    end: function () {
                        location.reload();
                    },
                });

        } else if (data.status == -1) {
            layer.alert(data.msg, {
                icon: 2
            });

        } else if (guanbi == 0) {

            setTimeout("check_login()", 800);
        }
    }, "json");
}

//打开登录窗口
function open_signup_popup(title) {
    var title = title || "微信扫码";
    layer.open({
        type: 2,
        title: title,
        shadeClose: true,
        area: ['300px', '380px'], // 宽高
        content: "/user/login.html",
        btn2: function () {
            return false;
        },
        end: function () {
            guanbi = 1;
        },
    });
    guanbi = 0;
    setTimeout("check_login()", 1000);
}

//登陆按钮点击事件
function signup_popup() {
    'use strict';
    $(".login-btn").on("click", function (event) {
        open_signup_popup()
    });
}

//VIP开通界面
function vip(login, title) {
    var login = login || 1;
    var title = title || "在线开通VIP会员";

    if (login == 0) {
        open_signup_popup("抱歉，您还未登录");
    } else {

        layer.open({
            type: 2,
            shadeClose: true,
            title: title,
            area: ['723px', '520px'], // 宽高
            content: "/user/vip",
        });
    }
}

//VIP开通完成提示
function vipOk() {
    layer.alert('恭喜您开通VIP成功~ 感谢您的支持！', {
        icon: 1,
        end: function () {
            location.reload();
        },
    });
}

//打开助力页面
function zhuli(post_id) {
    layer.open({
        type: 2,
        title: "邀请好友助力获取解压密码",
        area: ['35%', '55%'], // 宽高
        content: "/user/zhuli.html?_=" + new Date().getTime() + "&post_id=" + post_id,
    });
}

/**
 * 文章提交评论
 * @param {*} postId 文章id
 * @param {*} pId 上级评论id
 */
function dr_post_comment(post_id,p_id)
{
    var content = $("#comment").val();
    if(content == "")
    {
        $('#comment').focus();
        layer.msg('评论内容不能为空！', {time: 700});
        return;
    }
    $.ajax({
        type: "post",
        url: "/user/comment/toAdd",
        dataType: 'json',
        data: {
            "post_id": post_id,
            "content": content,
            "p_id": p_id,
        },
        success: function (data) {
            if (data.status) {
                $("#comment").val("");
                layer.alert(data.msg, {
                    icon: 1,
                    title: "评论成功"
                });
            } else {
                layer.alert(data.msg, {
                    icon: 2
                });
            }
        },
        error: function (error) {
            layer.alert("API请求失败，请联系客服", {
                icon: 2
            });
        }
    });
}

//获取解压密码
function getJiyamima(post_id) {

    $.ajax({
        type: "post",
        url: "/user/jieyamima",
        dataType: 'json',
        data: {
            "post_id": post_id,
        },
        success: function (data) {
            if (data.status) {
                CopyText(data.data);
                layer.alert(data.msg, {
                    icon: 1,
                    title: "已为您自动复制"
                });
            } else {
                layer.alert(data.msg, {
                    icon: 2
                });
            }
        },
        error: function (error) {
            layer.alert("API请求失败，请联系客服", {
                icon: 2
            });
        }
    });
}

//获取解压密码
function jieyamima(vip_statis, login, isvip, post_id) {
    if (vip_statis == 0) {
        return getJiyamima(post_id);
    }

    if (login == 0) {
        open_signup_popup("抱歉，您还未登录");
    } else if (isvip == 0) {
        //zhuli(post_id);
        vip(login, "抱歉，此资源VIP会员专享···");
    } else {
        getJiyamima(post_id);
    }
}

function slider() {
    'use strict';

    var autoplayOptions = {
        autoplay: true,
        autoplaySpeed: 800,
        loop: true,
    };

    var bigSlider = jQuery('.slider.big.module');
    var bigSliderOptions = {
        animateOut: 'fadeOut',
        dots: true,
        items: 1,
        nav: false,
        navText: navText,
    };
    bigSlider.each(function (i, v) {
        if (jQuery(v).hasClass('autoplay')) {
            var bigSliderAuto = Object.assign(autoplayOptions, bigSliderOptions);
            jQuery(v).owlCarousel(bigSliderAuto);
        } else {
            jQuery(v).owlCarousel(bigSliderOptions);
        }
    });

    var centerSlider = jQuery('.slider.center.module');
    var centerSliderOptions = {
        center: true,
        dotsSpeed: 800,
        loop: true,
        margin: 20,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
        },
    };
    centerSlider.each(function (i, v) {
        if (jQuery(v).hasClass('autoplay')) {
            var centerSliderAuto = Object.assign(autoplayOptions, centerSliderOptions);
            jQuery(v).owlCarousel(centerSliderAuto);
        } else {
            jQuery(v).owlCarousel(centerSliderOptions);
        }
    });

    var thumbnailSlider = jQuery('.slider.thumbnail.module');
    var thumbnailSliderOptions = {
        dotsData: true,
        dotsSpeed: 800,
        items: 1,
    };
    thumbnailSlider.each(function (i, v) {
        if (jQuery(v).hasClass('autoplay')) {
            var thumbnailSliderAuto = Object.assign(autoplayOptions, thumbnailSliderOptions);
            jQuery(v).owlCarousel(thumbnailSliderAuto);
        } else {
            jQuery(v).owlCarousel(thumbnailSliderOptions);
        }
    });
}

function tap_full() {
    'use strict';
    $('[etap="to_full"]').on('click', function () {
        var element = document.documentElement; // 返回 html dom 中的root 节点 <html>

        if (!$('body').hasClass('full-screen')) {
            $('body').addClass('full-screen');
            $('#alarm-fullscreen-toggler').addClass('active');
            // 判断浏览器设备类型
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) { // 兼容火狐
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) { // 兼容谷歌
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) { // 兼容IE
                element.msRequestFullscreen();
            }
        } else {
            console.log(document);
            $('body').removeClass('full-screen');
            $('#alarm-fullscreen-toggler').removeClass('active');
            //  退出全屏
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    })
}

function megaMenu() {
    'use strict';

    var options = {
        items: 5,
        margin: 15,
    };

    jQuery('.menu-posts').not('.owl-loaded').owlCarousel(options);
    var scroller = $('.rollbar')

    $(window).scroll(function () {
        var h = document.documentElement.scrollTop + document.body.scrollTop
        h > 200 ? scroller.fadeIn() : scroller.fadeOut();
    })
    $('[etap="to_top"]').on('click', function () {
        $('html,body').animate({
            scrollTop: 0
        }, 300)
    })

    //tap_dark
    $(document).on('click', ".tap-dark", function (event) {
        var _this = $(this)
        var deft = _this.html()
        _this.html(iconspin)


        $.ajax({
            url: caozhuti.ajaxurl,
            type: 'POST',
            dataType: 'html',
            data: {
                "is_ripro_dark": $('body').hasClass('ripro-dark') === true ? '0' : '1',
                action: 'tap_dark'
            },
        })
            .done(function (response) {
                toggleDarkMode()
                _this.html(deft)
            })


    })

}


function toggleDarkMode() {
    $('body').toggleClass('ripro-dark')
}


function categoryBoxes() {
    'use strict';

    jQuery('.category-boxes').owlCarousel({
        dots: false,
        margin: 30,
        nav: true,
        navSpeed: 500,
        navText: navText,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1230: {
                items: 4,
            },
        },
    });
}

function picks() {
    'use strict';

    jQuery('.picked-posts').not('.owl-loaded').owlCarousel({
        autoHeight: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 500,
        autoplayTimeout: 3000,
        items: 1,
        loop: true,
    });
}

function offCanvas() {
    'use strict';

    var burger = jQuery('.burger');
    var canvasClose = jQuery('.canvas-close');

    jQuery('.main-menu .nav-list').slicknav({
        label: '',
        prependTo: '.mobile-menu',
    });

    burger.on('click', function () {
        body.toggleClass('canvas-opened');
        body.addClass('canvas-visible');
        dimmer('open', 'medium');
    });

    canvasClose.on('click', function () {
        if (body.hasClass('canvas-opened')) {
            body.removeClass('canvas-opened');
            dimmer('close', 'medium');
        }
    });

    jQuery('.dimmer').on('click', function () {
        if (body.hasClass('canvas-opened')) {
            body.removeClass('canvas-opened');
            dimmer('close', 'medium');
        }
    });

    jQuery(document).keyup(function (e) {
        if (e.keyCode == 27 && body.hasClass('canvas-opened')) {
            body.removeClass('canvas-opened');
            dimmer('close', 'medium');
        }
    });
}

function search() {
    'use strict';

    var searchContainer = jQuery('.main-search');
    var searchField = searchContainer.find('.search-field');

    jQuery('.search-open').on('click', function () {
        body.addClass('search-open');
        searchField.focus();
    });

    jQuery(document).keyup(function (e) {
        if (e.keyCode == 27 && body.hasClass('search-open')) {
            body.removeClass('search-open');
        }
    });

    jQuery('.search-close').on('click', function () {
        if (body.hasClass('search-open')) {
            body.removeClass('search-open');
        }
    });

    jQuery(document).mouseup(function (e) {
        if (!searchContainer.is(e.target) && searchContainer.has(e.target).length === 0 && body.hasClass('search-open')) {
            body.removeClass('search-open');
        }
    });
}



function pagination() {
    'use strict';

    var wrapper = jQuery('.posts-wrapper');
    var button = jQuery('.infinite-scroll-button');
    var options = {
        append: wrapper.selector + ' > *',
        debug: false,
        hideNav: '.posts-navigation',
        history: false,
        path: '.posts-navigation .nav-previous a',
        prefill: true,
        status: '.infinite-scroll-status',
    };

    if (body.hasClass('pagination-infinite_button')) {
        options.button = button.selector;
        options.prefill = false;
        options.scrollThreshold = false;

        wrapper.on('request.infiniteScroll', function (event, path) {
            button.html(caozhuti.infinite_loading);
        });

        wrapper.on('load.infiniteScroll', function (event, response, path) {
            button.html(caozhuti.infinite_load);
        });
    }

    if ((body.hasClass('pagination-infinite_button') || body.hasClass('pagination-infinite_scroll')) && body.hasClass('paged-next')) {
        wrapper.infiniteScroll(options);
    }
}

function sidebar() {
    'use strict';
    var navbarHeight = jQuery('.site-header').height();
    var topHeight = 0;
    // 移动端自动将下载信息放文章末尾
    var this_max_width = $(window).width();
    if (this_max_width < 768) {
        $("aside .widget.widget-pay").insertAfter($("#pay-single-box"));
    } else {
        jQuery('.container .sidebar-column').theiaStickySidebar({
            additionalMarginTop: navbarHeight + topHeight
        });
    }
}

function dimmer(action, speed) {
    'use strict';

    var dimmer = jQuery('.dimmer');

    switch (action) {
        case 'open':
            dimmer.fadeIn(speed);
            break;
        case 'close':
            dimmer.fadeOut(speed);
            break;
    }
}