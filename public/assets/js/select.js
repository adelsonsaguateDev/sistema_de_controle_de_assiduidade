//Script responsável por permitir o select fazer pesquisas

$(document).ready(function () {
    
    var componentSelect = document.getElementsByClassName("select2");

    for (i = 0; i < componentSelect.length; ++i) {
        var element = componentSelect[i];
        new Choices(element, {
            placeholderValue: "",
            searchPlaceholderValue: "",
        });
    }
});
