<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog {{ $size ?? 'modal-lg' }} {{ $centered ?? 'modal-dialog-centered' }}">
        <div class="modal-content custom-modal">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body custom-modal-body">
                {{ $slot }}
            </div>
            
            @if(isset($footer))
                <div class="modal-footer custom-modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Custom CSS for the modal --}}
<style>

:root {
    --primary-black: #1a1a1a;
    --secondary-black: #2d2d2d;
    --light-gray: #f8f9fa;
    --medium-gray: #6c757d;
    --border-gray: #e9ecef;
    --white: #ffffff;
    --hover-gray: #f1f3f5;
}
.custom-modal {
    background-color: var(--white);
    border-radius: 0 !important;
    box-shadow: 0 4px 20px var(--primary-black);
}

.custom-modal-header {
    background-color: var(--primary-black);
    color: var(--white);
    border-bottom: 1.2px solid var(--border-gray);
    padding: .5rem 1rem;
    border-radius: 0 !important;
}

.custom-modal-header .modal-title {
    font-weight: 400;
    font-size: 1rem;
    color: var(--white);
}

.custom-btn-close {
    background-color: transparent;
    border: none;
    color: var(--white);
    opacity: 1;
    font-size: .8rem;
    padding: 0.5rem;
    margin: 0;
    border-radius: 0 !important;
}

.custom-btn-close:hover {
    opacity: 1;
    background-color: var(--hover-gray);
    color: var(--white);
}

.custom-modal-body {
    padding: 1rem 1rem;
    background-color: var(--white);
    color: var(--primary-black);
    min-height: 100px;
}

.custom-modal-footer {
    background-color: var(--white);
    border-top: 1px solid var(--border-gray);
    padding: .5rem 1rem;
    border-radius: 0 !important;
}

.custom-modal-footer .btn {
    margin-right: 0.5rem;
    border-radius: 0 !important;
    font-weight: 400;
    padding: 0.5rem 1rem;
}

.custom-modal-footer .btn-primary {
    background-color: var(--primary-black);
    border-color: var(--border-gray);
    color: var(--white);
}

.custom-modal-footer .btn-primary:hover {
    background-color: var(--hover-gray);
    border-color: var(--primary-black);
    color: var(--primary-black);

}

.custom-modal-footer .btn-secondary {
    background-color: var(--white);
    border-color: var(--border-gray);
    color: var(--secondary-black);
}

.custom-modal-footer .btn-secondary:hover {
    border-color: var(--medium-gray);
}

.custom-modal-footer .btn-danger {
    background-color: #e74c3c;
    border-color: #e74c3c;
    color: var(--white);
}

.custom-modal-footer .btn-danger:hover {
    background-color: #c0392b;
    border-color: #c0392b;
}

.custom-modal-footer .btn-success {
    background-color: #27ae60;
    border-color: #27ae60;
    color: var(--white);
}

.custom-modal-footer .btn-success:hover {
    background-color: #229954;
    border-color: #229954;
}

/* Form styling inside modal */
.custom-modal-body .form-control {
    border-radius: 0 !important;
    border: .7px solid #bdc3c7;
    padding: 0.5rem;
    font-size: .5rem;
}

.custom-modal-body .form-control:focus {
    border-color: var(--border-gray);
    box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
}

.custom-modal-body .form-label {
    font-weight: 400;
    color: var(--medium-gray);
    margin-bottom: 0.3rem;
}

.custom-modal-body .form-select {
    border-radius: 0 !important;
    border: 1px solid var(--border-gray);
}

.custom-modal-body .form-select:focus {
    border-color: var(--border-gray);
    box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
}

/* Loading state */
.modal-loading {
    display: none;
    text-align: center;
    padding: 2rem;
}

.modal-loading.show {
    display: block;
}

.loading-spinner {
    border: 4px solid var(--border-gray);
    border-top: 4px solid var(--light-gray);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 0 auto 1rem;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>