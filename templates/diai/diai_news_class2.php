<!--<?php
$classid    = intval($_GET['class2']);
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

foreach($news_list as $new){
    $lists    .= '<li>
            <div class="tem_zx_class_listl"><img src="'.$new['imgurl'].'" width="205" height="160" /></div>
            <div class="tem_zx_class_listr">
            <a href="'.$new['url'].'" target="_blank" style="font-size:15px;">·&nbsp;'.$new['title'].'</a> <div class="yuedu">阅读（'.$new['hits'].'）</div>
            <p>'.$new['description'].'</p><div></li>';
}
echo <<<EOT
-->
<section class="tem_zx_title tem_zx_class{$classid}">
	<div class="tem_inner">
        <div>您的位置：<a href="{$index_url}" title="{$lang_home}">{$lang_home}</a> &gt; {$nav_x[name]}</div>
    </div>
</section>
<section>
	<div class="tem_inner tem_zx_classname">
       {$classEName}
    </div>
</section>
<section>
	<div class="tem_inner">
        <ul class="tem_zx_class_list">
            {$lists}
        </ul>
    </div>
</section>
<section>
	<div class="tem_inner tem_zx_class_page">
        {$page_list}
    </div>
</section>
<!--
EOT;
?>
