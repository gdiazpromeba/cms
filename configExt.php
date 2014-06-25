
<script type="text/javascript">
<?php
if ($GLOBALS['debug']){
?>
Ext.define('Global', {
	singleton: true,
	dirAplicacion: '/petzyngacms'
});
<?php	
}else{
?>
Ext.define('Global', {
	singleton: true,
	dirAplicacion: '/qa/petzingacms'
});
<?php	
}
?>
</script>