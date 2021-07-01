/**
 * @class Gallery
 * @author Michael Breitung
 * @copyright Michael Breitung Photography (www.mibreit-photo.com)
 */

import $ from "jquery";
import { handleSwipe, SWIPE_RIGHT, SWIPE_LEFT, CLICK } from "jquery-swipe-handler";
import ThumbManager from "./thumbManager";
import SlideshowBuilder from "./slideshow";
import ThumbviewScroller from "./thumbviewScroller";
import FullscreenController from "./fullscreenController";
import { isString, isBoolean, isUndefined, isNumber, isFunction } from "../tools/typeChecks";
import {
  ENTER_FULLSCREEN_BUTTON,
  SLIDESHOW_NEXT,
  SLIDESHOW_PREVIOUS,
  THUMBVIEW_NEXT,
  THUMBVIEW_PREVIOUS,
} from "../tools/globals";
import fullscreenSvg from "../images/fullscreen.svg";
import nextImage from "../images/nextImage.svg";
import nextImages from "../images/nextImages.svg";

// const
const HOVER_ANIMATION_TIME = 400;

/**
 * Builder is used to separate the configuration and building of the Gallery
 * from it's behavior.
 */
export default class GalleryBuilder extends SlideshowBuilder {
  constructor(slideshowContainer) {
    super(slideshowContainer);
    // defaults
    this.thumbviewContainer = undefined;
    this.titleContainer = undefined;
    this.allowFullscreen = true;
  }
  withThumbviewContainer(container) {
    if (isString(container)) {
      this.thumbviewContainer = container;
    }
    return this;
  }
  withTitleContainer(container) {
    if (isString(container)) {
      this.titleContainer = container;
    }
    return this;
  }
  withFullscreen(allow) {
    if (isBoolean(allow)) {
      this.allowFullscreen = allow;
    }
    return this;
  }

  buildGallery() {
    const validationResult = this._validate();
    if (!isUndefined(validationResult)) {
      throw Error("buildGallery Error: " + validationResult);
    }
    return new Gallery(this);
  }

  // private helper
  _validate() {
    if (isString(this._thumviewContainer)) {
      if (!$(this._thumbviewContainer).length) {
        return "invalid thumbview class";
      }
    }
    if (isString(this._titleContainer)) {
      if (!$(this._titleContainer).length) {
        return "invalid title class";
      }
    }
    return undefined;
  }
}

class Gallery {
  constructor(builder) {
    this._mibreitSlideshow = builder.buildSlideshow();
    this._slideshowContainer = builder.slideshowContainer;
    this._thumbviewContainer = builder.thumbviewContainer;
    this._allowFullscreen = builder.allowFullscreen;
    this._titleContainer = builder.titleContainer;

    // not provided by builder -> will be created during init
    this._mibreitScroller = undefined;
    this._mibreitThumbManager = undefined;
    this._fullscreenController = undefined;
    this._fullscreenEnterButton = undefined;
    this._slideshowPrevious = undefined;
    this._slideshowNext = undefined;
    this._thumbviewPrevious = undefined;
    this._thumbviewNext = undefined;
    this._externalImageChangedCallbacks = [];
  }

  init() {
    if (this._mibreitSlideshow.isInitialized()) {
      this._mibreitSlideshow.setImageChangedCallback(this._imageChangedCallback);

      if (this._allowFullscreen) {
        this._initFullscreen();
      }

      if (!isUndefined(this._thumbviewContainer)) {
        this._initThumbview();
      }

      if (!isUndefined(this._titleContainer)) {
        this._updateTitle(this._mibreitSlideshow.getCurrentImageTitle());
      }

      this._initNavigationButtons();

      this._initKeyAndMouseEvents();

      return true;
    } else {
      return false;
    }
  }

  startSlideshow() {
    this._mibreitSlideshow.start();
  }

  stopSlideshow() {
    this._mibreitSlideshow.stop();
  }

  showImage(id) {
    if (!isNumber(id)) {
      throw new Error("Gallery#showImage Error: invalid type passed");
    }
    this._mibreitSlideshow.showImage(id);
  }

  addImageChangedCallback(callback) {
    if (!isFunction(callback)) {
      throw new Error("Gallery#setImageChangedCallback Error: invalid type passed");
    }
    this._externalImageChangedCallbacks.push(callback);
  }

  getCurrentImageTitle() {
    return this._mibreitSlideshow.getCurrentImageTitle();
  }

  getCurrentImageUrl() {
    return this._mibreitSlideshow.getCurrentImageUrl();
  }

  getCurrentImageId() {
    return this._mibreitSlideshow.getCurrentImageId();
  }

  // private helpers

  _initFullscreen() {
    $(this._slideshowContainer).append(`<div class="${ENTER_FULLSCREEN_BUTTON.substr(1)}">${fullscreenSvg}</div>`);

    this._fullscreenEnterButton = $(`${this._slideshowContainer} ${ENTER_FULLSCREEN_BUTTON}`);
    const fullscreenController = new FullscreenController();
    if (
      fullscreenController.init(
        this._slideshowContainer,
        this._thumbviewContainer,
        this._titleContainer,
        this._fullscreenChangedCallback
      )
    ) {
      this._fullscreenController = fullscreenController;
    }
  }

  _initNavigationButtons() {
    // add previous and next buttons
    $(this._slideshowContainer).append(`<div class="${SLIDESHOW_NEXT.substr(1)}">${nextImage}</div>`);
    this._slideshowNext = $(`${this._slideshowContainer} ${SLIDESHOW_NEXT}`);
    $(this._slideshowContainer).append(`<div class="${SLIDESHOW_PREVIOUS.substr(1)}">${nextImage}</div>`);
    this._slideshowPrevious = $(`${this._slideshowContainer} ${SLIDESHOW_PREVIOUS}`);
  }

  _initThumbview() {
    this._mibreitScroller = new ThumbviewScroller();
    if (this._mibreitScroller.init(this._thumbviewContainer)) {
      this._mibreitThumbManager = new ThumbManager();
      this._mibreitThumbManager.init(this._thumbviewContainer, this._thumbClickCallback);

      // add previous and next buttons and hook up events
      $(this._thumbviewContainer).prepend(`<div class="${THUMBVIEW_PREVIOUS.substr(1)}">${nextImages}</div>`);
      this._thumbviewPrevious = $(`${this._thumbviewContainer} ${THUMBVIEW_PREVIOUS}`);
      $(this._thumbviewContainer).append(`<div class="${THUMBVIEW_NEXT.substr(1)}">${nextImages}</div>`);
      this._thumbviewNext = $(`${this._thumbviewContainer} ${THUMBVIEW_NEXT}`);

      $(this._thumbviewPrevious).bind("click", this._scrollLeftCallback);
      $(this._thumbviewNext).bind("click", this._scrollRightCallback);
    }
  }

  _initKeyAndMouseEvents() {
    $(this._slideshowContainer).bind("mouseenter", this._mouseEnterCallback);

    $(this._slideshowContainer).bind("mouseleave", this._mouseLeaveCallback);

    handleSwipe(this._slideshowContainer, [SWIPE_LEFT, SWIPE_RIGHT, CLICK], this._swipe);

    if (this._fullscreenEnterButton) {
      $(this._fullscreenEnterButton).bind("click", this._fullscreenEnterClickCallback);
      // consume other touch events to avoid interference with images behind
      $(this._fullscreenEnterButton).bind("mouseup mousedown touchstart touchend", (event) => {
        event.stopPropagation();
      });
    }

    $(document).bind("keydown", this._keyDownCallback);
  }

  _updateTitle(title) {
    $(this._titleContainer).html(title);
  }

  _handleFullscreenEnterButtonOpacity(show) {
    if (this._fullscreenEnterButton) {
      $(this._fullscreenEnterButton).animate(
        {
          opacity: show && !this._fullscreenController.isFullscreen() ? 0.5 : 0.0,
        },
        HOVER_ANIMATION_TIME
      );
    }
  }

  _handlePreviousNextButtonsOpacity(show) {
    if (!isUndefined(this._slideshowNext)) {
      $(this._slideshowNext).animate(
        {
          opacity: show ? 0.5 : 0.0,
        },
        HOVER_ANIMATION_TIME
      );
    }
    if (!isUndefined(this._slideshowPrevious)) {
      $(this._slideshowPrevious).animate(
        {
          opacity: show ? 0.5 : 0.0,
        },
        HOVER_ANIMATION_TIME
      );
    }
  }

  // callbacks

  _thumbClickCallback = (id) => {
    this._mibreitSlideshow.showImage(id);
  };

  _fullscreenEnterClickCallback = (event) => {
    this._fullscreenController.toggleFullscreen();
    event.stopPropagation();
  };

  _scrollLeftCallback = () => {
    this._mibreitScroller.scrollLeft(6);
  };

  _scrollRightCallback = () => {
    this._mibreitScroller.scrollRight(6);
  };

  _mouseEnterCallback = () => {
    this._handlePreviousNextButtonsOpacity(true);
    this._handleFullscreenEnterButtonOpacity(true);
  };

  _mouseLeaveCallback = () => {
    this._handlePreviousNextButtonsOpacity(false);
    this._handleFullscreenEnterButtonOpacity(false);
  };

  _swipe = (direction, x, y) => {
    switch (direction) {
      case SWIPE_LEFT:
        this._mibreitSlideshow.showNextImage();
        break;
      case SWIPE_RIGHT:
        this._mibreitSlideshow.showPreviousImage();
        break;
      case CLICK:
        this._containerClickedCallback(x, $(this._slideshowContainer).width());
        break;
      default:
    }
  };

  _imageChangedCallback = (id, title) => {
    if (!isUndefined(this._mibreitScroller)) {
      this._mibreitScroller.scrollTo(id);
    }
    if (!isUndefined(this._titleContainer)) {
      this._updateTitle(title);
    }
    this._externalImageChangedCallbacks.forEach((callback) => {
      callback(id);
    });
  };

  _fullscreenChangedCallback = (fullscreen) => {
    this._mibreitSlideshow.reinitSize();
    this._mibreitScroller.reinitSize();
    this._mibreitThumbManager.reinitSize();
    if (fullscreen) {
      $(this._fullscreenEnterButton).stop();
      $(this._fullscreenEnterButton).css({
        opacity: 0.0,
      });
    }
  };

  _containerClickedCallback = (relativeX, containerWidth) => {
    if (relativeX < containerWidth / 2) {
      this._mibreitSlideshow.showPreviousImage();
    } else if (relativeX > containerWidth / 2) {
      this._mibreitSlideshow.showNextImage();
    }
  };

  _keyDownCallback = (event) => {
    const key = event.which;
    if (key === 37) {
      // left arrow
      this._mibreitSlideshow.showPreviousImage();
    } else if (key === 39) {
      // right arrow
      this._mibreitSlideshow.showNextImage();
    } else if (key === 27) {
      // escape
      if (this._fullscreenController && this._fullscreenController.isFullscreen()) {
        this._fullscreenController.toggleFullscreen();
      }
    } else if (key === 70) {
      // f -> toggle fullscreen
      if (this._fullscreenController) {
        this._fullscreenController.toggleFullscreen();
      }
    }
  };
}
