
const coche = {
    marca: "Renault",
    modelo: "Megane",
    color: "gris"
}

// Definición y creación de un objeto
const persona={
    nombre: "Dafne",
    apellido: "Ribera",
    edad: 21,
    nombreCompleto:function(){
        return this.nombre+' '+this.apellido;
    }
}

// Acceso a las propiedades:
document.querySelector('#pNombre').innerHTML = persona.nombre + ' ' + persona.apellido;
document.querySelector('#pEdad').innerHTML = 'Tiene '+persona.edad+' años';

// Metodos
document.querySelector('#pMetodo').innerHTML=persona.nombreCompleto();