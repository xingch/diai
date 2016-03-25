<!--<?php
$met_foot_nav = methtml_footnav();//底部导航标签（次导航）
$met_foot_txt = metlabel_foot();//底部信息标签
echo <<<EOT
-->
<footer class="tem_footer">
	<section class="tem_inner">
		<div class="tem_footer_nav">{$met_foot_nav}</div>
		<div class="tem_footer_text">
		{$met_foot_txt}
		</div>
	</section>
</footer>
<script src="{$navurl}public/ui/v1/js/sea.js" type="text/javascript"></script>
<script type="text/javascript">

</script>
</body>
</html>
<!--
EOT;
?>-->