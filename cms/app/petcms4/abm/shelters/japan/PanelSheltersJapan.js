Ext.define('app.petcms4.abm.shelters.japan.PanelSheltersJapan', {
  extend: 'Ext.panel.Panel',
  layout: 'border',
  
  constructor: function(cnfg) {
      this.callParent(arguments);
      
      this.panForm=Ext.create('app.petcms4.abm.shelters.japan.FormSheltersJapan', {
        id: 'formSheltersJapanId',	
        region: 'center'
      });     
      
      this.panBusqueda=Ext.create('app.petcms4.abm.shelters.japan.BusquedaSheltersJapan', {
        id: 'busquedaSheltersJapanId', 	
        region: 'west',
        width: 250
      });   
      
      
      this.panSuperior= new Ext.Container({
          layout: 'border',
          region: 'north',
          height: 450,
          items: [this.panForm, this.panBusqueda]
      });   
      
      this.panGrilla = Ext.create('app.petcms4.abm.shelters.japan.GrillaSheltersJapan', {
        id: 'grillaSheltersJapanId',	
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