Ext.define('app.petcms4.FormFrontPage', {
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
    ],  
    buttons: [
       {id: 'saveBtn', itemId: 'saveBtn', text: 'Save', 
          handler: function() {
            this.up('form').getForm().submit();
          }
       },
       {text: 'Reset',
          handler: function() {
            this.up('form').getForm().reset();
          }
       }
    ]
});













