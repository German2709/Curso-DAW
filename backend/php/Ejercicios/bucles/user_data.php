<style>
@import url(https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0);

div{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

table {
    border: 2px solid black;
    border-collapse: collapse;
}

th {
    background-color: #aabbcc;
    border: 2px solid black;
    padding: 2px 5px;
}

td {
    border: 1px solid black;
    padding: 2px 5px;
    font-family: Verdana;
    user-select: none;
    height: 3px;
}
.option{
    text-align: center;
}

tr:hover{
    background-color: lightblue;
}

.btn {
    appearance: none;
    background-color: transparent;
    border: 2px solid #1A1A1A;
    border-radius: 15px;
    box-sizing: border-box;
    color: #3B3B3B;
    cursor: pointer;
    display: inline-block;
    font-family: 'Mochiy Pop One', sans-serif;
    font-size: 16px;
    line-height: normal;
    margin: 30px 10px;
    min-height: 20px;
    min-width: 0;
    outline: none;
    padding: 15px 15px;
    text-align: center;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    list-style: none;
}

.btn:disabled {
    pointer-events: none;
}

.btn:hover {
    color: #fff;
    background-color: #1A1A1A;
    box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
    transform: translateY(-2px);
}

.btn:active {
    box-shadow: none;
    transform: translateY(0);
}
</style>