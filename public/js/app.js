document
    .getElementById("filter_company_id")
    .addEventListener("change", function () {
        var company_id = this.value || this.options[this.selectedIndex].value;
        window.location.href =
            window.location.href.split("?")[0] + "?company_id=" + company_id+"&search="+document.getElementById("search").value;
    });

document.querySelectorAll(".btn-delete").forEach(function (btn) {
    btn.addEventListener("click", function (event){
        event.preventDefault();
        if (confirm("Are you sure you want to delete this item?")) {
            let action = this.getAttribute("href");
            let form = document.getElementById("form-delete");
            form.setAttribute("action", action);
            form.submit();

        }
    })
});

document.getElementById("btn-clear").addEventListener("click", function (event) {
    event.preventDefault();
    document.getElementById("filter_company_id").value = "";
    document.getElementById("search").value = "";
   
    window.location.href = window.location.href.split("?")[0];
});
const toggleClearButton = () => {
    let company_id =document.getElementById("filter_company_id").value;
    let search = document.getElementById("search").value;
    if (company_id || search) {
        document.getElementById("btn-clear").style.display = "block";
    } else {
        document.getElementById("btn-clear").style.display = "none";
    }
}
toggleClearButton();
    


