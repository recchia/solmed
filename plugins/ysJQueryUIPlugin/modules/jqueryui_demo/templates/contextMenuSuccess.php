<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('ysJQueryUICore'); ?>
<?php use_helper('ysJQueryUIMenu'); ?>
<?php use_helper('ysUtil') ?>

<script type="text/javascript">
    JQuery('.fg-button').hover(
    		function(){ JQuery(this).removeClass('ui-state-default').addClass('ui-state-focus'); },
    		function(){ JQuery(this).removeClass('ui-state-focus').addClass('ui-state-default'); }
    	);
    JQuery('#flat').menu({
			content: JQuery('#flat').next().html(),
			showSpeed: 400
	});
</script>

<a tabindex="0" href="#search-engines" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat"><span class="ui-icon ui-icon-triangle-1-s"></span>flat menu</a>
<div id="search-engines" class="hidden">
<ul>
	<li><a href="#">Google</a></li>
	<li><a href="#">Yahoo</a></li>
	<li><a href="#">MSN</a></li>
	<li><a href="#">Ask</a></li>
	<li><a href="#">AOL</a></li>
</ul>
</div>

