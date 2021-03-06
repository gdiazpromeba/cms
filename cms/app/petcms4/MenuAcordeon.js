


var storeBreeds = Ext.create('Ext.data.ArrayStore', {
    autoSync: true,
    fields: [
             {name: 'image'},
             {name: 'caption'},
             {name: 'panelClass'},
             {name: 'panelId'}
    ],
    data:[
        { image : 'dachs.jpg',        caption : 'Dog Breeds',     panelClass: 'app.petcms4.abm.dogbreeds.PanelDogBreeds',   panelId: 'panelDogBreedsId' },
        { image : 'cat-breeds.png',        caption : 'Cat Breeds',     panelClass: 'app.petcms4.abm.catbreeds.PanelCatBreeds',   panelId: 'panelCatBreedsId' },
        { image : 'petForums.jpg',       caption : 'Pet forums',     panelClass: 'app.petcms4.abm.petforums.PanelPetForums',   panelId: 'panelPetForumsId' },
        
    ],
});

var panelBreeds=Ext.create('app.petcms4.PanelGrillaIconos', {
    id: 'panelBreedsId',
    title: 'CMS',
    store: storeBreeds
});


var storeShelters = Ext.create('Ext.data.ArrayStore', {
    autoSync: true,
    fields: [
             {name: 'image'},
             {name: 'caption'},
             {name: 'panelClass'},
             {name: 'panelId'}
    ],
    data:[
        { image : 'icono_mapa_usa_menu.png',     caption : 'Shelters USA',     panelClass: 'app.petcms4.abm.shelters.usa.PanelSheltersUsa',        panelId: 'panelSheltersUsaId' },
        { image : 'icono_mapa_japan_menu.jpg',   caption : 'Shelters Japan',   panelClass: 'app.petcms4.abm.shelters.japan.PanelSheltersJapan',    panelId: 'panelSheltersJapanId' },
        { image : 'icono_mapa_uk_menu.png',      caption : 'Shelters UK',      panelClass: 'app.petcms4.abm.shelters.uk.PanelSheltersUk',          panelId: 'panelSheltersUkId' },
        { image : 'icono_mapa_china_menu.jpg',   caption : 'Shelters China',   panelClass: 'app.petcms4.abm.shelters.china.PanelSheltersChina',    panelId: 'panelSheltersChinaId' },
        { image : 'icono_mapa_canada_menu.jpg',  caption : 'Shelters Canada',  panelClass: 'app.petcms4.abm.shelters.canada.PanelSheltersCanada',  panelId: 'panelSheltersCanadaId' },
        { image : 'icono_mapa_india_menu.jpg',   caption : 'Shelters India',   panelClass: 'app.petcms4.abm.shelters.india.PanelSheltersIndia',    panelId: 'panelSheltersIndiaId' },
    ],
});

var panelShelters=Ext.create('app.petcms4.PanelGrillaIconos', {
    id: 'panelSheltersId',
    title: 'Dog Shelters',
    store: storeShelters
});


var storeBreeders = Ext.create('Ext.data.ArrayStore', {
    autoSync: true,
    fields: [
             {name: 'image'},
             {name: 'caption'},
             {name: 'panelClass'},
             {name: 'panelId'}
    ],
    data:[
        //{ image : 'usa_map_menu_outline.jpeg',  caption : 'Breeders USA',  panelClass: 'app.petcms4.abm.breeders.usa.PanelBreedersUsa',   panelId: 'panelBreedersUsaId' },
        { image : 'usa_map_menu_outline.jpeg',  caption : 'Breeders USA',  panelClass: 'app.petcms4.abm.breeders.usa.PanelBreedersUsa',   panelId: 'panelBreedersUsaId' },
        { image : 'canada_map_menu_outline.png',  caption : 'Breeders Canada',  panelClass: 'app.petcms4.abm.breeders.canada.PanelBreedersCanada',   panelId: 'panelBreedersCanadaId' },
        { image : 'uk_map_menu_outline.jpg',  caption : 'Breeders UK',  panelClass: 'app.petcms4.abm.breeders.uk.PanelBreedersUk',   panelId: 'panelBreedersUkId' },        
        { image : 'china_map_menu_outline.gif',  caption : 'Breeders China',  panelClass: 'app.petcms4.abm.breeders.china.PanelBreedersChina',   panelId: 'panelBreedersChinaId' },
    ],
});

var panelBreeders=Ext.create('app.petcms4.PanelGrillaIconos', {
    id: 'panelBreedersId',
    title: 'Breeders',
    store: storeBreeders
});




var storeFp = Ext.create('Ext.data.ArrayStore', {
    autoSync: true,
    fields: [
             {name: 'image'},
             {name: 'caption'},
             {name: 'panelClass'},
             {name: 'panelId'}
    ],
    data:[
        { image : 'videos.gif',        caption : 'Videos',        panelClass: 'app.petcms4.abm.videos.PanelVideos',   panelId: 'panelVideoId' },
        { image : 'news.jpg',          caption : 'News',          panelClass: 'app.petcms4.abm.news.PanelNews',       panelId: 'panelNewsId' },
        { image : 'front-page.png',    caption : 'Front Page',    panelClass: 'app.petcms4.frontpage.FormFrontPage',  panelId: 'panelHomeId' },
    ],
});


var panelFrontPage=Ext.create('app.petcms4.PanelGrillaIconos', {
    id: 'panelFrontPageId',
    title: 'Front Page',
    store: storeFp
});


var storeRecursos = Ext.create('Ext.data.ArrayStore', {
    autoSync: true,
    fields: [
             {name: 'image'},
             {name: 'caption'},
             {name: 'panelClass'},
             {name: 'panelId'}
    ],
    data:[
        { image : 'recursos_textuales.jpg',        caption : 'Text resources',        panelClass: 'app.petcms4.abm.resources.PanelResources',   panelId: 'panelTextResourcesId' },
    ],
});

var panelRecursosEstaticos=Ext.create('app.petcms4.PanelGrillaIconos', {
    id: 'panelRecursosEstaticosId',
    title: 'Resources',
    store: storeRecursos
});




Ext.define('app.petcms4.MenuAcordeon', {
	extend: 'Ext.Panel',
	config:{
	    layout: 'accordion'
    },
    items:[
           panelBreeds,
           panelShelters,
           panelBreeders,
           panelFrontPage,
           panelRecursosEstaticos
    ],
});