Ext.define('petcms4.iu.combos.ComboCanadaProvinces', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboCanadaProvinces',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['id','name'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/canadaProvinces.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'name', 
  valueField: 'id',
});