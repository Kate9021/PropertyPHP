window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createAreaForm'
    //-------------------------------------------------------------------------
    var createAreaForm = document.getElementById('createAreaForm');
    if (createAreaForm !== null) {
        createAreaForm.addEventListener('submit', validateAreaForm);
    }

    function validateAreaForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createAreaForm'
    //-------------------------------------------------------------------------
    var editAreaForm = document.getElementById('editAreaForm');
    if (editAreaForm !== null) {
        editAreaForm.addEventListener('submit', validateAreaForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteArea' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteArea');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this property?")) {
            event.preventDefault();
        }
    }

};