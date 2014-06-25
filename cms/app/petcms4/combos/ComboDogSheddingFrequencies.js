Ext.define('app.petcms4.combos.ComboDogSheddingFrequencies', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: false,
	  alias: 'widget.comboDogSheddingFrequencies',
	  
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['id','name'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/dogSheddingFrequencies.php/selecciona',
		       reader: {
		          type:'json',
		          root: 'data'
		       }
		    },
	  }),

	  displayField: 'name', 
	  valueField: 'id'
});