$(document).ready(function () {
    $('form').on('submit', function (event) {
        var emptyFields = [];
        $('#action, #place, #start, #end, #anmend, #kostenKind, #kostenWeiteresKind, #kostenLeiter').each(function () {
            if ($(this).val() === '') {
                var fieldName = $(this).attr('name');
                var fieldNameCapitalized = fieldName.charAt(0).toUpperCase() + fieldName.slice(1);
                emptyFields.push(fieldNameCapitalized);
            }
        });

        if (emptyFields.length > 0) {
            event.preventDefault();
            var message = 'Die folgenden Felder müssen ausgefüllt werden:\n';
            emptyFields.forEach(function (field) {
                message += '- ' + field + '\n';
            });
            alert(message);
        }
    });
});


