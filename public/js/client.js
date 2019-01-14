//handle form submission via ajax
$('#client-search-form').on('submit', function(e) {
    //validate input
    var type = $('#client-option-select').val();
    var value = $('#client-search-term').val();

    if(type == "id" && ( isNaN(value) || value.length == 0 )) {
        alert('To search by ID, you must provide a number!');
        e.preventDefault();
    } else if(!value.length) {
        alert('A search term is required!');
        e.preventDefault();
    }
});