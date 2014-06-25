Ext.define('app.petcms4.combos.ComboDogSheddingAmounts', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: false,
	  alias: 'widget.comboDogSheddingAmounts',
	  
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['id','name'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/dogSheddingAmounts.php/selecciona',
		       reader: {
		          type:'json',
		          root: 'data'
		       }
		    },
	  }),

	  displayField: 'name', 
	  valueField: 'id'
});