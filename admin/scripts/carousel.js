// Select the form and input elements for the carousel
let carousel_s_form = document.getElementById('carousel_s_form');
let member_picture_inp = document.getElementById('carousel_picture_inp');

// Add event listener to the form submission for the carousel modal
carousel_s_form.addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission
    add_image(); // Function to handle the image addition
});

// Function to handle adding a carousel image
function add_image() {
    let data = new FormData();
    data.append('picture', carousel_picture_inp.files[0]);
    data.append('add_image', ''); // For server check

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    
    xhr.onload = function() {
        // Get modal and hide it
        var myModal = document.getElementById('carousel-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        // Handle response from the server
        if (this.responseText == 'inv_ing') {
            alert('error', 'Only JPG and PNG images are allowed!');
        } else if (this.responseText == 'inv_size') {
            alert('error', 'Image should be less than 2MB!');
        } else if (this.responseText == 'upd_failed') {
            alert('error', 'Image upload failed. Server Down!');
        } else {
            alert('success', 'New Image added!');
            carousel_picture_inp.value = ''; // Clear input
            get_carousel(); // Refresh carousel images
        }
    };

    // Send the form data
    xhr.send(data);
}

function get_carousel(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/carousel_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('carousel-data').innerHTML = this.responseText;
    }

    xhr.send('get_carousel')
}

function rem_image(val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText==1){
            
            alert('success', 'Image removed!');
            get_carousel();
        }
        else{
             alert('error', 'Server down!');
        }
    }
    xhr.send('rem_image'+val);
}

// Load general settings on window load
window.onload = function() {
    get_carousel(); // Load the carousel images when the page loads
};
