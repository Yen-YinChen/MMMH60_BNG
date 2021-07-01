/**
 * @class ImageScaler
 * @author Michael Breitung
 * @copyright Michael Breitung Photography (www.mibreit-photo.com)
 */

import * as globals from "../tools/globals";
import { isString, isNumber } from "../tools/typeChecks";

const IMAGE_INACTIVE = "IMAGE_INACTIVE";
const IMAGE_LOADING = "IMAGE_LOADING";
const IMAGE_LOADED = "IMAGE_LOADED";

export default class ImageWrapper {
  constructor(image, limitMaxSize) {
    this._image = image;
    this._scaleMode = globals.SCALE_MODE_FITASPECT;
    this._originalWidth = parseInt(this._image.getAttribute("width"));
    this._originalHeight = parseInt(this._image.getAttribute("height"));
    if (limitMaxSize) {
      $(this._image).css({
        maxWidth: `${this._originalWidth}px`,
        maxHeight: `${this._originalHeight}px`,
      });
    }
    this._onLoadCallbackInternal = undefined;
    this._state = !this._image.hasAttribute("data-src") ? IMAGE_LOADED : IMAGE_INACTIVE;

    // wrapper flexbox for image centering
    $(this._image).wrap('<div class="mibreit-center-box"></div>');

    // disable drag
    $(this._image).on("dragstart", function () {
      return false;
    });

    // no context menu
    $(this._image).contextmenu(function () {
      return false;
    });

    // retrieve title
    if (this._image.hasAttribute(globals.TITLE_ATTRIBUTE)) {
      // we do this to ensure that title will not show up on hover
      const title = this._image.getAttribute(globals.TITLE_ATTRIBUTE);
      this._image.removeAttribute(globals.TITLE_ATTRIBUTE);
      this._image.setAttribute(globals.DATA_TITLE_ATTRIBUTE, title);
    }

    this._title = this._image.getAttribute(globals.DATA_TITLE_ATTRIBUTE);
  }

  /**
   * @return {Promise} Promise that will resolve once the image is loaded
   *         and reject, if image was already loaded (with true) or is currently loading (with false)
   */
  loadImage() {
    return new Promise((resolve, reject) => {
      if (this._isInactive()) {
        this._image.onload = () => {
          this._image.removeAttribute(globals.DATA_SRC_ATTRIBUTE);
          this._state = IMAGE_LOADED;

          if (this._onLoadCallbackInternal) {
            this._onLoadCallbackInternal();
          }

          resolve();
        };
        this._state = IMAGE_LOADING;

        this._image.setAttribute("src", this._image.getAttribute(globals.DATA_SRC_ATTRIBUTE));
      } else {
        reject(this.wasLoaded());
      }
    });
  }

  wasLoaded() {
    return this._state === IMAGE_LOADED;
  }

  getTitle() {
    return this._title;
  }

  getUrl() {
    return this._image.hasAttribute("data-src")
      ? this._image.getAttribute("data-src")
      : this._image.getAttribute("src");
  }

  applyScaleMode(containerWidth, containerHeight, scaleMode) {
    if (isNumber(containerWidth) && isNumber(containerHeight)) {
      if (isString(scaleMode)) {
        this._scaleMode = scaleMode;
      }
      switch (this._scaleMode) {
        case globals.SCALE_MODE_STRETCH:
          this._applyStretch();
          break;
        case globals.SCALE_MODE_EXPAND:
          this._applyExpand(containerWidth, containerHeight);
          break;
        case globals.SCALE_MODE_FITASPECT:
          this._applyFitAspect(containerWidth, containerHeight);
          break;
        case globals.SCALE_MODE_NONE:
        default:
          this._applyNone(containerWidth, containerHeight);
      }
    }
  }

  startZoomAnimation(targetZoom, time) {
    $(this._image).css({
      transition: `transform ${time / 1000}s linear`,
      transform: `scale(${targetZoom / 100})`,
    });
  }

  resetZoom() {
    $(this._image).css({ transition: "none", transform: "scale(1.0)" });
  }

  _applyStretch() {
    $(this._image).css({
      width: "100%",
      height: "100%",
    });
  }

  _applyExpand(containerWidth, containerHeight) {
    const aspect = this._originalWidth / this._originalHeight;
    if (containerWidth / containerHeight > aspect) {
      // fit based on width
      $(this._image).css({
        width: `${containerWidth}px`,
        height: `${containerWidth / aspect}px`,
      });
    } else {
      // fit based on height
      $(this._image).css({
        width: `${containerHeight * aspect}px`,
        height: `${containerHeight}px`,
      });
    }

    this._centerImage(containerWidth, containerHeight);
  }

  _applyFitAspect(containerWidth, containerHeight) {
    const aspect = this._originalWidth / this._originalHeight;
    if (containerWidth / containerHeight > aspect) {
      // fit based on height
      if (containerHeight <= this._originalHeight) {
        $(this._image).css({
          width: "auto",
          height: "100%",
        });
      } else {
        $(this._image).css({
          width: "auto",
          height: "auto",
        });
      }
    } else {
      // fit based on width
      if (containerWidth <= this._originalWidth) {
        $(this._image).css({
          width: "100%",
          height: "auto",
        });
      } else {
        $(this._image).css({
          width: "auto",
          height: "auto",
        });
      }
    }
    this._resetImagePosition();
  }

  _applyNone(containerWidth, containerHeight) {
    $(this._image).css({
      width: `${this._originalWidth}px`,
      height: `${this._originalHeight}px`,
    });
    this._centerImage(containerWidth, containerHeight);
  }

  _resetImagePosition() {
    $(this._image).css({
      marginLeft: "auto",
    });
    $(this._image).css({
      marginTop: "auto",
    });
  }

  _centerImage(containerWidth, containerHeight) {
    if (this._state != IMAGE_LOADED) {
      // until image is loaded, we cannot access the css width and height properly
      this._onLoadCallbackInternal = () => {
        this._centerImage(containerWidth, containerHeight);
      };
    } else {
      const width = $(this._image).width();
      const height = $(this._image).height();
      const x = (width + containerWidth) / 2 - width;
      const y = (height + containerHeight) / 2 - height;
      $(this._image).css({
        marginLeft: x,
      });
      $(this._image).css({
        marginTop: y,
      });
    }
  }

  // private helpers
  _isInactive() {
    return this._state === IMAGE_INACTIVE;
  }
}
