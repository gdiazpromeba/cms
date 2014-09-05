Ext.define('petcms4.combos.ComboVideos', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: true,
	  alias: 'widget.comboVideos',
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['videoId','videoTitle', 'videoUrl'],
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
	  minchars: 2,
	  typeAhead: true,
	  forceSelection: true,
	  queryParam: 'videoTitle',
	  queryMode: 'remote'
	});