Ext.define('app.petcms4.abm.news.PanelNews', {
  extend: 'Ext.panel.Panel',
  layout: 'border',
  
  constructor: function(cnfg) {
      this.callParent(arguments);
      
      this.panForm=Ext.create('app.petcms4.abm.news.FormNews', {
        id: 'formNewsId',	
        region: 'center'
      });     
      
      this.panBusqueda=Ext.create('app.petcms4.abm.news.BusquedaNews', {
        id: 'busquedaNewsId', 	
        //height: 100,
      });   
      
      var panLateral=Ext.create('Ext.panel.Panel', {
    	region: 'west',
    	width: 250,
    	layout: {
    	    type: 'vbox',
    	    align : 'stretch',
    	    pack  : 'start',
    	},
    	items: [
    	    this.panBusqueda,   
    	    //{xtype : 'image', id : 'imagePhotoBreed', width: 240, height: 180},
    	    //{html:"<iframe width='250' src='http://www.youtube.com/embed/XGSy3_Czz8k'></iframe>", flex:2}
    	    
    	]
      });
      
      this.panSuperior= new Ext.Container({
          layout: 'border',
          region: 'north',
          height: 450,
          items: [this.panForm, panLateral]
      });   
      
      this.panGrilla = Ext.create('app.petcms4.abm.news.GrillaNews', {
        id: 'grillaNewsId',	
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