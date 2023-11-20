const loginForm = document.getElementById('loginForm');
const loginContainer = document.getElementById('loginContainer');
const mainContent = document.getElementById('mainContent');

loginForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que el formulario se envíe
  
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  
  // Aquí deberías realizar la lógica de autenticación, por ejemplo, verificar las credenciales con una base de datos o servicio
  const isAuthenticated = (username === 'user' && password === 'password'); // Ejemplo de autenticación
  
  if (isAuthenticated) {
    loginContainer.style.display = 'none'; // Oculta el formulario de inicio de sesión
    mainContent.style.display = 'block'; // Muestra el contenido principal
  } else {
    alert('Credenciales incorrectas. Inténtalo de nuevo.'); // Mensaje de error (puedes cambiarlo por tu propia lógica)
  }
});