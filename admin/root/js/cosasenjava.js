// buscar una letra en un string. usando el separador split.!
var cadena = "En un lugar de la Mancha de cuyo nombre no quiero acordarme...";
var letras = cadena.split("");
var resultado = "";
 
for(i in letras) {
  if(letras[i] == 'a') {
    break;
  }
  else {
    resultado += letras[i];
  }
}
alert(resultado);
