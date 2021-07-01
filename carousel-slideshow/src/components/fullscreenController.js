/**
 * @class FullscreenController
 * @author Michael Breitung
 * @copyright Michael Breitung Photography (www.mibreit-photo.com)
 */

import {
  REGULAR_CLASS,
  REGULAR_THUMB_CLASS,
  REGULAR_TITLE_CLASS,
  FULLSCREEN_CLASS,
} from "../tools/globals";
import isElementPresent from "../tools/isElementPresent";
import closeFullscreenSvg from "../images/close.svg";

const WIDTH_100_CLASS = "width-100";
const FLEX_GROW_1_CLASS = "flex-grow-1";
const FLEX_GROW_0_CLASS = "flex-grow-0";

export default class FullscreenController {
  constructor() {
    this._slideshowContainer = undefined;
    this._thumbviewContainer = undefined;
    this._isFullscreen = false;
    this._fullscreenChangedCallback = undefined;
  }

  init(slideshowContainer, thumbviewContainer, titleContainer, fullScreenChangedCallback) {
    if (isElementPresent(slideshowContainer)) {
      this._slideshowContainer = slideshowContainer;

      // following are optional, so we don't check their presence
      this._thumbviewContainer = thumbviewContainer;
      this._titleContainer = titleContainer;
      this._fullscreenChangedCallback = fullScreenChangedCallback;

      return true;
    }
    return false;
  }

  isFullscreen() {
    return this._isFullscreen;
  }

  toggleFullscreen = () => {
    if (this._isFullscreen) {
      $(this._slideshowContainer).appendTo(REGULAR_CLASS);
      $(this._slideshowContainer).removeClass(WIDTH_100_CLASS);
      $(this._slideshowContainer).removeClass(FLEX_GROW_1_CLASS);

      if (isElementPresent(this._thumbviewContainer)) {
        $(this._thumbviewContainer).appendTo(REGULAR_THUMB_CLASS);
        $(this._thumbviewContainer).removeClass(FLEX_GROW_0_CLASS);
      }
      if (isElementPresent(this._titleContainer)) {
        $(this._titleContainer).appendTo(REGULAR_TITLE_CLASS);
        $(this._titleContainer).removeClass(FLEX_GROW_0_CLASS);
      }
      $(FULLSCREEN_CLASS).remove();
      this._isFullscreen = false;
    } else {
      this._isFullscreen = true;

      if ($(REGULAR_CLASS).length === 0) {
        this.createRegularWrapper();
      }

      $("body").append(
        `<div class="${FULLSCREEN_CLASS.substr(1)}"><div class='exit-fullscreen'>${closeFullscreenSvg}</div></div>`
      );
      $(".exit-fullscreen").click(this.toggleFullscreen);

      $(this._slideshowContainer).appendTo(FULLSCREEN_CLASS);
      $(this._slideshowContainer).addClass(WIDTH_100_CLASS);
      $(this._slideshowContainer).addClass(FLEX_GROW_1_CLASS);

      if (isElementPresent(this._thumbviewContainer)) {
        $(this._thumbviewContainer).appendTo(FULLSCREEN_CLASS);
        $(this._thumbviewContainer).addClass(FLEX_GROW_0_CLASS);
      }
      if (isElementPresent(this._titleContainer)) {
        $(this._titleContainer).appendTo(FULLSCREEN_CLASS);
        $(this._titleContainer).addClass(FLEX_GROW_0_CLASS);
      }
    }

    if (this._fullscreenChangedCallback) {
      this._fullscreenChangedCallback(this._isFullscreen);
    }
    return this._isFullscreen;
  };

  /** attach regular wrapper, which is used as placeholder for gallery until we deactivate fullscreen again */
  createRegularWrapper() {
    $(this._slideshowContainer).wrap(`<div class="${REGULAR_CLASS.substr(1)}"></div>`);
    if (isElementPresent(this._thumbviewContainer)) {
      $(this._thumbviewContainer).wrap(`<div class="${REGULAR_THUMB_CLASS.substr(1)}"></div>`);
    }
    if (isElementPresent(this._titleContainer)) {
      $(this._titleContainer).wrap(`<div class="${REGULAR_TITLE_CLASS.substr(1)}"></div>`);
    }
  }
}
