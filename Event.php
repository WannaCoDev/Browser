<?php

namespace Plugin\Browser;

class Event
{
    public static function ipBeforeController()
    {
    if( ipIsManagementState() ) {
    $script = "
                     $(document).ready(function() {
                                                                var mixedMode = {
        name: 'htmlmixed',
        scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
                       mode: null},
                      {matches: /(text|application)\/(x-)?vb(a|script)/i,
                       mode: 'vbscript'}]
      };
                    
			        $('#elfinder').elfinder({
					url : 'Plugin/Browser/elfinder/php/connector.php',
					  // connector URL (REQUIRED)
					// lang: 'ru',             // language (OPTIONAL)
					height: 500,
					viewportMargin: Infinity,
			
					commandsOptions: {

 
						edit : {
							// list of allowed mimetypes to edit
							// if empty - any text files can be edited
							mimes : [],

							// you can have a different editor for different mimes
							editors : [{
 
								mimes : ['text/plain', 'text/html', 'text/javascript', 'text/css', 'text/x-php', 'application/x-httpd-php',  'text/php', 'text/x-csrc' , 'text/x-c++src', 'text/x-java', 'text/x-csharp', 'application/x-httpd-php', 'text/x-php', 'application/json'], /*'text/plain', 'text/html', 'text/javascript', 'text/css'*/

								load : function(textarea) {
    
           
									this.myCodeMirror = CodeMirror.fromTextArea(textarea, {
									       
										lineNumbers: true,
										theme: 'ambiance',
										viewportMargin: Infinity,
										lineWrapping: true,
										textWrapping: true,
										styleActiveLine: true,
                                                                                matchBrackets: true,
										mode: mixedMode, 
										 extraKeys: {
        'F11': function(cm) {
          cm.setOption('fullScreen', !cm.getOption('fullScreen'));
        },
        'Esc': function(cm) {
          if (cm.getOption('fullScreen')) cm.setOption('fullScreen', false);
        }
      }
	
									})  
      
								},

								close : function(textarea, instance) {
									this.myCodeMirror = null;
								},


								save : function(textarea, editor) {
									textarea.value = this.myCodeMirror.getValue();
									this.myCodeMirror = null;
								}

							} ] //editors
						} //edit

					} //commandsoptions
						
				}).elfinder('instance');
	             });

";

        ipAddJsContent('wfilebrowser', $script);
        
        ipAddJs('codemirror/lib/codemirror.js');
        ipAddCss('elfinder/css/elfinder.min.css');
        
      
        ipAddCss('codemirror/theme/ambiance.css');
        ipAddCss('codemirror/lib/codemirror.css');
        
        ipAddCss('elfinder/css/theme.css');
        ipAddJs('codemirror/mode/xml/xml.js');
        ipAddJs('codemirror/mode/css/css.js');
         ipAddJs('codemirror/mode/clike/clike.js');
        ipAddJs('codemirror/mode/htmlmixed/htmlmixed.js');
        ipAddJs('codemirror/mode/php/php.js');
        ipAddJs('codemirror/mode/javascript/javascript.js');
        ipAddJs('codemirror/mode/vbscript/vbscript.js');
        ipAddJs('elfinder/js/elfinder.min.js');
        ipAddJs('codemirror/addon/selection/active-line.js');
        ipAddJs('codemirror/addon/edit/matchbrackets.js');
        ipAddJs('codemirror/addon/display/fullscreen.js', 0);
         ipAddCss('codemirror/addon/display/fullscreen.css');
        
        
       
      
        
    }

 }

}  