/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	 config.language = 'pt-br';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'ckeditor/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'ckeditor/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'ckeditor/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'ckeditor/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'ckeditor/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'ckeditor/kcfinder/upload.php?type=flash';
	
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
	config.resize_enabled = false;
	config.extraPlugins = 'vimeo';
	config.extraPlugins = 'youtube';
	
	CKEDITOR.config.forcePasteAsPlainText = true;
	CKEDITOR.config.width = '98%';
	CKEDITOR.config.height = '350';	
   
    config.toolbar_Full =
	[
		{ name: 'document',		items : [ 'Source'] },
		{ name: 'clipboard',	items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'basicstyles',	items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'editing',		items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		'/',
		{ name: 'paragraph',	items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'links',		items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',		items : [ 'Image','Vimeo','Youtube','Table','HorizontalRule','SpecialChar' ] },
		{ name: 'styles',		items : [ 'FontSize' ] },
		{ name: 'colors',		items : [ 'TextColor' ] },
		{ name: 'tools',		items : [ 'Maximize', 'ShowBlocks','-','About' ] }
	];
   
};
