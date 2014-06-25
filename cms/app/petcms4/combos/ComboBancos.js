Ext.define('petcms4.iu.combos.ComboBancos', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboBancos',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['bancoId','bancoNombre'],
	    proxy: {
	       type: 'ajax',
	       url: '/produccion/svc/conector/bancos.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'bancoNombre', 
  valueField: 'bancoId',
});