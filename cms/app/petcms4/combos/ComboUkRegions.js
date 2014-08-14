Ext.define('petcms4.iu.combos.ComboUkRegions', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboUkRegions',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['name'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/ukRegions.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'name', 
  valueField: 'name',
});