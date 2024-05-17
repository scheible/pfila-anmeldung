
// Each forms block can register a javascript function that checks the input
// of the form block for consistency. If no error is encountered, the function
// shall return "" otherwise it shall return an error message as string

const verifyCallbackList = [];

function registerVerifyCallback($verifyCallback) {
	verifyCallbackList.push($verifyCallback);
}

function checkForm(event) {
	let errorMessageList = "Mögliche Fehler im Formular:\n";
	let errorNumber = 0;

	for (var i=0;i<verifyCallbackList.length ; i++) {
		errorMessage = verifyCallbackList[i]();
		if (errorMessage !== "") {
			errorMessageList += errorMessage;
			errorNumber++;
		}
	}

	errorMessageList += ("\nAnmeldung trotzdem absenden?\n");

	if (errorNumber > 0) {
		if (!confirm(errorMessageList))
			event.preventDefault();
	}
}




function insertName(event) {
	name = $('#kind').val();
	firstname = name.split(/ (.*)/)[0];

	$('.nameKind').text(firstname);
}

function setRed2(fieldname) {
	let inputBox = document.getElementById(fieldname);
	inputBox.classList.add('error')
	inputBox.addEventListener('input', function() {
		this.classList.remove('error')
	})
}

function setRed(primaryField, ...otherFields) {
    let inputBox = document.getElementById(primaryField);
    inputBox.classList.add('error');

    function removeError() {
        inputBox.classList.remove('error');
        otherFields.forEach(field => {
            let otherInputBox = document.getElementById(field);
            otherInputBox.classList.remove('error');
        });
    }

    inputBox.addEventListener('input', removeError);

    otherFields.forEach(field => {
        let otherInputBox = document.getElementById(field);
        otherInputBox.addEventListener('input', removeError);
    });
}
