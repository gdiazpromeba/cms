Ext.define('app.petcms4.combos.ComboDogSizes', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: false,
	  alias: 'widget.comboDogSizes',
	  
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['id','name'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/dogSizes.php/selecciona',
		       reader: {
		          type:'json',
		          root: 'data'
		       }
		    },
	  }),
      submitValue: true,
      forceSelection: true,
	  displayField: 'name', 
	  valueField: 'id'
});