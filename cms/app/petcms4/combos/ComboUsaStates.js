Ext.define('petcms4.iu.combos.ComboUsaStates', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboUsaStates',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['id','name'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/usaStates.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'name', 
  valueField: 'id',
});