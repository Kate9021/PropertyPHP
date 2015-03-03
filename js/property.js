window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createPropertyForm'
    //-------------------------------------------------------------------------
    var createPropertyForm = document.getElementById('createPropertyForm');
    if (createPropertyForm !== null) {
        createPropertyForm.addEventListener('submit', validatePropertyForm);
    }

    function validatePropertyForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createPropertyForm'
    //-------------------------------------------------------------------------
    var editPropertyForm = document.getElementById('editPropertyForm');
    if (editPropertyForm !== null) {
        editPropertyForm.addEventListener('submit', validatePropertyForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProperty' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteProperty');
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