Ext.define('app.petcms4.frontpage.FormFrontPage', {
    extend: 'Ext.form.Panel',
	defaultType: 'textfield',
    frame: true,
    items:[
      {fieldLabel: 'Video 1', xtype: 'comboVideos', name: 'comboVideos1', itemId: 'comboVideos1', width: 500},
      {fieldLabel: 'Video 2', xtype: 'comboVideos', name: 'comboVideos2', itemId: 'comboVideos2', width: 500},
      {fieldLabel: 'Video 3', xtype: 'comboVideos', name: 'comboVideos3', itemId: 'comboVideos3', width: 500},
      {xtype: 'panel'},
      {fieldLabel: 'Dog Breed 1', xtype: 'comboDogBreeds', name: 'comboDogBreeds1', itemId: 'comboDogBreeds1', width: 400},
      {fieldLabel: 'Dog Breed 2', xtype: 'comboDogBreeds', name: 'comboDogBreeds2', itemId: 'comboDogBreeds2', width: 400},
      {fieldLabel: 'Dog Breed 3', xtype: 'comboDogBreeds', name: 'comboDogBreeds3', itemId: 'comboDogBreeds3', width: 400},
      {xtype: 'panel'},
      {fieldLabel: 'News 1', xtype: 'comboNews', name: 'comboNews1', itemId: 'comboNews1', width: 450},
      {fieldLabel: 'Cut position 1', xtype: 'numberfield',  name: 'cutPosition1', itemId: 'cutPosition1', allowBlank: false, width: 200, allowDecimals: false},
      {fieldLabel: 'News 2', xtype: 'comboNews', name: 'comboNews2', itemId: 'comboNews2', width: 450},
      {fieldLabel: 'Cut position 2', xtype: 'numberfield',  name: 'cutPosition2', itemId: 'cutPosition2', allowBlank: false, width: 200, allowDecimals: false},
      {fieldLabel: 'News 3', xtype: 'comboNews', name: 'comboNews3', itemId: 'comboNews3', width: 450},
      {fieldLabel: 'Cut position 3', xtype: 'numberfield',  name: 'cutPosition3', itemId: 'cutPosition3', allowBlank: false, width: 200, allowDecimals: false},
      {fieldLabel: 'News 4', xtype: 'comboNews', name: 'comboNews4', itemId: 'comboNews4', width: 450},
      {fieldLabel: 'Cut position 4', xtype: 'numberfield',  name: 'cutPosition4', itemId: 'cutPosition4', allowBlank: false, width: 200, allowDecimals: false},
    ],  
    buttons: [
       {id: 'saveBtn', itemId: 'saveBtn', text: 'Save', 
          handler: function() {
        	  var form=this.up('form');
              form.saveValues(form);
          }
       }
    ],
    listeners: {
    	afterrender  : function(form, opts){
          form.populateValues(form);
    	}
    	
    },
    
    populateValues : function (me){
    	var video1=me.getComponent('comboVideos1');
    	var video2=me.getComponent('comboVideos2');
    	var video3=me.getComponent('comboVideos3');
    	
    	var news1=me.getComponent('comboNews1');
    	var news2=me.getComponent('comboNews2');
    	var news3=me.getComponent('comboNews3');
    	var news4=me.getComponent('comboNews4');
    	
    	var cutPosition1=me.getComponent('cutPosition1');
    	var cutPosition2=me.getComponent('cutPosition2');
    	var cutPosition3=me.getComponent('cutPosition3');
    	var cutPosition4=me.getComponent('cutPosition4');
    	
    	var dogBreed1=me.getComponent('comboDogBreeds1');
    	var dogBreed2=me.getComponent('comboDogBreeds2');
    	var dogBreed3=me.getComponent('comboDogBreeds3');
    	
		Ext.Ajax.request ({
		    url: Global.dirAplicacion + '/svc/conector/frontPage.php/obtiene',  
		    method: 'GET',
		    success: function (resp) {
		    	var result = Ext.decode(resp.responseText);
		    	news1.setValue(result.news1Id); news1.setRawValue(result.news1Title);
		    	news2.setValue(result.news2Id); news2.setRawValue(result.news2Title);
		    	news3.setValue(result.news3Id); news3.setRawValue(result.news3Title);
		    	news4.setValue(result.news4Id); news4.setRawValue(result.news4Title);
		    	cutPosition1.setValue(result.news1Cut);
		    	cutPosition2.setValue(result.news2Cut);
		    	cutPosition3.setValue(result.news3Cut);
		    	cutPosition4.setValue(result.news4Cut);
		    	
		    	video1.setValue(result.video1Id); video3.setRawValue(result.video1Title);
		    	video2.setValue(result.video2Id); video2.setRawValue(result.video2Title);
		    	video3.setValue(result.video3Id); video3.setRawValue(result.video3Title);
		    	
		    	dogBreed1.setValue(result.dogBreed1Id); dogBreed1.setRawValue(result.dogBreed1Name);
		    	dogBreed2.setValue(result.dogBreed2Id); dogBreed2.setRawValue(result.dogBreed2Name);
		    	dogBreed3.setValue(result.dogBreed3Id); dogBreed3.setRawValue(result.dogBreed3Name);
		    	
		    } ,
		    failure: function () {
		    	 Ext.MessageBox.show({
		             title:'Front page',
		             msg: 'Error retrieving Home Page data',
		             buttons: Ext.MessageBox.OK
		    	 });
		    }
		});    	
    	
    	//video1.reset(); if (!Ext.isEmpty(video1.getValue()))

    	
    },
    
    saveValues : function (me){
    	var video1=me.getComponent('comboVideos1');
    	var video2=me.getComponent('comboVideos2');
    	var video3=me.getComponent('comboVideos3');
    	
    	var news1=me.getComponent('comboNews1');
    	var news2=me.getComponent('comboNews2');
    	var news3=me.getComponent('comboNews3');
    	var news4=me.getComponent('comboNews4');
    	
    	var cutPosition1=me.getComponent('cutPosition1');
    	var cutPosition2=me.getComponent('cutPosition2');
    	var cutPosition3=me.getComponent('cutPosition3');
    	var cutPosition4=me.getComponent('cutPosition4');
    	
    	var dogBreed1=me.getComponent('comboDogBreeds1');
    	var dogBreed2=me.getComponent('comboDogBreeds2');
    	var dogBreed3=me.getComponent('comboDogBreeds3');
    	
    	
		Ext.Ajax.request ({
		    url: Global.dirAplicacion + '/svc/conector/frontPage.php/actualiza',  
		    method: 'POST',
		    params:{
		    	video1Id: video1.getValue(),
		    	video2Id: video2.getValue(),
		    	video3Id: video3.getValue(),
		    	
		    	news1Id: news1.getValue(),
		    	news2Id: news2.getValue(),
		    	news3Id: news3.getValue(),
		    	news4Id: news4.getValue(),
		    	
		    	cutPosition1: cutPosition1.getValue(),
		    	cutPosition2: cutPosition2.getValue(),
		    	cutPosition3: cutPosition3.getValue(),
		    	cutPosition4: cutPosition4.getValue(),
		    	
		    	dogBreed1Id: dogBreed1.getValue(),
		    	dogBreed2Id: dogBreed2.getValue(),
		    	dogBreed3Id: dogBreed3.getValue()
		    },
		    success: function (res) {
		    	 Ext.MessageBox.show({
		             title:'Front Page',
		             msg: 'Home page data saved succesfully',
		             buttons: Ext.MessageBox.OK
		    	 });
		    } ,
		    failure: function () {
		    	 Ext.MessageBox.show({
		             title:'Front page',
		             msg: 'Error saving data',
		             buttons: Ext.MessageBox.OK
		    	 });
		    }
		});
    }
    
});






