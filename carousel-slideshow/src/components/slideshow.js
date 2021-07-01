/**
 * @class Slideshow
 * @author Michael Breitung
 * @copyright Michael Breitung Photography (www.mibreit-photo.com)
 */
import $ from "jquery";
import Preloader from "./preloader";
import ImageWrapper from "./imageWrapper";
import { isNumber, isUndefined, isFunction } from "../tools/typeChecks";
import isElementPresent from "../tools/isElementPresent";
import {
  BASE_Z_INDEX,
  IMAGE_ELEMENT_CLASS,
  SCALE_MODES,
  SCALE_MODE_FITASPECT,
} from "../tools/globals";

// behavior
const IMAGE_CROSS_FADE_TIME = 800;
const DEFAULT_IMAGE_CHANGE_INTERVAL = 3000;

/**
 * Builder is used to separate the configuration and building of the Slideshow
 * from it's behavior.
 */
export default class SlideshowBuilder {
  constructor(slideshowContainer) {
    // defaults
    this.interval = DEFAULT_IMAGE_CHANGE_INTERVAL;
    this.zoom = undefined;
    this.scaleMode = SCALE_MODE_FITASPECT;
    this.preloadLeftNr = undefined;
    this.preloadRightNr = undefined;
    this.slideshowContainer = slideshowContainer;
  }
  withInterval(interval) {
    if (isNumber(interval)) {
      this.interval = interval;
    }
    return this;
  }
  withZoom(zoom) {
    if (isNumber(zoom)) {
      this.zoom = zoom;
    }
    return this;
  }
  withScaleMode(scaleMode) {
    if (SCALE_MODES.includes(scaleMode)) {
      this.scaleMode = scaleMode;
    }
    return this;
  }
  withPreloaderLeftSize(number) {
    if (number > 0) {
      this.preloadLeftNr = number;
    }
    return this;
  }
  withPreloaderRightSize(number) {
    if (number > 0) {
      this.preloadRightNr = number;
    }
    return this;
  }
  buildSlideshow() {
    const validationResult = this._validate();
    if (this._validate() !== undefined) {
      throw Error("buildSlideshow Error: " + validationResult);
    }
    return new Slideshow(this);
  }

  // private
  _validate() {
    if (!isElementPresent(this.slideshowContainer)) {
      return "invalid slideshowContainer";
    }
    return undefined;
  }
}

class Slideshow {
  constructor(builder) {
    this._slideshowContainer = builder.slideshowContainer;
    this._imageScaleMode = builder.scaleMode;
    this._interval = builder.interval;
    this._zoom = builder.zoom;

    // not provided by builder
    this._currentIndex = -1; // to allow initial image change
    this._imageContainers = [];
    this._imageWrappers = [];
    this._intervalId = -1;
    this._baseZIndex = BASE_Z_INDEX;
    this._imageChangedCallback = undefined;
    this._preloader = undefined;

    this._isInitialized = this._init(builder.preloaderLeftNr, builder.preloaderRightNr);
  }

  isInitialized() {
    return this._isInitialized;
  }

  reinitSize() {
    if (!isUndefined(this._imageWrappers[this._currentIndex])) {
      const width = $(this._slideshowContainer).width();
      let height = $(this._slideshowContainer).height();
      if (height === 0) {
        // if we specify the height in terms of padding to achieve certain aspect
        height = $(this._slideshowContainer).outerHeight();
      }
      this._imageWrappers[this._currentIndex].applyScaleMode(width, height, this._imageScaleMode);
    }
  }

  start() {
    if (this._isInitialized) {
      this._intervalId = setInterval(this.showNextImage, this._interval);
    }
  }

  stop() {
    if (this._intervalId !== -1) {
      clearInterval(this._intervalId);
      this._intervalId = -1;
    }
  }

  setImageChangedCallback(callback) {
    if (!isFunction(callback)) {
      throw new Error("Slideshow#setImageChangedCallback Error: invalid type passed");
    }
    this._imageChangedCallback = callback;
  }

  showImage = (newIndex) => {
    if (!isNumber(newIndex)) {
      throw new Error("Slideshow#showImage Error: invalid type passed");
    }
    if (this._isValidIndex(newIndex)) {
      if (this._imageWrappers[newIndex].wasLoaded()) {
        this._changeCurrentImage(newIndex);
      } else {
        this._preloader
          .loadImage(newIndex)
          .then((wasLoaded) => {
            this._preloader.setCurrentIndex(this._currentIndex);
            this._changeCurrentImage(newIndex);
          })
          .catch(() => {
            // should never happen
            throw new Error("Error in Slideshow#showImage");
          });
      }
    }
  };

  showNextImage = () => {
    var new_CurrentIndex =
      this._currentIndex < this._imageContainers.length - 1 ? this._currentIndex + 1 : 0;

    this.showImage(new_CurrentIndex);
  };

  showPreviousImage = () => {
    var new_CurrentIndex =
      this._currentIndex > 0 ? this._currentIndex - 1 : this._imageContainers.length - 1;

    this.showImage(new_CurrentIndex);
  };

  getCurrentImageTitle() {
    if (this._isValidIndex(this._currentIndex)) {
      return this._imageWrappers[this._currentIndex].getTitle();
    } else {
      return "";
    }
  }

  getCurrentImageUrl() {
    if (this._isValidIndex(this._currentIndex)) {
      return this._imageWrappers[this._currentIndex].getUrl();
    } else {
      return "";
    }
  }

  getCurrentImageId() {
    if (this._isValidIndex(this._currentIndex)) {
      return this._currentIndex;
    } else {
      return -1;
    }
  }

  // private helper methods

  _init(preloaderLeftNr, preloaderRightNr) {
    this._imageContainers = $(`${this._slideshowContainer} ${IMAGE_ELEMENT_CLASS}`).has("img");

    const images = $(`${this._slideshowContainer} ${IMAGE_ELEMENT_CLASS} > img`);

    if (this._imageContainers.length > 0 && this._imageContainers.length === images.length) {
      this._wrapImages(images);

      // prepare the containers
      this._prepareContainers();

      // finally prepare the current image
      this.reinitSize();

      // make slideshow responsive
      $(window).resize(() => {
        this.reinitSize();
      });

      // create preloader
      this._preloader = new Preloader(
        this._imageWrappers,
        this._currentIndex,
        preloaderLeftNr,
        preloaderRightNr
      );

      // and finally show first image
      this.showImage(0);

      return true;
    } else {
      return false;
    }
  }

  _isValidIndex(index) {
    return index >= 0 && index < this._imageContainers.length;
  }

  _wrapImages(images) {
    for (let i = 0; i < images.length; i++) {
      this._imageWrappers.push(new ImageWrapper(images[i], true));
    }
  }

  _prepareContainers() {
    $(this._imageContainers).css({
      opacity: 0.0,
    });

    $(this._imageContainers[this._currentIndex]).css({
      "opacity": 1.0,
      "z-index": this._baseZIndex,
    });
  }

  _changeCurrentImage(newIndex) {
    if (newIndex != this._currentIndex) {
      $(this._imageContainers[newIndex]).animate(
        {
          opacity: 1.0,
        },
        IMAGE_CROSS_FADE_TIME
      );

      $(this._imageContainers[newIndex]).css({
        "z-index": this._baseZIndex + 1,
      });

      if (isNumber(this._zoom)) {
        this._imageWrappers[newIndex].startZoomAnimation(
          this._zoom,
          this._interval + IMAGE_CROSS_FADE_TIME
        );
      }

      if (this._currentIndex != -1) {
        const currentIndex = this._currentIndex; // for closure
        $(this._imageContainers[this._currentIndex]).animate(
          {
            opacity: 0.0,
          },
          IMAGE_CROSS_FADE_TIME,
          "swing",
          () => {
            if (isNumber(this._zoom)) {
              this._imageWrappers[currentIndex].resetZoom();
            }
          }
        );
        $(this._imageContainers[this._currentIndex]).css({
          "z-index": this._baseZIndex,
        });
      }

      this._currentIndex = newIndex;

      this.reinitSize();

      if (this._imageChangedCallback !== undefined) {
        this._imageChangedCallback(this._currentIndex, this.getCurrentImageTitle());
      }
    }
  }
}
