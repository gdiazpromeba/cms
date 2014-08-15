Ext.define('petcms4.iu.combos.ComboChinaProvinces', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboChinaProvinces',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['id','name'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/chinaProvinces.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'name', 
  valueField: 'id',
});