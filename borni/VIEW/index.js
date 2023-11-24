function validateFormAndSubmit() {
    var postContent = document.querySelector('.comment-form textarea').value.trim();

    if (postContent === '') {
        alert('Veuillez entrer du contenu.');
        return false; // Empêche le formulaire de se soumettre
    } else {
        // Si la validation réussit, soumettez le formulaire
        return true;
    }
}