document.getElementById('formLogin').addEventListener('submit', async function(e){
  e.preventDefault();

  const data = {
    username: document.getElementById('userName').value,
    password: document.getElementById('userPassword').value
  };

  try{

    const response = await fetch('https://YOURDOMAIN.com/api/login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      credentials: 'include',
      body: JSON.stringify(data)
    });

    const result = await response.json();

    console.log(result);

    if(result.success){

      localStorage.setItem('authToken', result.token);

      window.location.href = 'Profile.php';

    } else {

      alert(result.message);

    }

  } catch(error){

    console.error(error);
    alert('Server error');

  }

});