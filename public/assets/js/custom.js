const checkInput = () => {
    const imageInput = document.getElementById('profile_image');
    const alertMessage = document.getElementById('alertMessage');
    if (imageInput.files.length == 0) {
        alertMessage.style.display = 'block';
    } else {}
}

$("input#profile_image").change(function () {
    if ($(this).val()) {
        alertMessage.style.display = 'none';
    }
});

$("#editAddress").on('click', () => {
    $("#addressEditForm").fadeToggle(100);
    $("#addressSpan").fadeToggle(50)
});

$("#editPhone").on('click', () => {
    $("#phoneEditForm").fadeToggle(100)
    $("#phoneSpan").fadeToggle(50)
});

$("#editSecurity").on('click', () => {
    $("#securityForm").fadeToggle(100)
});

$("#editInfo").on('click', () => {
    $("#infoSpan").fadeToggle(100)
    $("#infoForm").fadeToggle(100)
});

$("#editAddressBtn").on("click", (e) => {
    e.preventDefault();
    const address_value = $('input[name=address]').val();
    const _token = $('input[name=_token]').val();

    $("#editAddressBtn").html("Loading ...");

    $.ajax({
        method: "POST",
        url: "/profile/update/address",
        data: {
            address_value: address_value,
            _token: _token
        }, success: (data) => {
            if (data === 'updated') {
                $("#addressEditForm").fadeOut(100);
                $("#addressSpan").fadeIn(50)
                $("#editAddressBtn").html('<i class="pe-7s-check"></i>');
                $("#addressSpan").text(address_value);
            }

        }
    })
})

$("#editPhoneBtn").on("click", (e) => {
    e.preventDefault();
    const phone_value = $('input[name=phone]').val();
    const _token = $('input[name=_token]').val();

    $("#editPhoneBtn").html("Loading ...");

    $.ajax({
        method: "POST",
        url: "/profile/update/phone",
        data: {
            phone_value: phone_value,
            _token: _token
        }, success: (data) => {
            if (data === 'updated') {
                $("#phoneEditForm").fadeOut(100);
                $("#phoneSpan").fadeIn(50)
                $("#editPhoneBtn").html('<i class="pe-7s-check"></i>');
                $("#phoneSpan").text(phone_value);
            } else if (data === 'error')
            {
                alert('This Number Already Used');
            }

        }
    })
})


$("#infoBtn").on("click", (e) => {
    e.preventDefault();
    const info = $('textarea[name=info]').val();
    const _token = $('input[name=_token]').val();

    $("#infoBtn").html("Loading ...");

    $.ajax({
        method: "POST",
        url: "/profile/update/about",
        data: {
            info: info,
            _token: _token
        }, success: (data) => {
            if (data === 'updated') {
                $("#infoForm").fadeOut(100);
                $("#infoSpan").fadeIn(50)
                $("#infoBtn").html('<i class="pe-7s-check"></i>');
                $("#infoSpan").text(info);
            } else if (data === 'error')
            {
                alert('This Number Already Used');
            }

        }
    })
})


