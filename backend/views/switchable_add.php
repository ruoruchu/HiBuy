<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>轮播图片</title>
    <meta name="keywords" content="hibuy" />
    <meta name="description" content="hibuy" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- basic styles -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->


    <!-- ace styles -->

    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/colorpicker.css" />
    <link rel="stylesheet" href="assets/css/colorbox.css" />


    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <style>

    </style>
</head>

<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    HiBuy后台管理系统
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
									<small>欢迎光临,</small>
									Jason
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="icon-cog"></i>
                                设置
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="icon-user"></i>
                                个人资料
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>


            <ul class="nav nav-list">
                <?php
                include_once 'nav.php';
                navMenu('navSwitchable', 1);
                ?>

            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="#">轮播图片管理</a>
                    </li>
                </ul><!-- .breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        轮播图片管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            添加轮播图片
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="x"> 图片名称 </label>
                                <div class="col-sm-7">
                                    <input id="x" name="switchable_name" type="text" class="input-small" />
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> 图片 </label>
                                <div class="col-sm-4">

                                    <div class="widget-box">
                                        <div class="widget-body">
                                            <input type="file" id="id-input-file-1" onchange="UpFileImage(this,'http://localhost/kingphp/hibuy/resource/index.php')"/>
                                            <div class="widget-main">
                                                <div class="row">
                                                    <ul class="ace-thumbnails" id="list_image_src" style="list-style: none">
                                                        <li style="list-style: none;border: none"><a id="pre_img_a" href="" title="Photo Title" data-rel="colorbox" ><img id="pre_img_img" src=""></a><div class="tools">
                                                                <a href="javascript:void(0);" onclick="DeleteImage(this);">
                                                                    <i class="icon-remove red"></i>
                                                                </a>
                                                            </div><input type="text" value="" name="switchable_img" hidden></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="x"> 出现次序 </label>
                                <div class="col-sm-7">
                                    <select name="order">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>


                                    </select>
                                </div>
                            </div>

                            <div class="space-4"></div>



                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="button" onclick="Submit();">
                                        <i class="icon-ok bigger-110"></i>
                                        Submit
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="icon-undo bigger-110"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>

                        </form>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->

        <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="icon-cog bigger-150"></i>
            </div>

            <div class="ace-settings-box" id="ace-settings-box">
                <div>
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="default" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; 选择皮肤</span>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                    <label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                    <label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                    <label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                    <label class="lbl" for="ace-settings-rtl">切换到左边</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                    <label class="lbl" for="ace-settings-add-container">
                        切换窄屏
                        <b></b>
                    </label>
                </div>
            </div>
        </div><!-- /#ace-settings-container -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script src="assets/js/jquery-2.0.3.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.10.2.min.js"></script>
<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->

<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>
<script src="assets/js/flot/jquery.flot.min.js"></script>
<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="assets/js/flot/jquery.flot.resize.min.js"></script>
<script src="assets/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/jquery.colorbox-min.js"></script>



<!-- ace scripts -->

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    jQuery(function($) {

        $('#id-input-file-1').ace_file_input({
            //style: 'well',
            no_file:'No File ...',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            //onchange:null,
            thumbnail:'large', //| true | large
            whitelist:'gif|png|jpg|jpeg',
            blacklist:'exe|php',
            allowExt: ['gif','png'],
            icon_remove: false,
            onchange:function () {
                alert('aaa');
            },
            before_change: function (files, dropped) {
                //alert('x');
                return true;
            }
            //
        });

        colorbox_params = {
            reposition:true,
            scalePhotos:true,
            scrolling:false,
            previous:'<i class="icon-arrow-left"></i>',
            next:'<i class="icon-arrow-right"></i>',
            close:'&times;',
            current:'{current} of {total}',
            maxWidth:'100%',
            maxHeight:'100%',
            onOpen:function(){
                document.body.style.overflow = 'hidden';
            },
            onClosed:function(){
                document.body.style.overflow = 'auto';
            },
            onComplete:function(){
                $.colorbox.resize();
            }
        };
        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);


    })
</script>
<div style="display:none"></div>
<script>
    function ajaxUpFile(url, data, callFun) {
        var xmlhttp;
        if(window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }else
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        xmlhttp.open('post', url, true);
        xmlhttp.send(data);
        xmlhttp.onreadystatechange=function () {
            if(xmlhttp.readyState==4 && xmlhttp.status==200) {
                callFun(xmlhttp.responseText);
            }
        }
    }
    function UpFileImage(elem, url) {
        var img = elem.files[0];
        var formData = new FormData();
        formData.append('myImg', img);
        ajaxUpFile(url, formData, function (respTest) {
            var respObj = JSON.parse(respTest);
            if(respObj.code != 1) {
                alert(respObj.msg);
                return;
            }
            var img_url = respObj.data.url;
            //document.getElementsByClassName('cboxElement')[0].getElementsByTagName('img')[0].src=img_url;
            //document.getElementsByClassName('cboxElement')[0].href = img_url;
            document.getElementById('pre_img_a').href=img_url;
            document.getElementById('pre_img_img').src=img_url;

            document.getElementsByName('switchable_img')[0].value = img_url;
        })
    }

    function Submit() {
        var switchable_name = document.getElementsByName('switchable_name')[0].value;
        var switchable_img =  document.getElementsByName('switchable_img')[0].value;
        var order = document.getElementsByName('order')[0].value;
        if(switchable_name=='' || switchable_img=='') {
            alert('请检测参数');
            return;
        }
        var formdata = new FormData();
        formdata.append('switchable_name',switchable_name);
        formdata.append('switchable_img',switchable_img);
        formdata.append('order',order);

        ajaxUpFile('?c=Switchable&m=addSwitchable', formdata, function (respText) {
            var respObj = JSON.parse(respText);
            if(respObj.code != 1) {
                alert(respObj.msg);
                return;
            }
            alert('添加成功');
        })
    }
</script>
</body>
</html>