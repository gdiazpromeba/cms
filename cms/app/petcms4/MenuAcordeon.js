var idUltimoPanel;

function quitaDePanel(){
	var panelCentral=Ext.getCmp('panelCentral');
    if (idUltimoPanel!=null){
        var up=panelCentral.down('#' + idUltimoPanel);
        if (up!=null){
            panelCentral.remove(up, true);
        }
        idUltimoPanel=null;
    }
}



function muestraEnPanel(componente){
  var panelCentral=Ext.getCmp('panelCentral');
  panelCentral.add(componente);
//  panelCentral.doLayout();
//  Ext.Msg.alert('Status title', 'layout');  
//  panelCentral.setVisible(true);
//  Ext.Msg.alert('Status title', 'visible');


  idUltimoPanel=componente.getId();
}

var panelMenuAcordeon1=Ext.create('app.petcms4.PanelMenuAcordeon', {
    id: 'panelMenuAcordeon1'
});


panelMenuAcordeon1.store.add({
	 columnaUnica: ['dachs.jpg', 'Dog Breeds', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.dogbreeds.PanelDogBreeds', {
			frame: true,
            id: 'panelDogBreedsId'	
         });
//		 var panel=Ext.create('Ext.panel.Panel', {id: 'hullo', title: 'Hola'});
         muestraEnPanel(panel);
     }]
});


panelMenuAcordeon1.store.add({
	 columnaUnica: ['icono_mapa_usa_menu.png', 'Shelters USA', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.usa.PanelSheltersUsa', {
		   frame: true,
           id: 'panelSheltersUsaId'	
        });
//		 var panel=Ext.create('Ext.panel.Panel', {id: 'hullo', title: 'Hola'});
        muestraEnPanel(panel);
    }]
});


panelMenuAcordeon1.store.add({
	 columnaUnica: ['icono_mapa_japan_menu.jpg', 'Shelters Japan', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.japan.PanelSheltersJapan', {
		   frame: true,
          id: 'panelSheltersJapanId'	
       });
//		 var panel=Ext.create('Ext.panel.Panel', {id: 'hullo', title: 'Hola'});
       muestraEnPanel(panel);
   }]
});


Ext.define('app.petcms4.MenuAcordeon', {
	extend: 'Ext.Panel',
	config:{
	    layout: 'accordion',
	    title: 'Hola'
    },
    items:[panelMenuAcordeon1],
    /*
    listeners:{
    	render: function(){
   		  quitaDePanel();
		   var panel=Ext.create('app.petcms4.abm.dogbreeds.PanelDogBreeds', {
			frame: true,
            id: 'panelDogBreedsId'	
           });
           muestraEnPanel(panel);
           //panelMenuAcordeon1.disable();
    	}
    }
    */
});