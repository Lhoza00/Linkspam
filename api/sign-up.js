document.getElementById('formSign-up').addEventListener('submit', async function(e){
  e.preventDefault();

  const data = {
    username: document.getElementById('userName').value,
    fullname: document.getElementById('FullName').value,
    email: document.getElementById('UserEmail').value,
    subType: document.querySelector('input[name="subType"]:checked')?.value || null,
    password: document.getElementById('password').value,
    confirmpassword: document.getElementById('confirmPassword').value
  };

  const response = await fetch("https://YOUR-API-HERE.com", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(data)
  });

  const result = await response.json();
  console.log(result);
});