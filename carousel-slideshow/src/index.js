import "./css/mibreit-gallery.css";
import "./css/mibreit-slideshow.css";
import "./css/mibreit-thumbview.css";

import "./images/image-placeholder-transparent.png";

import { isUndefined } from "./tools/typeChecks";

import GalleryBuilder from "./components/gallery";

export {
  SCALE_MODE_STRETCH,
  SCALE_MODE_FITASPECT,
  SCALE_MODE_NONE,
  SCALE_MODE_EXPAND,
} from "./tools/globals";

export function createSlideshow(config) {
  if (isUndefined(config)) {
    throw Error("createSlideshow Error: No Config was provided");
  }

  const slideshowBuilder = new GalleryBuilder(config.slideshowContainer)
    .withInterval(config.interval)
    .withZoom(config.zoom)
    .withPreloaderLeftSize(config.preloaderLeftNr)
    .withPreloaderRightSize(config.preloaderRightNr)
    .withScaleMode(config.imageScaleMode);

  const slideshow = slideshowBuilder.buildSlideshow();

  if (!slideshow.isInitialized()) {
    throw Error("createSlideshow Error: invalid html structure");
  }

  return slideshow;
}

export function createGallery(config) {
  if (isUndefined(config)) {
    throw Error("createGallery Error: No Config was provided");
  }

  const galleryBuilder = new GalleryBuilder(config.slideshowContainer)
    .withInterval(config.interval)
    .withPreloaderLeftSize(config.preloaderLeftNr)
    .withPreloaderRightSize(config.preloaderRightNr)
    .withScaleMode(config.imageScaleMode)
    .withFullscreen(config.allowFullscreen)
    .withThumbviewContainer(config.thumbviewContainer)
    .withTitleContainer(config.titleContainer);

  const gallery = galleryBuilder.buildGallery();

  if (!gallery.init()) {
    throw Error("createGallery Error: invalid html structure");
  }

  return gallery;
}
