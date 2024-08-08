document.addEventListener("DOMContentLoaded", () => {


    var cpfInput = document.getElementById("cpf"); // here is the CPF ID of the input

    cpfInput.addEventListener("input", () => {
        var numeric = document.getElementById("cpf").value.replace(/[^0-9]+/g, '');
        var cpfLength = numeric.length;
    
        var partOne = numeric.slice(0, 3) + ".";
        var partTwo = numeric.slice(3, 6) + ".";
        var partThree = numeric.slice(6, 9) + "-";
    
        if (cpfLength < 4) { 
            cpfInput.value = numeric;
        } else if (cpfLength >= 4 && cpfLength < 7) {
            var formatCPF = partOne + numeric.slice(3);
            cpfInput.value = formatCPF;
        } else if (cpfLength >= 7 && cpfLength < 10) {
            var formatCPF = partOne + partTwo + numeric.slice(6);
            cpfInput.value = formatCPF;
        } else if (cpfLength >= 10 && cpfLength < 12) {
            var formatCPF = partOne + partTwo + partThree + numeric.slice(9);
            cpfInput.value = formatCPF;
        } else if (cpfLength >= 12) {
            var formatCPF = partOne + partTwo + partThree + numeric.slice(9, 11);
            cpfInput.value = formatCPF;
        }

        if (formatCPF.length == 14){
            var Soma = 0, Resto = 0, cpfValidy = true;
            var cpfNumber = formatCPF.replace(".","").replace(".","").replace("-","")
            if (cpfNumber == "00000000000") {
                cpfValidy = false;
            }
        
            for (i=1; i<=9; i++){
                Soma += parseInt(cpfNumber.substring(i-1, i)) * (11 - i);
            }
            Resto = (Soma * 10) % 11;
        
            if ((Resto == 10) || (Resto == 11))  {
                Resto = 0;
            }

            if (Resto != parseInt(cpfNumber.substring(9, 10)) ) {
                cpfValidy = false;
            }
        
            Soma = 0;
            for (i = 1; i <= 10; i++) {
                Soma += parseInt(cpfNumber.substring(i-1, i)) * (12 - i);
            }
            Resto = (Soma * 10) % 11;
        
            if ((Resto == 10) || (Resto == 11))  {
                Resto = 0;
            }
            if (Resto != parseInt(cpfNumber.substring(10, 11))) {
                cpfValidy = false;
            }
        }
        if (formatCPF.length == 14 && cpfValidy == true){
            document.getElementById("cpfVerify").value = cpfInput;
        } else{
            document.getElementById("cpfVerify").value = "";
        }
    });
});