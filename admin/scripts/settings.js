

    let general_data, contacts_data;

    let general_s_form = document.getElementById('general_s_form');
    let site_title_inp = document.getElementById('site_title_inp');
    let site_about_inp = document.getElementById('site_about_inp');

    let contacts_s_form =document.getElementById('contacts_s_form');

    let team_s_form = document.getElementById('team_s_form');
    let member_name_inp = document.getElementById('member_name_inp');
    let member_picture_inp = document.getElementById('member_picture_inp')

    // Fetch general settings data
    function get_general() {
        let site_title = document.getElementById('site_title');
        let site_about = document.getElementById('site_about');  // Fixed the ID reference here
        let shutdown_toggle = document.getElementById('shutdown-toggle');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            // console.log('Response Length:', this.responseText.length); // Check for extra characters

            general_data = JSON.parse(this.responseText);
            // Check if general_data is valid
            // console.log(general_data);
            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;

            site_title_inp.value = general_data.site_title;
            site_about_inp.value = general_data.site_about;

            if (general_data.shutdown == 0) {
                shutdown_toggle.checked = false;
                shutdown_toggle.value = 0;
            } else {
                shutdown_toggle.checked = true;
                shutdown_toggle.value = 1;
            }
        };
        xhr.send('get_general');
    }

    // Update general settings
    function upd_general(site_title_val, site_about_val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            console.log(this.responseText);
            var myModal = document.getElementById('general-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Changes saved!');
                get_general();
            } else {
                alert('error', 'No Changes made!');
            }
        };

        // Send the request with updated site_title and site_about values
        xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
    }

    // Handle shutdown toggle
    function upd_shutdown(val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            console.log(this.responseText);
            if (this.responseText == 1 && general_data.shutdown == 0) {
                alert('success', 'Site has been shutdown!');
            } else {
                alert('success', 'Shutdown mode off!');
            }
            get_general();
        };

        // Send the request with updated shutdown value
        xhr.send('upd_shutdown=' + val);
    }

      // Event listener for form submission
      general_s_form.addEventListener('submit', function(e) {
        e.preventDefault();
        upd_general(site_title_inp.value, site_about_inp.value);
    });

    // Fetch contact settings data
    function get_contacts() {
        let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2'];

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            contacts_data = JSON.parse(this.responseText);
            contacts_data = Object.values(contacts_data);
            // console.log(contacts_data);

            for(i=0;i<contacts_p_id.length;i++){
                document.getElementById(contacts_p_id[i]).innerText =contacts_data[i+1];
            }
            contacts_inp(contacts_data);

            // You can loop through `contacts_p_id` and assign data as needed here
        };
        xhr.send('get_contacts');

    }

    function contacts_inp(data)
    {
        let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp'];

        for(i=0;i<contacts_inp_id.length;i++){
            document.getElementById(contacts_inp_id[i]).value = data[i+1];
        }


    }
    // Load general and contact settings on page load

    contacts_s_form.addEventListener('submit',function(e){
        e.preventDefault();
        upd_contacts();
    });

    function upd_contacts() {
    let index = ['address', 'gmap', 'pn1', 'pn2'];
    let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp'];

    let data_str = "";

    for (i = 0; i < index.length; i++) {
        data_str += index[i] + "=" + encodeURIComponent(document.getElementById(contacts_inp_id[i]).value) + '&';
    }
    data_str += "upd_contacts";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var myModal = document.getElementById('contacts-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
            get_contacts();
        } else {
            alert('error', 'No Changes made!');
        }
    };

    xhr.send(data_str);
}

    team_s_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_member();
    });

    // function setActive() {
    //     let navbar = document.getElementById('dasboard-menu');
    //     if (!navbar) {
    //         console.warn("Navbar element with ID 'dasboard-menu' not found.");
    //         return;
    //     }
    
    //     let a_tags = navbar.getElementsByTagName('a');
    
    //     for (let i = 0; i < a_tags.length; i++) {
    //         let file = a_tags[i].href.split('/').pop();
    //         let file_name = file.split('.')[0];
    
    //         if (document.location.href.indexOf(file_name) >= 0) {
    //             a_tags[i].classList.add('active');
    //         }
    //     }
    // }
    
    
    function add_member() {
        let data = new FormData();
        data.append('name', member_name_inp.value);
        data.append('picture', member_picture_inp.files[0]);
        data.append('add_member', '');
    
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
    
        xhr.onload = function() {
            //  console.log(this.responseText);
            var myModal = document.getElementById('team-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
    
            if (this.responseText == 'inv_img') {
                alert('error', 'Only JPG and PNG images are allowed!');
            } else if (this.responseText == 'inv_size') {
                alert('error', 'Image should be less than 2MB!');
            } else if (this.responseText == 'upd_failed') {
                alert('error', 'Image upload failed. Server Down!');
            } else {
                alert('success', 'New member added!');
                member_name_inp.value = '';
                member_picture_inp.value = '';
                get_members();
            }
        };
    
        // Send the request with the form data
        xhr.send(data);
    }

    function get_members()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
              document.getElementById('team-data').innerHTML = this.responseText;
        };
        xhr.send('get_members');
    }

    function rem_member(val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if(this.responseText==1){
                alert('success','Member removed!');
                get_members();
            }else{
                alert('error','server down!');
            }
        }
        xhr.send('rem_member='+val);
    }

    window.onload = function() {
        get_general();
        get_contacts();
        get_members();
    };
