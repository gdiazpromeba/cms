
<script type="text/javascript">
<?php
if ($GLOBALS['debug']){
?>
Ext.define('Global', {
	singleton: true,
	dirAplicacion: '/petzynga'
});
<?php	
}else{
?>
Ext.define('Global', {
	singleton: true,
	dirAplicacion: '/qa/qacms'
});
<?php	
}
?>
</script>