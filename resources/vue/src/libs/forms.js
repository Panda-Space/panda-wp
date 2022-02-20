function validateText(parameter) {
  const pattern = new RegExp(parameter.pattern);
  const value = parameter.value.trim();

  if (pattern.test(value)) {
    return true;
  }

  return false;
}

function validateSelect(parameter) {
  if (parameter.value) {
    return true;
  }

  return false;
}

export { validateText, validateSelect };
