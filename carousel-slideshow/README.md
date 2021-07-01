# mibreitGallery

## About

I've written this gallery for my homepage www.mibreit-photo.com to have an easy way to show my photos. From the beginning my goal with the gallery was to have an easily extensible code base and the possibility to change the styles simply via CSS.

## Technology

A mix of ES6 and JQuery was used. The gallery is reduced to a minimum set of functionality and the code is split into different files in an attempt to get a more object oriented result here.

By splitting the codebase it's also possible to only use the Slideshow or the full Gallery, which itself contains the Slideshow.

The gallery also makes use of lazy loading techniques to ensure that the image loading doesn't interfere with the loading of the homepage.

## Build

1. npm install -> get all dependencies
2. npm start -> start demo app
3. npm run build -> build the gallery (code will end up in _dist_ folder)

## Usage

To see how to use it, check the included _index.html_ in src.

The gallery exports two functions:

1. createSlideshow -> if you don't want any interaction and just a continuous, lightweight slideshow use this function. You pass in a config object with the following values:

- slideshowContainer -> mandatory - CSS id or class of the container div, which contains the images
- scaleMode -> optional - defines how the images will be scaled to fit the _slideshowContainer_ -> possible values are SCALE_MODE_STRETCH, SCALE_MODE_FITASPECT (defualt), SCALE_MODE_NONE, SCALE_MODE_EXPAND. They are also part of the exported interface
- interval -> optional - defines in milliseconds how long an image is shown before moving to the next image (default is 3000ms)
- preloadLeftNr -> optional - defines how many images are preloaded before the current image (lazy loading applied; default is 3)
- preloadRightNr -> optional - defines how many images are preloaded after the current image (lazy loading applied; default is 7)

2. createGallery -> extends the Slideshow with thumbview as well as controls for changing the images, including a responsive fullscreen mode. You pass in a config object with the following values:

- same values as in 1. also apply here
- thumbviewContainer -> optional - CSS id or class of your thumbview container div, which contains the thumb images
- titleContainer -> optional - CSS id or class of your title div, which will later display the title of the current image
- allowFullscreen -> optional - if true is passed in, fullscreen mode will be made available via the _f_ key on the keyboard and via a special fullscreen button

Note: You can only use one gallery with fullscreen mode per page. Otherwise you can combine several slideshows and galleries as in the demo (index.html)
