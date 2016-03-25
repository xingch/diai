<!--<?php
require_once template('head');
$classid    = $news['class2'];
$className  = $classEName   = '';
switch($classid){
    case 4:
        $className  = '品牌动态';
        $classEName = 'BRAND';
        break;
    case 5:
        $className  = '行业新闻';
        $classEName = 'NEWS';
        break;
    case 99:
        $className  = '睡眠百科';
        $classEName = 'SLEEPING ENCYCLOPEDIA';
        break;
}

echo <<<EOT
-->
<section class="tem_zx_title tem_zx_class{$classid}">
	<div class="tem_inner">
        <div>您的位置：首页->资讯中心->{$className}</div>
    </div>
</section>
<section>
	<div class="tem_inner tem_zx_classname">
       {$classEName}
    </div>
</section>
<section>
	<div class="tem_inner tem_zx_article">
        <div class="tem_zx_img">
            <img class="bdsharebuttonbox" data-bdPic="{$news['imgurl']}" src="{$news['imgurl']}" width="515" height="350" />
        </div>
        <h1>{$news['title']} </h1>
        <div class="tem_zx_content">{$news[content]}</div>
        <div class="tem_zx_fx">{$met_tools_code}</div>
    </div>
</section>
<!--
EOT;
require_once template('gap');
require_once template('foot');
?>
