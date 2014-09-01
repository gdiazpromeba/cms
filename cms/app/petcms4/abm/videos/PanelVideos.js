Ext.define('app.petcms4.abm.videos.PanelVideos', {
  extend: 'Ext.panel.Panel',
  layout: 'border',
  
  constructor: function(cnfg) {
      this.callParent(arguments);
      
      this.panForm=Ext.create('app.petcms4.abm.videos.FormVideos', {
        id: 'formVideosId',	
        region: 'center'
      });     
      
      this.panBusqueda=Ext.create('app.petcms4.abm.videos.BusquedaVideos', {
        id: 'busquedaVideosId', 	
        //height: 100,
      });   
      
      var panLateral=Ext.create('Ext.panel.Panel', {
    	region: 'west',
    	width: 500,
    	layout: {
    	    type: 'vbox',
    	    align : 'stretch',
    	    pack  : 'start',
    	},
    	items: [
    	    this.panBusqueda,   
    	    {xtype: 'marcovideo',  name: 'videoPreview', itemId: 'videoPreview',  id: 'videoPreview', flex: 2},
    	]
      });
      
      this.panSuperior= new Ext.Container({
          layout: 'border',
          region: 'north',
          height: 450,
          items: [this.panForm, panLateral]
      });   
      
      this.panGrilla = Ext.create('app.petcms4.abm.videos.GrillaVideos', {
        id: 'grillaVideosId',	
        region: 'center',
//        height : 150,
      });  
      
      this.add(this.panSuperior);
      this.add( this.panGrilla);      
      abmIza(this.panGrilla, this.panForm, this.panBusqueda);
      
      this.initConfig(cnfg);
  },
  
  config: {
        panForm: {},
        panBusqueda: {},
        panGrilla : {},
        panSuperior : {}
  }, 
});