import {
  isString
} from "./typeChecks";

export default function isElementPresent(element) {
  return isString(element) && $(element).length > 0;
}