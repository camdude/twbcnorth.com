$(document).ready(function() {
    var direct = document.getElementById("direct");
    var cheque = document.getElementById("cheque");
    direct.style.display = "none";
    cheque.style.display = "none";

    $("#paySelect").change(function() {
        direct.style.display = "none";
        direct.style.border = "none";
        cheque.style.display = "none";
        cheque.style.border = "none";
        document.getElementById("comment").placeholder = "";
        document.getElementById("comment").required = false;

        var paySelect = document.getElementById("paySelect");
        var option = paySelect.options[paySelect.selectedIndex].value;
        switch (option) {
            case "Direct deposit":
                direct.style.display = "block";
                direct.style.border = "5px solid var(--primary-theme-colour)";
                break;
            case "Cheque in post":
                cheque.style.display = "block";
                cheque.style.border = "5px solid var(--primary-theme-colour)";
                break;
            case "Cash to committee member":
                document.getElementById("comment").placeholder = "Please the specify committee member you will give cash to";
                document.getElementById("comment").required = true;
                break;
            default:

        }
    });
});
