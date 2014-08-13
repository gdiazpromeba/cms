Ext.define('app.petcms4.PanelMenuAcordeon', {
	extend: 'Ext.grid.Panel',  
	alias: 'widget.panelMenuAcordeon',
    layout: 'fit',
    border: true,
    hideHeaders: true,
    viewConfig: {
        stripeRows: true,
        forceFit: true,
        emptyText:'No Records to display'
    }, 	
    initComponent: function() {

        this.store = new Ext.data.SimpleStore({
            fields:['columnaUnica'],
//            data:  [
//             [['dachs.jpg', 'Razas', ''],[]]
//            ]
        }),
        this.columns = [
          { flex: 1, align: 'center',  renderer: this.funcionMuestra}
        ];

        
    
        

        this.callParent(arguments);
    },
    
    listeners : {
            itemclick: function( gridView, record, htmlElement, index, ev, evOpts) {
            	var funcion=record.data.columnaUnica[2];
            	funcion.call();
            	return true;
            }
    },
    
    funcionMuestra : function(value, metaData, record, row, col, store, gridView){
    	var imagen;
    	var titulo;
    	imagen=record.data.columnaUnica[0];
    	titulo=record.data.columnaUnica[1];
        html="<div style='text-align:center' class='celdaMenuLateral'>";
        if (imagen!=undefined){
          html+=" <img style='height:50px;display:block;margin-left:auto;margin-right:auto;' class='imagenMenuLateral' src='" + Global.dirAplicacion + '/resources/images/' + imagen + "'/>";
          html+=" <div class='etiquetaMenuLateral'>" + titulo +  "</div>";
        }
        html+="</div>";
        return html;    	
    }
});
