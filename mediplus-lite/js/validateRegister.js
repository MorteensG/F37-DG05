function validateRegister() {
    document.getElementById('register').addEventListener('submit', function(e) {
      // Prevent the default form submission
      
  
      // Get values from the form inputs
      const firstName = document.getElementById('firstname').value.trim();
      const lastName = document.getElementById('lastname').value.trim();
      const email = document.getElementById('register_email').value.trim();
      const password = document.getElementById('register_password').value;
      const confirmPassword = document.getElementById('confirm_password').value;
  
      // Check if all fields are filled out
      if (!firstName || !lastName || !email || !password || !confirmPassword) {
        alert('Please fill out all fields.');
        return false;
      }
  
      // Validate email format
      if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        return false;
      }
  
      // Check if password is at least 8 characters
      if (password.length < 8) {
        alert('Your password must be at least 8 characters long.');
        return false;
      }
  
      // Check if passwords match
      if (password !== confirmPassword) {
        alert('Your passwords do not match.');
        return false;
      }
  
      // If all validations pass, submit the form
      return true;;
    });
  };
  
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }
  