document.addEventListener("DOMContentLoaded", function () {
  const deleteBtns = document.querySelectorAll(".delete-btn");
  const modal = document.getElementById("confirmModal");
  const confirmYes = document.getElementById("confirmYes");
  const confirmNo = document.getElementById("confirmNo");

  let currentForm = null;

  deleteBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      currentForm = btn.closest("form");   
      modal.style.display = "flex";   
    });
  });

  confirmYes.addEventListener("click", () => {
    if (currentForm) {
      modal.style.display = "none"; 
      currentForm.submit();         
    }
  });

  confirmNo.addEventListener("click", () => {
    modal.style.display = "none"; 
    currentForm = null;
  });

  // click ra ngoài modal thì đóng
  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
      currentForm = null;
    }
  });
});
