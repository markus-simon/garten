/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

// Register a templates definition set named "default".
CKEDITOR.addTemplates( 'default', {
    // The name of sub folder which hold the shortcut preview images of the
    // templates.
    imagesPath: CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

    // The templates definitions.
    templates: [ {
        title: 'Gardena',
        image: 'template1.gif',
        description: 'The beauty!',
        html:
        '<div class="blog-card">' +
        '<div class="blog-card-thumbnail">XXXXXXX</div>' +
        '<div class="blog-card-right">' +
        '<h1 class="title"></h1>' +
        '<div class="blog-card-separator"></div>' +
        '<p>Magnesium is one of the six essential macro-minerals that  production and synthesis of protein and enzymes. It contributes to the development of bones and most  production and synthesis of protein and enzymes. It contributes to the development of bones and most is required by the body for energy production and synthesis of protein and enzymes. It contributes to the development of bones and most importantly it is responsible for synthesis of your DNA and RNA. A new report that has appeared in theBritish Journal of Cancer, gives you another reason to add more magnesium to your diet...</p>' +
        '</div>' +
        '<h5 class="day"></h5>' +
        '<h6 class="month"></h6>' +
        '<ul>' +
        '<li><i class="fa fa-eye fa-2x"></i></li>' +
        '<li><i class="fa fa-heart-o fa-2x"></i></li>' +
        '<li><i class="fa fa-envelope-o fa-2x"></i></li>' +
        '<li><i class="fa fa-share-alt fa-2x"></i></li>' +
        '</ul>' +
        '<div class="blog-card-fab"><i class="fa fa-arrow-down fa-3x"></i></div>' +
        '</div>'
    },{
        title: 'Image and Title',
        image: 'template1.gif',
        description: 'One main image with a title and text that surround the image.',
        html: '<h3>' +
        // Use src=" " so image is not filtered out by the editor as incorrect (src is required).
        '<img src=" " alt="" style="margin-right: 10px" height="100" width="100" align="left" />' +
        'Type the title here' +
        '</h3>' +
        '<p>' +
        'Type the text here' +
        '</p>'
    },{
        title: 'Strange Template',
        image: 'template2.gif',
        description: 'A template that defines two columns, each one with a title, and some text.',
        html: '<table cellspacing="0" cellpadding="0" style="width:100%" border="0">' +
        '<tr>' +
        '<td style="width:50%">' +
        '<h3>Title 1</h3>' +
        '</td>' +
        '<td></td>' +
        '<td style="width:50%">' +
        '<h3>Title 2</h3>' +
        '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>' +
        'Text 1' +
        '</td>' +
        '<td></td>' +
        '<td>' +
        'Text 2' +
        '</td>' +
        '</tr>' +
        '</table>' +
        '<p>' +
        'More text goes here.' +
        '</p>'
    },
        {
            title: 'Text and Table',
            image: 'template3.gif',
            description: 'A title with some text and a table.',
            html: '<div style="width: 80%">' +
            '<h3>' +
            'Title goes here' +
            '</h3>' +
            '<table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1">' +
            '<caption style="border:solid 1px black">' +
            '<strong>Table title</strong>' +
            '</caption>' +
            '<tr>' +
            '<td>&nbsp;</td>' +
            '<td>&nbsp;</td>' +
            '<td>&nbsp;</td>' +
            '</tr>' +
            '<tr>' +
            '<td>&nbsp;</td>' +
            '<td>&nbsp;</td>' +
            '<td>&nbsp;</td>' +
            '</tr>' +
            '<tr>' +
            '<td>&nbsp;</td>' +
            '<td>&nbsp;</td>' +
            '<td>&nbsp;</td>' +
            '</tr>' +
            '</table>' +
            '<p>' +
            'Type the text here' +
            '</p>' +
            '</div>'
        } ]
} );
