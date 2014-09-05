Ext.define('app.petcms4.PanelGrillaIconos', {
	extend: 'Ext.grid.Panel',  
	alias: 'widget.panelFrontPage',
    layout: 'fit',
    border: true,
    hideHeaders: true,
    collapsible: true,
    frame: true,
    columns: [
       { header: 'Icon', flex: 1,  dataIndex: 'image', renderer: function(value, p, record){
    	    var rec=record.raw;
            var html="<div style='text-align:center' class='celdaMenuLateral'>";
            html+=" <img style='height:50px;display:block;margin-left:auto;margin-right:auto;' class='imagenMenuLateral' src='" + Global.dirAplicacion + '/resources/images/' + rec.image + "'/>";
            html+=" <div class='etiquetaMenuLateral'>" + rec.caption +  "</div>";
            html+="</div>";    	    
    	    return html;
          },
       }
     ],

     listeners : {
       itemclick: function( gridView, record, htmlElement, index, ev, evOpts) {
    	   var panelClase=record.raw.panelClass;
    	   var panelId=record.raw.panelId;
    	   
    	   var panelCentral=Ext.getCmp('panelCentral');
    	   var panelContenido=panelCentral.down('#' + panelId);
    	   
    	   if (panelContenido==null){
    		   panelContenido=Ext.create(panelClase, {
    			     frame: true,
    	             id: panelId	
    	           });  
    		   panelCentral.add(panelContenido);
    	   }
    	   var index = panelCentral.items.indexOf(panelContenido);
    	   panelCentral.getLayout().setActiveItem(index);
	       return true;
        }
     }

});
