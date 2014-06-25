Ext.application({
    name: 'HelloExt',
    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [
                {xtype: 'panel', region: 'center', layout: 'form', 
                	items: [
                	    {xtype: 'comboRango1a5', width: 100, fieldLabel: 'Rank'},
                	    {xtype: 'textfield', width: 150, fieldLabel: 'Text'},
                	    {xtype: 'comboBancos', width: 150, fieldLabel: 'Banco'},
                	    {xtype: 'hidden', name: 'filePhotoBreed', id: 'filePhotoBreed', fieldLabel: 'Image'},
                	    {xtype:'image', id: 'imagePhotoBreed', width: 133, height: 100},                	    
                        {fieldLabel: 'Foto', xtype: 'button', text: 'Subir foto', itemId: 'botAceptar', ref: '../botAceptar', 
                            listeners: {scope: this,  
                              'click' :  function(){
                                var win=muestraRemisionFotos('fichaFotoFU', '/petcms4/svc/conector/fichas.php/subeFoto');
                                win.show();
                                win.on("beforedestroy", function(){
                                    Ext.getCmp('filePhotoBreed').setValue(win.getNombreArchivoFoto());
                                    Ext.getCmp('imagePhotoBreed').el.dom.src='/petcms4/resources/images/breeds/' + win.getNombreArchivoFoto(); 
                                    //formulario.doLayout();     
                                });
                              }//evento click
                             }//listeners
                           }//botón Aceptar                	    
                    ]
                }
            ]
        });
    }
});