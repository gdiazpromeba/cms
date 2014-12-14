Ext.define('app.petcms4.controls.Encodable', {
    extend: 'Ext.form.FieldContainer',
    mixins: {
        field: 'Ext.form.field.Field'
    },	
	alias: 'widget.encodable',
    layout: 'hbox',
    linkedText: null,
	items: [
            {xtype: 'textfield', itemId: 'urlEncoded',  allowBlank: false, flex: 1},
            {xtype: 'button', text: 'Encode', itemId: 'botEncodeUrl', width: 50, 
            	listeners:{
          		click : function(  The, eOpts ){
          			var encoding= The.ownerCt;
          			var url= encoding.ownerCt.ownerCt.down('#' + encoding.linkedText);
          			Ext.Ajax.request({
          			    url: Global.dirAplicacion + '/svc/conector/codificaUrl.php',
          			    params: {
          			    	"urlOrig": url.getValue(),
          			    },
          			    success: function(response){
          			        var text = response.responseText;
          			        encoding.getComponent('urlEncoded').setValue(text);
          			    },
          		        failure: function (form, options) {
            		          alert("Error invoking url encoding");
            		    }
          			});          			
          	    }
	        }
          },
    ],
    getValue : function (){
  	  var url= this.down('#urlEncoded').getValue();
  	  return url;
    },
    setValue : function (aValue){
    	  this.down('#urlEncoded').setValue(aValue);
    },
    setName : function (aValue){
  	  this.down('#urlEncoded').setName(aValue);
    },
    
    
});