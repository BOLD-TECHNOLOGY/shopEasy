function showLoadingModal() {
    var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
    loadingModal.show();
}

// Function to hide loading modal
function hideLoadingModal() {
    var loadingModal = bootstrap.Modal.getInstance(document.getElementById('loadingModal'));
    if (loadingModal) {
        loadingModal.hide();
    }
}

// Delete confirmation function
function confirmDelete() {
    // Add your delete logic here
    showLoadingModal();
    
    // Simulate API call
    setTimeout(() => {
        hideLoadingModal();
        var deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
        deleteModal.hide();
        alert('Item deleted successfully!');
    }, 2000);
}

// Form submission with loading
document.getElementById('addShopForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    showLoadingModal();
    
    // Simulate form submission
    setTimeout(() => {
        hideLoadingModal();
        var addShopModal = bootstrap.Modal.getInstance(document.getElementById('addShopModal'));
        addShopModal.hide();
        alert('Shop created successfully!');
        // Reset form
        this.reset();
    }, 2000);
});

// Dynamic modal content loading
function loadDynamicContent(modalId, url) {
    showLoadingModal();
    
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.querySelector(`#${modalId} .modal-body`).innerHTML = html;
            hideLoadingModal();
            var modal = new bootstrap.Modal(document.getElementById(modalId));
            modal.show();
        })
        .catch(error => {
            hideLoadingModal();
            console.error('Error loading modal content:', error);
        });
}