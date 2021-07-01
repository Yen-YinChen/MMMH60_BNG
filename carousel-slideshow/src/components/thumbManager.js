/**
 * @class Loader
 * @author Michael Breitung
 * @copyright Michael Breitung Photography (www.mibreit-photo.com)
 */
import $ from "jquery";
import ImageWrapper from "./imageWrapper";
import {
  isUndefined
} from "../tools/typeChecks";
import isElementPresent from "../tools/isElementPresent";
import {
  BASE_Z_INDEX,
  THUMB_ELEMENT,
  SCALE_MODE_EXPAND
} from "../tools/globals";

export default class ThumbManager {
  constructor() {
    this._thumbWrappers = undefined;
    this._thumbContainers = undefined;
    this._currentThumbWidth = 0;
    this._currentThumbHeight = 0;
  }

  init(thumbviewContainer, thumbClickCallback) {
    if (isElementPresent(thumbviewContainer)) {
      this._thumbContainers = $(
        `${thumbviewContainer} ${THUMB_ELEMENT}`
      );
      const images = $(`${thumbviewContainer} ${THUMB_ELEMENT} > img`);

      if (this._thumbContainers.length > 0 && this._thumbContainers.length === images.length) {
        this._thumbWrappers = this._wrapThumbs(images);

        this._ensureThumbContainerZIndex(thumbviewContainer);

        if (!isUndefined(thumbClickCallback)) {
          this._setupClickEvents(thumbClickCallback);
        }

        this._setScaleModeForThumbs();
        this._preloadThumbs();

        // make thumbview responsive to size changes
        $(window).resize(() => {
          this._setScaleModeForThumbs();
        });
      }
    }
  }

  reinitSize() {
    if (this._thumbWrappers) {
      this._setScaleModeForThumbs();
    }
  }

  _wrapThumbs(images) {
    let thumbWrappers = [];
    for (let i = 0; i < images.length; i++) {
      thumbWrappers.push(new ImageWrapper(images[i]));
    }
    return thumbWrappers;
  }

  _ensureThumbContainerZIndex(thumbviewContainer) {
    if (!$(thumbviewContainer).has("z-index")) {
      $(thumbviewContainer).css({
        "z-index": BASE_Z_INDEX
      });
    }
  }

  _setupClickEvents(thumbClickCallback) {
    for (let i = 0; i < this._thumbContainers.length; i++) {
      $(this._thumbContainers[i]).bind(
        "click", {
          id: i
        },
        function (e) {
          thumbClickCallback(e.data.id);
        }
      );
    }
  }

  _setScaleModeForThumbs() {
    const thumbWidth = this._thumbContainers.width();
    const thumbHeight = this._thumbContainers.height();

    if (this._currentThumbHeight !== thumbHeight || this._currentThumbWidth !== thumbWidth) {

      this._currentThumbHeight = thumbHeight;
      this._currentThumbWidth = thumbWidth;
      for (const wrapper of this._thumbWrappers) {
        wrapper.applyScaleMode(thumbWidth, thumbHeight, SCALE_MODE_EXPAND);
      }
    }

  }

  _preloadThumbs() {
    for (const wrapper of this._thumbWrappers) {
      wrapper.loadImage().catch(() => { // NOTHING
      });
    }
  }
}

// export default function (thumbviewContainer, thumbClickCallback) {
//   const loader = new Loader();
//   return loader.init(thumbviewContainer, thumbClickCallback);
// }