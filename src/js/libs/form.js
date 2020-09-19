function validateText(parameter){
  let pattern = new RegExp( parameter.pattern );
  let value   = parameter.value.trim()

  if(pattern.test(value)){
    return true;
  }else{
    return false
  }
}

function validateSelect(parameter){
  if(parameter.value != '' && parameter.isValid == false){
    parameter.isValid = true
  }
}

function getDepartmentos() {
  return require('../json/ubigeo/departamentos.json');
}

function getProvincias(option) {
  let provincias = require('../json/ubigeo/provincias.json')
  this.provincias = provincias[this.departamentos[option.target.selectedIndex - 1].id_ubigeo]
  this.distritos = [];
}

function getDistritos(option) {
  let distritos = require('../json/ubigeo/distritos.json')
  this.distritos = distritos[this.provincias[option.target.selectedIndex - 1].id_ubigeo]
}

export {validateText, validateSelect, getDepartmentos, getProvincias, getDistritos}
