Ext.define('petcms4.iu.combos.ComboUkStatistical', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboUkStatistical',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['name'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/ukRegions.php/seleccionaStatistical',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'name', 
  valueField: 'name',
});