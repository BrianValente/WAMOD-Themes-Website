Toast = {
    makeText: function(text) {
        var existingToast = document.querySelector("body > .toast");
        if (existingToast != null) {
            existingToast.classList.add("toast_fadeQuickly");
            existingToast.classList.remove("toast");
        }

        var toast = document.createElement("div");
        toast.innerText = text;
        toast.classList.add("toast");
        toast.addEventListener("animationend", function(event){
            var toast = event.target;
            toast.parentElement.removeChild(toast);
        });
        document.body.appendChild(toast);
    }
}