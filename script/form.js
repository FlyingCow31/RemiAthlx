const form = document.getElementById('forms');

form.addEventListener("submit", (event) => {
     event.preventDefault();

     const formData = new FormData(form);

     fetch("../php/sendmail.php", {
          method: 'POST',
          body: formData,
     })
     .then((res) => res.text())
     .then((data) => alert(data))
     .catch((err) => alert("Error:" + err));
});