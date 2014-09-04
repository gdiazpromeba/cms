Ext.define('petcms4.combos.ComboNews', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: true,
	  alias: 'widget.comboNews',
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['newsId','newsTitle'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/news.php/selecciona',
		       reader: {
		          type:'json',
		          root: 'data'
		       }
		    },
	  }),
	  displayField: 'newsTitle', 
	  valueField: 'newsId',
	  minchars: 2,
	  typeAhead: true,
	  forceSelection: true,
	  queryParam: 'newsTitle',
	  queryMode: 'remote'
	});