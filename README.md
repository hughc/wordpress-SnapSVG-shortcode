### Wordpress SnapSVG Shortcode
This plugin was written to allow the embedding of SnapSVG animations on a page, by the least painful means possible. I couldn't find an easy means to do this, so I wrote one.

Generally an animation would consist of an SVG files, and then some SnapSVG code to manipulate it.

`[snap_svg svg='/full-path/to/your/graphic.svg' script='/full-path/to/a-matching/script.js']`

The plugin creates an empty <svg> element and appends the target filename as a data parameter
`<svg class="snap-svg" data-filename="/full-path/to/your/graphic.svg" ></svg>`

The first thing that the javascript file js needs to do is read the width of the `<svg>` DOM element it is targeting, and make sure the loaded SVG sits in the space correctly, by explicitly setting its height. Example below:

```
var s = Snap(".snap-svg");
var fileName = s.attr('data-filename');
console.log(s);
var trueWidth = jQuery('.snap-svg').width();

//var frag = s.load('7-infographic-process.svg');

Snap.load(fileName, function (loadedSVG) {
    // Note that we traversre and change attr before SVG
    // is even added to the page
    s.append(loadedSVG);
    loadedElement = s.select('svg > svg');
    var bounds = loadedElement.getBBox();
    var allbounds = s.getBBox();
    jQuery('.snap-svg').height(trueWidth * (bounds.h / bounds.w));
    // now do stuff with the loaded
}
```

Note there's no need to wrap this is a jQuery document ready handler, as it's in the footer of the page, and jQuery's loaded in the `<head>`

I found the SnapSVG docs to be terse to the point of being difficult to decipher, example code to be widely scattered and rare, and Adobe Illustrator's ways of exporting SVG content to be pretty perverse (names given to exported layers in particular often had numbers appended for no particular reason). 

It uses a nifty technique to ensure that the required JS files are only included on the page when the shortcode is present, via

http://wordpress.stackexchange.com/questions/165754/enqueue-scripts-styles-when-shortcode-is-present

Plugin skeleton based on http://wppb.me/