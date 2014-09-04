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
  idUltimoPanel=componente.getId();
}

var panelMenuAcordeon1=Ext.create('app.petcms4.PanelMenuAcordeon', {
    id: 'panelMenuAcordeon1',
    title: 'Breeds'
});


panelMenuAcordeon1.store.add({
	 columnaUnica: ['dachs.jpg', 'Dog Breeds', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.dogbreeds.PanelDogBreeds', {
			frame: true,
            id: 'panelDogBreedsId'	
         });
         muestraEnPanel(panel);
     }]
});


var panelShelters=Ext.create('app.petcms4.PanelMenuAcordeon', {
    id: 'panelShelters',
    title: 'Shelters/country'
});

panelShelters.store.add({
	 columnaUnica: ['icono_mapa_usa_menu.png', 'Shelters USA', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.usa.PanelSheltersUsa', {
		   frame: true,
           id: 'panelSheltersUsaId'	
        });
        muestraEnPanel(panel);
    }]
});


panelShelters.store.add({
	 columnaUnica: ['icono_mapa_japan_menu.jpg', 'Shelters Japan', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.japan.PanelSheltersJapan', {
		   frame: true,
          id: 'panelSheltersJapanId'	
       });
       muestraEnPanel(panel);
   }]
});

panelShelters.store.add({
	 columnaUnica: ['icono_mapa_uk_menu.png', 'Shelters UK', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.uk.PanelSheltersUk', {
		   frame: true,
         id: 'panelSheltersUkId'	
      });
      muestraEnPanel(panel);
  }]
});

panelShelters.store.add({
	 columnaUnica: ['icono_mapa_china_menu.jpg', 'Shelters China', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.china.PanelSheltersChina', {
		   frame: true,
        id: 'panelSheltersChinaId'	
     });
     muestraEnPanel(panel);
 }]
});


panelShelters.store.add({
	 columnaUnica: ['icono_mapa_canada_menu.jpg', 'Shelters Canada', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.canada.PanelSheltersCanada', {
		   frame: true,
       id: 'panelSheltersCanadaId'	
    });
    muestraEnPanel(panel);
}]
});

panelShelters.store.add({
	 columnaUnica: ['icono_mapa_india_menu.jpg', 'Shelters India', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.shelters.india.PanelSheltersIndia', {
		   frame: true,
      id: 'panelSheltersIndiaId'	
   });
   muestraEnPanel(panel);
}]
});

var panelFrontPage=Ext.create('app.petcms4.PanelMenuAcordeon', {
    id: 'panelFrontPage',
    title: 'Front Page'
});

panelFrontPage.store.add({
	 columnaUnica: ['news.jpg', 'News', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.news.PanelNews', {
		   frame: true,
           id: 'panelNewsId'	
        });
        muestraEnPanel(panel);
    }]
});

panelFrontPage.store.add({
	 columnaUnica: ['videos.gif', 'Videos', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.abm.videos.PanelVideos', {
		   frame: true,
          id: 'panelNewsId'	
       });
       muestraEnPanel(panel);
   }]
});

panelFrontPage.store.add({
	 columnaUnica: ['front-page.png', 'Home Page', 
	   function(){
		 quitaDePanel();
		 var panel=Ext.create('app.petcms4.FormFrontPage', {
		   frame: true,
         id: 'panelHomePageId'	
      });
      muestraEnPanel(panel);
  }]
});



Ext.define('app.petcms4.MenuAcordeon', {
	extend: 'Ext.Panel',
	config:{
	    layout: 'accordion'
    },
    items:[
           panelMenuAcordeon1,
           panelShelters,
           panelFrontPage
    ],
});