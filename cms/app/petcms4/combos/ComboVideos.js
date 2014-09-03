Ext.define('petcms4.combos.ComboVideos', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: false,
	  alias: 'widget.comboVideos',
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['id','title'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/videos.php/selecciona',
		       reader: {
		          type:'json',
		          root: 'data'
		       }
		    },
	  }),
	  displayField: 'title', 
	  valueField: 'id',
	  minchars: 2,
	  hideTrigger: true,
	  pageSize: 15, 
	  typeAhead: false,
	  forceSelection: true
	});