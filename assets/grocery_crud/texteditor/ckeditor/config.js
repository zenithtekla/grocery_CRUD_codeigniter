/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// config.allowedContent = true;
	config.removeFormatTags = 'script,code,del,dfn,em,font,ins,kbd,pre';
	config.removeFormatAttributes = 'script,code,del,dfn,em,font,ins,kbd,pre';
	config.protectedTags = 'script,code,del,dfn,em,font,ins,kbd,pre';
	config.extraPlugins = 'glyphicons';
	config.extraPlugins = 'spoiler';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.editingBlock = false;
	config.basicEntities = false;
};