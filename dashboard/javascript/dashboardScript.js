/* -------------------------------------------------------
>>>  Update Status
---------------------------------------------------------- */

$('.makeAdminBtn').click(function(e) {
    e.preventDefault();
    const table = $(this).attr('data-table');
    const column = $(this).attr('data-column');
    const id = $(this).attr('data-id');
    const status = $(this).attr('data-status');
    const email = $(this).closest('tr').find('.emailColumn').text();

    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200 ){
            document.getElementById('responseMessage').innerHTML = this.responseText;
            document.getElementById('responseMessage').classList.add('green-background');
            $('#responseMessage').fadeIn().delay(1000).fadeOut(function() {
                location.reload(); 
            });
        }
    }

    ajax.open("POST", "../ajax/updateStatusAjax.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(`table=${table}&column=${column}&id=${id}&status=${status}&email=${email}`);
})



// Display side bar menu dropdown

$('.sideBarMenuItem').click(function(e) {
    e.preventDefault();
    $(this).next().slideToggle('slow');
});


// Update profile page

$("#profileUpdateForm").on("submit", (e) => {
    e.preventDefault();
    $("#updateProfileBtn").html('<i class="fa-solid fa-spinner"></i> Loading...');

    const profileName = $("#profileName").val();
    const profileEmail = $("#profileEmail").val();
    const profileNumber = $("#profileNumber").val();
    const profileImgInput = $("#profileImgInput").prop('files')[0];


    const form = $('#profileUpdateForm')[0];

    const formData = new FormData(form);

    formData.append('profileName', profileName);
    formData.append('profileEmail', profileEmail);
    formData.append('profileNumber', profileNumber);
    formData.append('profileImgInput', profileImgInput);

    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            $(".messageContainer").fadeIn();
            if(this.responseText == "Successfully Updated!"){
                $(".success_msg").fadeIn();
                $(".success_msg").text(this.responseText);
            } else {
                $(".failed_msg").fadeIn();
                $(".failed_msg").text(this.responseText);
            }
            
            setTimeout(() => {
                $(".messageContainer").fadeOut();
            }, 3000);

            $("#updateProfileBtn").html('Update Profile');
        }
    }

    ajax.open("POST", "../ajax/profileUpdateAjax.php", true);
    ajax.send(formData);
})