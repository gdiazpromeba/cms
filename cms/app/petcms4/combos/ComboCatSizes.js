Ext.define('app.petcms4.combos.ComboCatSizes', {
	  extend: 'Ext.form.field.ComboBox',
	  editable: false,
	  alias: 'widget.comboCatSizes',
	  
	  store: Ext.create('Ext.data.Store', {
		    autoLoad: true,
		    fields: ['id','name'],
		    proxy: {
		       type: 'ajax',
		       url: Global.dirAplicacion + '/svc/conector/catSizes.php/selecciona',
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