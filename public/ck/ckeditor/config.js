/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/novatech/public/ck/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/novatech/public/ck/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '/novatech/public/ck/ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '/novatech/public/ck/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/novatech/public/ck/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/novatech/public/ck/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash';

};
