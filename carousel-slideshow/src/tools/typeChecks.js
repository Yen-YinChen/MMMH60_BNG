export function isUndefined(value) {
  return typeof value === "undefined" || value === undefined;
}

export function isFunction(value) {
  return typeof value === "function";
}

export function isString(value) {
  return typeof value === "string" || value instanceof String;
}

export function isNumber(value) {
  return typeof value === "number" && isFinite(value);
}

export function isArray(value) {
  return Array.isArray(value);
}

export function isBoolean(value) {
  return typeof value === "boolean";
}

export function isObject(value) {
  return value && typeof value === "object" && value.constructor === Object;
}

export function isEmptyObject(value) {
  return isObject(value) && Object.keys(value).length === 0;
}

export function isSymbol(value) {
  return typeof value === "symbol";
}
