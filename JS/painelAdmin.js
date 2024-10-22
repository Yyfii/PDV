function openNav(){
    document.getElementById("mySidenav").style.width = "40vmin"; 
  document.getElementById("overlay").style.display = "block"; // Show the overlay
  
  }
  
  function closeNav(){ document.getElementById("mySidenav").style.width = "0";   document.getElementById("overlay").style.display = "none"; // Hide the overlay
  
  }
  document.addEventListener('DOMContentLoaded', () => {
    const getHours = () => {
      const clock = document.getElementsByClassName('time')[0];
      if (clock) {
        const date = new Date();
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Adiciona 1, pois o mês começa em 0
        const year = date.getFullYear();
        
        clock.innerHTML =`Hora:${hours}:${minutes}:${seconds} 
        Data: ${day}/${month}/${year}`;
        
      } else {
        console.error("Element with class 'clock' not found.");
      }
    }
  
    setInterval(getHours, 1000);
  });