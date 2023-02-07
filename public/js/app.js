const observer = new IntersectionObserver((entry) => {
    const elem = entry[0];
    if (elem.isIntersecting) elem.target.classList.add("show");
});
const hiddenElem = document.querySelector(".hidden");
if (hiddenElem) observer.observe(hiddenElem);

let createPost_switcher = true;
let editPost_flag = false; // prevent createPost window activation in case editPost window is active

const createPost = document.getElementById("create-post");
if (createPost) {
    createPost.addEventListener("click", () => {
        const modal = document.querySelectorAll(".create-modal");
        if (!editPost_flag) {
            if (createPost_switcher) activeModal(modal);
            else inactiveModal(modal);
        }
    });
}
const editPost = document.getElementById("edit-post");
if (editPost) {
    editPost.addEventListener("click", () => {
        const modal = document.querySelectorAll(".edit-modal");
        editPost_flag = true;
        activeModal(modal);
    });
}

const createClose_btn = document.getElementById("create-close-btn");
if (createClose_btn) {
    createClose_btn.addEventListener("click", () => {
        const modal = document.querySelectorAll(".create-modal");
        inactiveModal(modal);
    });
}
const editClose_btn = document.getElementById("edit-close-btn");
if (editClose_btn) {
    editClose_btn.addEventListener("click", () => {
        const modal = document.querySelectorAll(".edit-modal");
        editPost_flag = false;
        inactiveModal(modal);
    });
}

function activeModal(modal) {
    if (modal == null) return;
    modal.forEach((elem) => elem.classList.add("active"));
    createPost_switcher = false;
}
function inactiveModal(modal) {
    if (modal == null) return;
    modal.forEach((elem) => elem.classList.remove("active"));
    createPost_switcher = true;
}

// alert message window
const alert = document.querySelector(".alert-msg");
if (alert) {
    const alert_CloseButton = document.getElementById("x-btn");
    alert_CloseButton.addEventListener("click", () => {
        alert.style.display = "none";
    });
    setTimeout(() => {
        alert.style.display = "none";
    }, 10000); // 10s
}

// logut form submission
function submitLogoutForm() {
    const logoutForm = document.getElementById("logoutFormSubmit");
    logoutForm.submit();
}

// delete-comment form submission
function deleteCommentForm() {
    const deletecommentFrom = document.getElementById("deleteCommFormSubmit");
    deletecommentFrom.submit();
}

// commentTXT is the comment content that the user want to edit
// commentID is comment identifier
function editCommentForm(commentTXT, commentID) {
    // disappearing create-comment-form
    const createCommentFormDiv = document.getElementById(
        "createCommentFormDiv"
    );
    createCommentFormDiv.style.display = "none";
    // appearing edit-comment-form
    const editCommentFormDiv = document.getElementById("editCommentFormDiv");
    editCommentFormDiv.classList.add("active");

    // getting edit-form textArea input field
    const edit_textArea = document.getElementById("edit-txt-area");
    // getting edit-form commentId input field
    const message_id = document.getElementById("comment_id");
    // inserting passed function's values into edit-form input fields that we got
    message_id.value = commentID;
    edit_textArea.value = commentTXT;
    // scrolling to edit-form section
    edit_textArea.scrollIntoView();
    edit_textArea.focus();
}
