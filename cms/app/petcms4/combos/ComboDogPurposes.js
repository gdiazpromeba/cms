Ext.define('app.petcms4.combos.ComboDogPurposes', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: false,
	  alias: 'widget.comboDogPurposes',
	  
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['id','name'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/dogPurposes.php/selecciona',
		       reader: {
		          type:'json',
		          root: 'data'
		       }
		    },
	  }),

	  displayField: 'name', 
	  valueField: 'id'
});