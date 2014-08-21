Ext.define('petcms4.iu.combos.ComboIndiaStates', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboIndiaStates',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['id','name'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/indiaStates.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'name', 
  valueField: 'id',
});