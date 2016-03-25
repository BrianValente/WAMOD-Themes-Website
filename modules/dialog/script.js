var dialog = document.getElementById("dialog");
var dialogTitle = document.getElementById("dialog_title");
var dialogContent = document.getElementById("dialog_content");
var dialogCloseBtn = document.getElementById("dialog_buttons_close");
var dialogYesBtn = document.getElementById("dialog_buttons_yes");
var dialogNoBtn = document.getElementById("dialog_buttons_no");
var dialogCallback;

function showDialog(title, content, confirmation, callback) {
    if (confirmation) {
        dialogCloseBtn.style.display = "none";
        dialogYesBtn.style.display = "block";
        dialogNoBtn.style.display = "block";
        if( typeof callback == "function") dialogCallback = callback;
    } else {
        dialogCloseBtn.style.display = "block";
        dialogYesBtn.style.display = "none";
        dialogNoBtn.style.display = "none";
    }
    dialog.style.display = "block";
    dialog.style.transform = "translateX(-50%) translateY(-50%) scale(1)";
    dialog.style.opacity = "1";
    dialogTitle.innerText = title;
    dialogContent.innerHTML = content;
}

function hideDialog() {
    dialog.style.opacity = "0";
    dialog.style.transform = "translateX(-50%) translateY(-50%) scale(.85)";
    dialog.addEventListener("transitionend", dialogAnimation);
}

function dialogAnimation() {
    dialog.style.display = "none";
    dialog.removeEventListener("transitionend", dialogAnimation);
}

function hideDialog_Yes() {
    hideDialog();
    if (dialogCallback) dialogCallback();
    dialogCallback = null;
}

function yesCallback() {
    hideDialog();
    console.log("wtf");
}

dialogCloseBtn.addEventListener("click", hideDialog);
dialogNoBtn.addEventListener("click", hideDialog);
dialogYesBtn.addEventListener("click", hideDialog_Yes);

/*showDialog("Hello!", "Are you okay?", true, function() {
    alert("hi");
});*/