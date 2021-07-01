/**
 * @class Thumbview
 * @author Michael Breitung
 * @copyright Michael Breitung Photography (www.mibreit-photo.com)
 */
import $ from "jquery";
import isElementPresent from "../tools/isElementPresent";
import {
  THUMBS,
  THUMBS_SCROLLER,
  THUMB_ELEMENT,
  NR_OF_VISIBLE_THUMBS
} from "../tools/globals";

export default class ThumbviewScroller {
  constructor() {
    this._allowMovement = false;
    this._nrOfImages = 0;
    this._nrVisibleImages = 0;
    this._midPositionId = 0;
    this._startPositionId = 0;
    this._stepSize = 1;
    this._thumbviewContainer = undefined;
    this._scroller = undefined;
    this._thumbContainers = [];
    this._newVisibleWidth = 0;
  }

  init(thumbviewContainer) {
    if (isElementPresent(thumbviewContainer)) {
      this._thumbviewContainer = thumbviewContainer;
      this._thumbContainers = $(`${thumbviewContainer} ${THUMB_ELEMENT}`);
      this._nrOfImages = this._thumbContainers.length;

      if (this._nrOfImages > 0) {
        this._thumbContainers.wrapAll(
          `<div class="${THUMBS_SCROLLER.substr(1)}" />`
        );
        $(THUMBS_SCROLLER).wrap(`<div class="${THUMBS.substr(1)}" />`);

        if ($(THUMBS).css("display") === "flex") {
          $(THUMBS).css({
            display: "block"
          });
        }

        this._scroller = $(`${thumbviewContainer} ${THUMBS_SCROLLER}`);

        this._resizeNeeded();

        // make thumbview responsive to orientation changes
        window.addEventListener(
          "orientationchange", () => {
            setTimeout(() => {
              this._resizeNeeded();
            }, 100);
          }
        );

        // make thumbview responsive to size changes
        $(window).resize(() => {
          this._resizeNeeded();
        });

        return true;
      }
    }
    return false;
  }

  reinitSize() {
    if (this._scroller) {
      this._resizeNeeded();
    }
  }

  /**
   * moves the specified thumb to start of scroller
   * @param id - id of thumb to palce at start of scroller
   */
  scrollTo(id) {
    if (this._allowMovement) {
      var newPosId = id - this._midPositionId;
      if (newPosId < 0) {
        this._startPositionId = 0;
      } else if (newPosId <= this._nrOfImages - this._nrVisibleImages) {
        this._startPositionId = newPosId;
      } else {
        this._startPositionId = this._nrOfImages - this._nrVisibleImages;
      }
      this._moveScroller(true);
    }
  }

  scrollRight(numberOfElements) {
    if (this._allowMovement) {
      var newPosId = this._startPositionId + numberOfElements;
      var maxPos = this._nrOfImages - this._nrVisibleImages;

      if (this._startPositionId == maxPos) {
        this._startPositionId = 0;
      } else if (newPosId > maxPos) {
        this._startPositionId = maxPos;
      } else {
        this._startPositionId = newPosId;
      }

      this._moveScroller(true);
    }
  }

  scrollLeft(numberOfElements) {
    if (this._allowMovement) {
      var newPosId = this._startPositionId - numberOfElements;

      if (this._startPositionId == 0) {
        this._startPositionId = this._nrOfImages - this._nrVisibleImages;
      } else if (newPosId < 0) {
        this._startPositionId = 0;
      } else {
        this._startPositionId = newPosId;
      }

      this._moveScroller(true);
    }
  }

  _moveScroller(animate) {
    if (this._scroller) {
      this._scroller.stop();
      if (animate) {
        this._scroller.animate({
            left: -this._startPositionId * this._stepSize
          },
          600
        );
      } else {
        this._scroller.css({
          left: -this._startPositionId * this._stepSize
        });
      }
    }
  }

  _resizeNeeded() {
    const newVisibleWidth = $(this._thumbviewContainer).width() - parseFloat($(":root").css("font-size")) * 8; // leave space for buttons, which take 2.5rem  
   
    if (this._newVisibleWidth !== newVisibleWidth) {
      this._newVisibleWidth = newVisibleWidth;

      $(THUMBS).css({
        width: `${this._newVisibleWidth}px`
      });

      this._stepSize = this._newVisibleWidth / NR_OF_VISIBLE_THUMBS;
      this._nrVisibleImages = Math.floor(this._newVisibleWidth / this._stepSize);

      if (this._nrOfImages <= this._nrVisibleImages) {
        this._allowMovement = false;
        this._scroller.css({
          left: (this._scroller.width() - this._stepSize * this._nrOfImages) / 2
        });
      } else {
        this._allowMovement = true;
        this._midPositionId = Math.floor(this._nrVisibleImages / 2);
      }

      this._resizeThumbs();
      this._moveScroller(false);
    }
  }

  _resizeThumbs() {
    const margin =
      parseFloat($(this._thumbContainers[0]).css("margin-left")) +
      parseFloat($(this._thumbContainers[0]).css("margin-right"));

    for (const thumb of this._thumbContainers) {
      $(thumb).css({
        width: `${this._stepSize - margin}px`,
        height: `${this._stepSize - margin}px`
      });
    }
  }
}