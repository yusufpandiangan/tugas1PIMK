//Validasi Username
var usernameInput = document.getElementById('username-input');
var regex1 = /^[a-zA-Z0-9]+$/;

usernameInput.addEventListener('input', function() {
    if (!regex1.test(usernameInput.value)) {
      usernameInput.setCustomValidity('Username tidak boleh menggunakan simbol, dan spasi');
    } else {
      usernameInput.setCustomValidity('');
    }
  });

// Validasi Input Email
var emailInput = document.getElementById('email-input');
var regex2 = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

emailInput.addEventListener('input', function() {
  if (!regex2.test(emailInput.value)) {
    emailInput.setCustomValidity('Email tidak valid');
  } else {
    emailInput.setCustomValidity('');
  }
});

//Validasi Format No. Telp
var numberInput = document.getElementById('nomor-input');
var regex3 = /^(\+62|0)\d{9,12}$/;

numberInput.addEventListener('input', function() {
    if (!regex3.test(numberInput.value)) {
      numberInput.setCustomValidity('Gagal, Input Nomor anda dengan benar');
    } else {
      numberInput.setCustomValidity('');
    }
  });

//Validasi Input Password
var passwordInput = document.getElementById('password-input');
var regex4 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

passwordInput.addEventListener('input', function() {
  if (!regex4.test(passwordInput.value)) {
    passwordInput.setCustomValidity('Password harus terdiri dari minimal 8 karakter, setidaknya satu huruf besar, satu huruf kecil, dan satu angka');
  } else {
    passwordInput.setCustomValidity('');
  }
});
  //hidepass
  function myFunction() {
    var x = document.getElementById("password-input");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

// validasi Kode Pos
var kodePosInput = document.getElementById('kodePos-input');
var regex5 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

kodePosInput.addEventListener('input', function() {
    if (!regex5.test(kodePosInput.value)) {
      kodePosInput.setCustomValidity('Input Menggunakan 5 angka');
    } else {
      kodePosInput.setCustomValidity('');
    }
  });