Ext.define('app.petcms4.frontpage.FormFrontPage', {
    extend: 'Ext.form.Panel',
	defaultType: 'textfield',
    frame: true,
    items:[
      {xtype: 'fieldset', title: 'Videos', itemId: 'videos', border: true, layout: 'column',
    	  items:[
             {xtype: 'fieldset', title: 'Video 1', itemId: 'video1', border: true, layout: 'vbox',
            	 items:[
                   {xtype: 'comboVideos', name: 'comboVideos1', itemId: 'comboVideos1', width: 370,
                	   listeners : {
                		   'change' : function (cmb, newValue, oldValue){
                			   var newRecord = cmb.findRecordByValue(newValue);
                			   if (newRecord.data!=undefined){
                			     cmb.up('fieldset').getComponent('videoPreview1').setUrl(newRecord.data['videoUrl']);
                			   }
                		   }
                	   }
                   },
                   {xtype: 'marcovideo',  itemId: 'videoPreview1'},
            	 ]
             },
             {xtype: 'fieldset', title: 'Video 2', itemId: 'video2', border: true, layout: 'vbox',
            	 items:[
                    {xtype: 'comboVideos', name: 'comboVideos2', itemId: 'comboVideos2', width: 370,
                 	   listeners : {
                 		   'change' : function (cmb, newValue, oldValue){
                 			   var newRecord = cmb.findRecordByValue(newValue);
                 			   if (newRecord.data!=undefined){
                 			     cmb.up('fieldset').getComponent('videoPreview2').setUrl(newRecord.data['videoUrl']);
                 			   }
                 		   }
                 	   }
                    },
                    {xtype: 'marcovideo',  itemId: 'videoPreview2'},
            	 ]
             },
             {xtype: 'fieldset', title: 'Video 3', itemId: 'video3', border: true, layout: 'vbox',
            	 items:[
                    {xtype: 'comboVideos', name: 'comboVideos3', itemId: 'comboVideos3', width: 370,
                  	   listeners : {
                  		   'change' : function (cmb, newValue, oldValue){
                  			   var newRecord = cmb.findRecordByValue(newValue);
                  			   if (newRecord.data!=undefined){
                  			     cmb.up('fieldset').getComponent('videoPreview3').setUrl(newRecord.data['videoUrl']);
                  			   }
                  		   }
                  	   }
                     },
                     {xtype: 'marcovideo',  itemId: 'videoPreview3'},
            	 ]
             },
    	  ]
      },
      {fieldLabel: 'Dog Breed 1', xtype: 'comboDogBreeds', name: 'comboDogBreeds1', itemId: 'comboDogBreeds1', width: 400},
      {fieldLabel: 'Dog Breed 2', xtype: 'comboDogBreeds', name: 'comboDogBreeds2', itemId: 'comboDogBreeds2', width: 400},
      {fieldLabel: 'Dog Breed 3', xtype: 'comboDogBreeds', name: 'comboDogBreeds3', itemId: 'comboDogBreeds3', width: 400},
      {xtype: 'fieldset', title: 'News', itemId: 'news', border: true, layout: 'column',
    	  items:[
            {xtype: 'fieldset', itemId: 'news1', border: true, layout: 'vbox', columnWidth: 0.25,
            	items: [
                        {xtype: 'label', text: 'Text'},
            	        {xtype: 'comboNews', name: 'comboNews1', itemId: 'comboNews1', width: 270,
                       	   listeners : {
                      		   'change' : function (cmb, newValue, oldValue){
                      			   var newRecord = cmb.findRecordByValue(newValue);
                      			   if (newRecord.data!=undefined){
                      			     cmb.up('fieldset').getComponent('newsText1').setValue(newRecord.data['newsText']);
                      			     cmb.up('fieldset').getComponent('cutPosition1').setValue(newRecord.data['cutPosition']);
                      			   }
                      		   }
                      	   }
                        },
            	        {xtype: 'label', text: 'Cut position'},
            	        {xtype: 'numberfield',  name: 'cutPosition1', itemId: 'cutPosition1', allowBlank: false, width: 100, allowDecimals: false},
            	        {xtype: 'textarea', itemId: 'newsText1', width: 270, height: 180, editable: false},
            	]
            },
            {xtype: 'fieldset', itemId: 'news2', border: true, layout: 'vbox', columnWidth: 0.25,
            	items: [
                        {xtype: 'label', text: 'Title'},
            	        {xtype: 'comboNews', name: 'comboNews2', itemId: 'comboNews2', width: 270,
                    	   listeners : {
                      		   'change' : function (cmb, newValue, oldValue){
                      			   var newRecord = cmb.findRecordByValue(newValue);
                      			   if (newRecord.data!=undefined){
                      			     cmb.up('fieldset').getComponent('newsText2').setValue(newRecord.data['newsText']);
                      			     cmb.up('fieldset').getComponent('cutPosition2').setValue(newRecord.data['cutPosition']);
                      			   }
                      		   }
                      	   }
                        },
            	        {xtype: 'label', text: 'Cut position'},
            	        {xtype: 'numberfield',  name: 'cutPosition2', itemId: 'cutPosition2', allowBlank: false, width: 100, allowDecimals: false},
            	        {xtype: 'textarea', itemId: 'newsText2', width: 270, height: 180, editable: false},
            	]
            },
            {xtype: 'fieldset', itemId: 'news3', border: true, layout: 'vbox', columnWidth: 0.25,
            	items: [
                        {xtype: 'label', text: 'Title'},
            	        {xtype: 'comboNews', name: 'comboNews3', itemId: 'comboNews3', width: 270,
                    	   listeners : {
                      		   'change' : function (cmb, newValue, oldValue){
                      			   var newRecord = cmb.findRecordByValue(newValue);
                      			   if (newRecord.data!=undefined){
                      			     cmb.up('fieldset').getComponent('newsText3').setValue(newRecord.data['newsText']);
                      			     cmb.up('fieldset').getComponent('cutPosition3').setValue(newRecord.data['cutPosition']);
                      			   }
                      		   }
                      	   }
                        },
            	        {xtype: 'label', text: 'Cut position'},
            	        {xtype: 'numberfield',  name: 'cutPosition3', itemId: 'cutPosition3', allowBlank: false, width: 100, allowDecimals: false},
            	        {xtype: 'textarea', itemId: 'newsText3', width: 270, height: 180, editable: false},
            	]
            },
            {xtype: 'fieldset', itemId: 'news4', border: true, layout: 'vbox', columnWidth: 0.25,
            	items: [
                        {xtype: 'label', text: 'Title'},
            	        {xtype: 'comboNews', name: 'comboNews4', itemId: 'comboNews4', width: 270,
                    	   listeners : {
                      		   'change' : function (cmb, newValue, oldValue){
                      			   var newRecord = cmb.findRecordByValue(newValue);
                      			   if (newRecord.data!=undefined){
                      			     cmb.up('fieldset').getComponent('newsText4').setValue(newRecord.data['newsText']);
                      			     cmb.up('fieldset').getComponent('cutPosition4').setValue(newRecord.data['cutPosition']);
                      			   }
                      		   }
                      	   }
                        },            	        
                        {xtype: 'label', text: 'Cut position'},
                        {xtype: 'numberfield',  name: 'cutPosition4', itemId: 'cutPosition4', allowBlank: false, width: 100, allowDecimals: false},
            	        {xtype: 'textarea', itemId: 'newsText4', width: 270, height: 180, editable: false},
            	]
            },
    	  ]
      },
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
    	var videos=me.getComponent('videos');
    	
    	var video1=videos.getComponent('video1').getComponent('comboVideos1');
    	var video2=videos.getComponent('video2').getComponent('comboVideos2');
    	var video3=videos.getComponent('video3').getComponent('comboVideos3');
    	
    	var news=me.getComponent('news');
    	var news1=news.getComponent('news1').getComponent('comboNews1');
    	var news2=news.getComponent('news2').getComponent('comboNews2');
    	var news3=news.getComponent('news3').getComponent('comboNews3');
    	var news4=news.getComponent('news4').getComponent('comboNews4');
    	
    	var cutPosition1=news.getComponent('news1').getComponent('cutPosition1');
    	var cutPosition2=news.getComponent('news2').getComponent('cutPosition2');
    	var cutPosition3=news.getComponent('news3').getComponent('cutPosition3');
    	var cutPosition4=news.getComponent('news4').getComponent('cutPosition4');
    	
    	var newsText1 = news.getComponent('news1').getComponent('newsText1');
    	var newsText2 = news.getComponent('news2').getComponent('newsText2');
    	var newsText3 = news.getComponent('news3').getComponent('newsText3');
    	var newsText4 = news.getComponent('news4').getComponent('newsText4');    	
    	
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
		    	newsText1.setValue(result.news1Text);
		    	newsText2.setValue(result.news2Text);
		    	newsText3.setValue(result.news3Text);
		    	newsText4.setValue(result.news4Text);
		    	
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
    	var videos=me.getComponent('videos');
    	
    	var video1=videos.getComponent('video1').getComponent('comboVideos1');
    	var video2=videos.getComponent('video2').getComponent('comboVideos2');
    	var video3=videos.getComponent('video3').getComponent('comboVideos3');
    	
    	var news=me.getComponent('news');
    	var news1=news.getComponent('news1').getComponent('comboNews1');
    	var news2=news.getComponent('news2').getComponent('comboNews2');
    	var news3=news.getComponent('news3').getComponent('comboNews3');
    	var news4=news.getComponent('news4').getComponent('comboNews4');
    	
    	var cutPosition1=news.getComponent('news1').getComponent('cutPosition1');
    	var cutPosition2=news.getComponent('news2').getComponent('cutPosition2');
    	var cutPosition3=news.getComponent('news3').getComponent('cutPosition3');
    	var cutPosition4=news.getComponent('news4').getComponent('cutPosition4');
    	
    	var newsText1 = news.getComponent('news1').getComponent('newsText1');
    	var newsText2 = news.getComponent('news2').getComponent('newsText2');
    	var newsText3 = news.getComponent('news3').getComponent('newsText3');
    	var newsText4 = news.getComponent('news4').getComponent('newsText4');
    	
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






