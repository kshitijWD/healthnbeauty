function srbSweetAlret(msg, swicon) {
  const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
  });

  Toast.fire({
      icon: swicon,
      title: msg
  });
}

$(document).on("submit", ".contact-from", function () {
    $.ajax({
      type: "POST",
      url: "ajax/contact.php",
      processData: false,
      contentType: false,
      data: new FormData(this),
      beforeSend: function () {
        $("#contbtn").attr("disabled", "disabled");
        $("#contbtn").text("Please Wait..");
      },
      complete: function () {
        $("#contbtn").removeAttr("disabled", "disabled");
        $("#contbtn").text("SUBMIT FORM");
      },
      success: function (data) {
        data = JSON.parse(data);
        if (data.status) {
          swicon = "success";
          msg = data.message;
          srbSweetAlret(msg, swicon);
          $(".contact-from")[0].reset();
        } else {
          swicon = "warning";
          msg = data.message;
          srbSweetAlret(msg, swicon);
        }
      },
    });
  });