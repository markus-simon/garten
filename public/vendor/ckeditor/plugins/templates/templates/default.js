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
        '<div class="grid-container">' +
        '<div class="grid-x grid-margin-x blog-card2">' +
        '<div class="cell large-5 large-offset-1 blog-card-thumbnail2">Hier dein Foto ...</div>' +
        '<div class="cell large-6 blog-card-right2">' +
        '<h1 class="title">&nbsp;</h1>' +
        '<div class="blog-card-separator"></div>' +
        '<p>Magnesium is one of the six essential macro-minerals that  production and synthesis of protein and enzymes. It contributes to the development of bones and most  production and synthesis of protein and enzymes. It contributes to the development of bones and most is required by the body for energy production and synthesis of protein and enzymes. It contributes to the development of bones and most importantly it is responsible for synthesis of your DNA and RNA. A new report that has appeared in theBritish Journal of Cancer, gives you another reason to add more magnesium to your diet...</p>' +
        '</div>' +
        '<h5 class="day">&nbsp;</h5>' +
        '<h6 class="month">&nbsp;</h6>' +
        '<div class="blog-card-fab2"><i class="fa fa-arrow-down fa-3x"></i></div>' +
        '</div>' +
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
    }]
});
