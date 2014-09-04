Ext.define('petcms4.combos.ComboVideos', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: true,
	  alias: 'widget.comboVideos',
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['videoId','videoTitle'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/videos.php/selecciona',
		       reader: {
		          type:'json',
		          root: 'data'
		       }
		    },
	  }),
	  displayField: 'videoTitle', 
	  valueField: 'videoId',
	  minchars: 3,
	  hideTrigger: true,
	  pageSize: 15, 
	  //typeAhead: false,
	  forceSelection: true,
	  queryParam: 'videoTitle',
	  queryMode: 'remote'
	});