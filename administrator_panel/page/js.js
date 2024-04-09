function check(name) {
    if (name == "emp") {
        // Get the modal element
        var modal = document.getElementById("myModal");

        // Get the buttons in the modal
        var okBtn = document.getElementById("okBtn");
        var cancelBtn = document.getElementById("cancelBtn");
        var closeBtn = document.getElementById("closeBtn");

        // Function to show the modal
        function showModal() {
            modal.style.display = "block";
        }

        // Function to hide the modal
        function hideModal() {
            modal.style.display = "none";
        }

        // Event listener for the OK button
        okBtn.addEventListener("click", function () {
            alert("You clicked Decision 1");
            hideModal(); // Hide the modal after clicking the button
        });

        // Event listener for the Cancel button
        cancelBtn.addEventListener("click", function () {
            alert("You clicked Decision 2");
            hideModal();
        });

        closeBtn.addEventListener("click", function () {
            hideModal();
        });

        // Show the modal when the page loads
        showModal();



    }

}