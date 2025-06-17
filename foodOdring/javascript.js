function showPopup() {
    document.getElementById("popup").style.display = "flex";
    setTimeout(hidePopup, 3000); // Auto hide after 3 seconds (3000 milliseconds)
  }

  function hidePopup() {
    document.getElementById("popup").style.display = "none";
  }

  