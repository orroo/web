


            function importerpc() {
                document.getElementById('inputpc').click();
            }

      

            function afficherPhoto(input) {
              
                var file = input.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                       
                        console.log('Chemin de la photo :', e.target.result);
                        
                    reader.readAsDataURL(file);
                }
            }
          }

            function validateFormAndSubmit() {
                var postContent = document.querySelector('.textarea').value;
                var imageFile = document.querySelector('input[name="image"]').files[0];
                var videoFile = document.querySelector('input[name="video"]').files[0];
              
                if (postContent.trim() === '' && !imageFile && !videoFile) {
                  alert('Veuillez entrer du contenu, sélectionner une image ou une vidéo.');
                  return false; 
                } else {
                  
                  return true;
                }
              }
              


           
       

    
