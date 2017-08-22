<?php

// 控制台
function navControl($act=0)
{
    $liFormat = '<li class="%s">
							<a href="/kingphp/hibuy/backend/?c=Index&m=showIndex">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 控制台 </span>
							</a>
						</li>';
    if($act == 1) {
        $li = sprintf($liFormat, 'active');
    }
    else
        $li = sprintf($liFormat, '');
    return $li;
}

// 颜色管理
function navColor($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Color&m=showAddColor" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 颜色管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Color&m=showAddColor">
										<i class="icon-double-angle-right"></i>
										添加商品颜色
									</a>
								</li>

								<li class="%s">
									<a href="?c=Color&m=showListColor">
										<i class="icon-double-angle-right"></i>
										商品颜色列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 尺寸管理
function navSize($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Size&m=showAddSize" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 尺寸管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Size&m=showAddSize">
										<i class="icon-double-angle-right"></i>
										添加商品尺寸
									</a>
								</li>

								<li class="%s">
									<a href="?c=Size&m=showListSize">
										<i class="icon-double-angle-right"></i>
										商品尺寸列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 商品类别
function navProductCategory($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=ProductCategory&m=showAddProductCategory" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 商品分类管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=ProductCategory&m=showAddProductCategory">
										<i class="icon-double-angle-right"></i>
										添加商品分类
									</a>
								</li>

								<li class="%s">
									<a href="?c=ProductCategory&m=showListProductCatagory">
										<i class="icon-double-angle-right"></i>
										商品分类列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 潮流搭配
function navDress($act=0){
    $liFormat = '<li class="%s">
							<a href="?c=Dress&m=showAddDress" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 潮流搭配 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li class="%s">
									<a href="?c=Dress&m=showAddDress">
										<i class="icon-double-angle-right"></i>
										添加潮流搭配
									</a>
								</li>	
								<li class="%s">
									<a href="?c=Dress&m=showListDress">
										<i class="icon-double-angle-right"></i>
										潮流搭配列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 流行类别
function navPopularCategory($act=0){
    $liFormat = '<li class="%s">
							<a href="?c=PopularCategory&m=showAddPopularCategory" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 流行类别 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li class="%s">
									<a href="?c=PopularCategory&m=showAddPopularCategory">
										<i class="icon-double-angle-right"></i>
										添加流行类别
									</a>
								</li>	
								<li class="%s">
									<a href="?c=PopularCategory&m=showListPopularCategory">
										<i class="icon-double-angle-right"></i>
										流行类别列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 商品样式
function navProductStyle($act=0){
    $liFormat = '<li class="%s">
							<a href="?c=ProductStyle&m=showAddProductStyle" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 商品样式 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li class="%s">
									<a href="?c=ProductStyle&m=showAddProductStyle">
										<i class="icon-double-angle-right"></i>
										添加商品样式
									</a>
								</li>	
								<li class="%s">
									<a href="?c=ProductStyle&m=showListProductStyle">
										<i class="icon-double-angle-right"></i>
										商品样式列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 商品管理
function navProduct($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Product&m=showAddProduct" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 商品管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Product&m=showAddProduct">
										<i class="icon-double-angle-right"></i>
										添加商品
									</a>
								</li>

								<li class="%s">
									<a href="?c=Product&m=showListProduct">
										<i class="icon-double-angle-right"></i>
										商品列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 轮播图片
function navSwitchable($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Switchable&m=showAddSwitchable" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 轮播图片 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Switchable&m=showAddSwitchable">
										<i class="icon-double-angle-right"></i>
										添加轮播图片
									</a>
								</li>

								<li class="%s">
									<a href="?c=Switchable&m=showListSwitchable">
										<i class="icon-double-angle-right"></i>
										轮播图片列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 形状管理
function navShape($act=0){
    $liFormat = '<li class="%s">
							<a href="?c=Shape&m=showAddShape" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 形状管理 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li class="%s">
									<a href="?c=Shape&m=showAddShape">
										<i class="icon-double-angle-right"></i>
										添加形状
									</a>
								</li>	
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

//目录
function navMenu($page, $active)
{
    $menu = [
        'navControl',
        'navColor',
        'navSize',
        'navProductCategory',
        'navDress',
        'navPopularCategory',
        'navProductStyle',
        'navProduct',
        'navSwitchable',
        'navShape',

    ];
    foreach ($menu as $m) {
        if($m == $page)
            echo $m($active);
        else
            echo $m(0);
    }
}