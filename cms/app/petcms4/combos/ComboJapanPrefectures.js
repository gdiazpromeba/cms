Ext.define('petcms4.iu.combos.ComboJapanPrefectures', {
  extend: 'Ext.form.field.ComboBox',
  editable: false,
  alias: 'widget.comboJapanPrefectures',
  
  store: Ext.create('Ext.data.Store', {
	    autoLoad: true,
	    fields: ['id','name'],
	    proxy: {
	       type: 'ajax',
	       url: Global.dirAplicacion + '/svc/conector/japanPrefectures.php/selecciona',
	       reader: {
	          type:'json',
	          root: 'data'
	       }
	    },
  }),

  displayField: 'name', 
  valueField: 'id',
});