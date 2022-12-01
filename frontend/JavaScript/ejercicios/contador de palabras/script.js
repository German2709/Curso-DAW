// // declaramos las variables
let inputTextArea=document.getElementById("input-textarea");
let characCount=document.getElementById("charac-count");
let wordCount=document.getElementById("word-count");

inputTextArea.addEventListener("input",()=>{
    // en la constante "characCount.textContent" guardamos el numero de letras "inputTextArea.value.length"
    characCount.textContent = inputTextArea.value.length;
    // le decimos que a la constante inputTextArea le guarde el numero de letras pero sin espacios. con trim().
    let txt = inputTextArea.value.trim();
    // la constante wordCount utiliza la varia txt y slipt lo combierte en un array y con filter filtro cada palabra y la suma
    wordCount.textContent=txt.split(/\s+/).filter((item)=>item).length;
})