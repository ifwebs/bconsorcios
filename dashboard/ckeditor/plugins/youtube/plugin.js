(function(){var youtubeCmd={exec:function(editor){editor.openDialog('youtube');return}};
CKEDITOR.plugins.add('youtube',{lang:['en','uk','pt-br'],requires:['dialog'],
	init:function(editor){var commandName='youtube';editor.addCommand(commandName,youtubeCmd);
				editor.ui.addButton('Youtube',{label:editor.lang.youtube.button,command:commandName,icon:this.path+"images/icon.gif"});
				CKEDITOR.dialog.add(commandName,CKEDITOR.getUrl(this.path+'dialogs/youtube.js'))}})})();
