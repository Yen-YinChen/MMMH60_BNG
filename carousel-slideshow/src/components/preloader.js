/**
 * @class Preloader
 * @author Michael Breitung
 * @copyright Michael Breitung Photography (www.mibreit-photo.com)
 */

import {
  isUndefined
} from "../tools/typeChecks";

const PRELOAD_RIGHT_SIZE = 7;
const PRELOAD_LEFT_SIZE = 3;

export default class Preloader {
  /**
   * @param {Array<string>} imageWrappers array of ImageWrapper objects, which contain the images to preload
   * @param {number} currentIndex currently active image
   * @param {number} preloadLeftNr Optional - number of images to preload before currentIndex
   * @param {number} preloadRightNr Optional - number of images to preload after currentIndex} 
   */
  constructor(imageWrappers, currentIndex, preloadLeftNr, preloadRightNr) {
    this._currentIndex = currentIndex;
    this._imageWrappers = imageWrappers;
    this._loadedCount = this._getLoadedCount(imageWrappers);
    this._preloadLeftNr = PRELOAD_LEFT_SIZE;
    if (!isUndefined(preloadLeftNr)) {
      this._preloadLeftNr = preloadLeftNr;
    }

    this._preloadRightNr = PRELOAD_RIGHT_SIZE;
    if (!isUndefined(preloadRightNr)) {
      this._preloadRightNr = preloadRightNr;
    }
  }

  setCurrentIndex(newIndex) {
    if (this._currentIndex != newIndex) {
      this._currentIndex = newIndex;
      this._moveWindow();
    }
  }

  /** 
   * Will directly load an image without changing the window of loaded images. This 
   * has to be handled separately by setCurrentIndex
   *     
   * @return {Promise} Promise that will resolve with true once the image is loaded
   *         or will resolve right away with false, if the image is in loading state; 
   *         It will reject an invalid index
   */
  loadImage(index) {
    return new Promise((resolve, reject) => {
      if (index >= 0 && index < this._imageWrappers.length) {
        this._imageWrappers[index].loadImage().then(() => {
          this._loadedCount++;
          resolve(true);
        }).catch((wasLoaded) => {
          // ending up here means that the image is either already loaded or in loading state -> resolve
          resolve(wasLoaded);
        });
      } else {
        // this is an invalid action and should be rejected
        reject();
      }
    });
  }

  _moveWindow() {
    if (this._loadedCount < this._imageWrappers.length) {
      let start = this._currentIndex - this._preloadLeftNr;
      let end = this._currentIndex + this._preloadRightNr;

      // ensures that the current image is loaded first and then we fill the window to the right
      this._loadImages(
        this._currentIndex,
        end < this._imageWrappers.length ? end : this._imageWrappers.length
      );
      // and then from the left to current image
      this._loadImages(start >= 0 ? start : 0, this._currentIndex);
      // finally we handle overflow
      if (start < 0) {
        start = this._imageWrappers.length + start;
        this._loadImages(start, this._imageWrappers.length);
      }

      if (end >= this._imageWrappers.length) {
        end = end - this._imageWrappers.length;
        this._loadImages(0, end);
      }
    }
  }

  _loadImages(start, end) {
    for (let i = start; i < end && i < this._imageWrappers.length; i++) {
      this.loadImage(i);
    }
  }

  _getLoadedCount(imageWrappers) {
    let loadedCount = 0;
    for (const imageWrapper of imageWrappers) {
      if (imageWrapper.wasLoaded()) {
        loadedCount++;
      }
    }
    return loadedCount;
  }
}