/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
CKEDITOR.editorConfig = function( config ) {
	var base_url = window.location.origin;
	config.filebrowserBrowseUrl = base_url + '/themes/mosaic/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = base_url + '/themes/mosaic/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = base_url + '/themes/mosaic/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = base_url + '/themes/mosaic/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = base_url + '/themes/mosaic/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = base_url + '/themes/mosaic/kcfinder/upload.php?type=flash';
};
