


var tambah = document.getElementsByClassName('tombol-tambah')
var kurang = document.getElementsByClassName('tombol-kurang')

for(var i = 0; i<tambah.length; i++){
    var button = tambah[i];
    button.addEventListener('click', function(event){
        var buttonClicked = event.target;
        var input = buttonClicked.parentElement.children[1];
        // console.log(input);
        var inputValue = input.value;
        // console.log(inputValue);
        var newValue = parseInt(inputValue) + 1;
        // console.log(newValue)
        input.value = newValue;
    })

    var buttonDec = kurang[i];
    buttonDec.addEventListener('click', function(event){
        var buttonClicked = event.target;
        var input = buttonClicked.parentElement.children[1];
        // console.log(input);
        var inputValue = input.value;
        // console.log(inputValue);
        if(inputValue > 0){
            var newValue = parseInt(inputValue) - 1;
            // console.log(newValue)
            input.value = newValue;
        }
    })
}

function enable(){
    var setCheckbox1 = document.getElementById("check");
    var setCheckbox2 = document.getElementById("check2");
    var btn = document.getElementById("btn");
    if(setCheckbox1.checked && setCheckbox2.checked){
        btn.removeAttribute("disabled");
    }else{
        btn.disabled = "true";
    }
}