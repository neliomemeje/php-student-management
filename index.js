// const delBtn = document.getElementById("delete");

// delBtn.addEventListener("click", () => {
//   if (confirm("delete?")) {
//     document.getElementById("form").action = "delete.php";
//   } else {
//     document.getElementById("form").action = "";
//   }
// });

function confirmToDelete() {
  const form = document.getElementById("form");
  if (confirm("delete?")) {
    form.action = "delete.php";
  } else {
    form.action = "";
  }
}
