Ext.define('app.petcms4.util.Fecha', {
	extend: 'Ext.form.DateField',  
	alias: 'widget.fecha',
    width: 100, 
    format: 'd/m/Y',
    listeners: {
       scope: this,
         'render' : function(campo){
            if (this.muestraHoy){
              var dt = new Date();
              campo.setValue(dt);
            }
          }
    }
});