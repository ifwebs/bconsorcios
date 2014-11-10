(function(){CKEDITOR.dialog.add('youtube',
	function(editor)
	{return{title:editor.lang.youtube.title,minWidth:CKEDITOR.env.ie&&CKEDITOR.env.quirks?368:350,minHeight:350,
	onShow:function(){this.getContentElement('general','content').getInputElement().setValue('')},
	onOk:function(){
		       		val = this.getContentElement('general','content').getInputElement().getValue();
					var text = '<br/>'+val+'<br/>';
					/*
       				val = val.replace("watch\?v\=", "v\/");
					var text='<iframe title="YouTube video player" class="youtube-player" type="text/html" width="480" height="390" src="http://www.youtube.com/embed/'
					//+this.getContentElement('general','content').getInputElement().getValue()
					+ val
					+'?rel=0" frameborder="0"></iframe>';*/
	this.getParentEditor().insertHtml(text)},
	contents:[{label:editor.lang.common.generalTab,id:'general',elements:
																		[{type:'html',
																		id:'pasteMsg',
																		html:'<div style="white-space:normal;width:500px;"><br />'+editor.lang.youtube.pasteMsg
																		+'</div>'},
																		{type:'html',
																		id:'content',
																		style:'width:340px;height:90px',
																		html:'<textarea cols="100" rows="10" style="background:#fff" /></textarea>',
																		/*html:'<input size="100" style="'+'border:1px solid black;'+'background:white;'+'height:20px;">',*/
																		focus:function(){this.getElement().focus()}}]}]}})})();
