<!--<?php
$zxImg4  = isset($news_class[4][0]) ? $news_class[4][0]['imgurl'] : '';
$zxImg5  = isset($news_class[5][0]) ? $news_class[5][0]['imgurl'] : '';
$zxImg99  = isset($news_class[99][0]) ? $news_class[99][0]['imgurl'] : '';
$zxList4 = $zxList5 = $zxList99 ='';
$more4 = $more5 = $more99 ='';
$more4  = isset($news_class[4][0]) ? $news_class[4][0]['class3_url'] : '';
$more5  = isset($news_class[5][0]) ? $news_class[5][0]['class3_url'] : '';
$more99  = isset($news_class[99][0]) ? $news_class[99][0]['class3_url'] : '';
for($key = 0; $key < 3; $key++){
    $new    = $news_class[4][$key];
    if ($key == 0){
        $zxList4    .= '<li>
                <a href="'.$new['url'].'" target="_blank" style="font-size:15px;font-weight:bold;">·&nbsp;'.$new['title'].'</a> <div class="yuedu">阅读（'.$new['hits'].'）</div>
                <p>'.$new['description'].'</p></li>';
    }else{
        $zxList4    .= '<li>
                <a href="'.$new['url'].'" target="_blank">·&nbsp;'.$new['title'].'</a> <div class="yuedu">阅读（'.$new['hits'].'）</div></li>';
    }
}

for($key = 0; $key < 3; $key++){
    $new    = $news_class[5][$key];
    if ($key == 0){
        $zxList5    .= '<li>
                <a href="'.$new['url'].'" target="_blank" style="font-size:15px;font-weight:bold;">·&nbsp;'.$new['title'].'</a> <div class="yuedu">阅读（'.$new['hits'].'）</div>
                <p>'.$new['description'].'</p></li>';
    }else{
        $zxList5    .= '<li>
                <a href="'.$new['url'].'" target="_blank">·&nbsp;'.$new['title'].'</a> <div class="yuedu">阅读（'.$new['hits'].'）</div></li>';
    }
}

for($key = 0; $key < 3; $key++){
    $new    = $news_class[99][$key];
    if ($key == 0){
        $zxList99    .= '<li>
                <a href="'.$new['url'].'" target="_blank" style="font-size:15px;font-weight:bold;">·&nbsp;'.$new['title'].'</a> <div class="yuedu">阅读（'.$new['hits'].'）</div>
                <p>'.$new['description'].'</p></li>';
    }else{
        $zxList99    .= '<li>
                <a href="'.$new['url'].'" target="_blank">·&nbsp;'.$new['title'].'</a> <div class="yuedu">阅读（'.$new['hits'].'）</div></li>';
    }
}
echo <<<EOT
-->
<section class="tem_zx_title">
	<div class="tem_inner">
        <div>您的位置：<a href="{$index_url}" title="{$lang_home}">{$lang_home}</a> &gt; {$nav_x[name]}</div>
    </div>
</section>
    
<section>
	<div class="tem_inner tem_zx_plan">
        <div class="tem_zx_list_title">
            <div class="tem_zx_list_titler tem_zx_list_titler4"></div>
            <div class="tem_zx_list_titlel tem_zx_list_titlel4">
            <a href="{$more4}" target="_blank">
            <div class="tem_zx_list_title_more"></div>
            </a>
            </div>
        </div>
        <div class="tem_zx_list_ad">
            <img src="{$zxImg4}" width='205' height="175" />
        </div>
        <ul class="tem_zx_list">
            {$zxList4}
        </ul>
    </div>
</section>
                
<section>
	<div class="tem_inner tem_zx_plan">
        <div class="tem_zx_list_title">
            <div class="tem_zx_list_titler tem_zx_list_titler5"></div>
            <div class="tem_zx_list_titlel tem_zx_list_titlel5">
            <a href="{$more5}" target="_blank">
            <div class="tem_zx_list_title_more"></div>
            </a>
            </div>
        </div>
        <div class="tem_zx_list_ad">
            <img src="{$zxImg5}" width='205' height="175" />
        </div>
        <ul class="tem_zx_list">
            {$zxList5}
        </ul>
    </div>
</section>
                
<section>
	<div class="tem_inner tem_zx_plan">
        <div class="tem_zx_list_title">
            <div class="tem_zx_list_titler tem_zx_list_titler99"></div>
            <div class="tem_zx_list_titlel tem_zx_list_titlel99">
            <a href="{$more99}" target="_blank">
            <div class="tem_zx_list_title_more"></div>
            </a>
            </div>
        </div>
        <div class="tem_zx_list_ad">
            <img src="{$zxImg99}" width='205' height="175" />
        </div>
        <ul class="tem_zx_list">
            {$zxList99}
        </ul>
    </div>
</section>
                
<section>
	<div class="tem_inner" style="height:100px;">
    </div>
</section>
<!--
EOT;
?>