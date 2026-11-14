@extends('layouts.dashboard')

@section('title', $title ?? 'Customer Messages')

@section('content')

    <div class="container-fluid py-3">

        {{-- Page Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

            <div>
                <h4 class="mb-1">Customer Messages</h4>
                <p class="text-muted mb-0">
                    Manage customer messages and feedback
                </p>
            </div>

            <div class="d-flex gap-2 mt-2 mt-md-0">

                <span class="badge bg-primary p-2">
                    Total: <span id="totalCount">{{ $totalCount }}</span>
                </span>

                <span class="badge bg-danger p-2">
                    Unread: <span id="unreadCount">{{ $unreadMessagesCount }}</span>
                </span>

            </div>

        </div>


        {{-- Inbox --}}
        <div class="inbox-wrapper">

            <div class="row g-0">

                {{-- LEFT SIDEBAR --}}
                <div class="col-md-4 col-lg-4 inbox-sidebar">

                    <div class="p-3 border-bottom">

                        {{-- Search --}}
                        <div class="input-group mb-3">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text" id="messageSearch" class="form-control" placeholder="Search messages...">

                        </div>


                        {{-- Filters --}}
                        <div class="btn-group w-100">

                            <button type="button" class="btn btn-sm btn-primary filter-btn active" data-filter="all">
                                All
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-primary filter-btn" data-filter="unread">
                                Unread
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-primary filter-btn" data-filter="read">
                                Read
                            </button>

                        </div>

                    </div>


                    {{-- Message List --}}
                    <div class="message-list" id="messageList">

                        @include('partials.inboxList')

                    </div>


                    {{-- Pagination --}}
                    <div class="p-2 border-top" id="messagePagination">

                        {{ $messages->links('pagination::bootstrap-5') }}

                    </div>

                </div>


                {{-- RIGHT DETAIL PANEL --}}
                <div class="col-md-8 col-lg-8 inbox-detail">

                    {{-- Empty State --}}
                    <div class="empty-message" id="detailEmpty">

                        <i class="bi bi-envelope-paper"></i>

                        <h5 class="mt-3">Select a Message</h5>

                        <p class="text-muted">
                            Select a customer message to read its details.
                        </p>

                    </div>


                    {{-- Message Details --}}
                    <div id="detailContent" style="display:none;">

                        {{-- Detail Header --}}
                        <div class="detail-header p-4 border-bottom">

                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="detail-avatar" id="detailAvatar"></div>

                                    <div class="customer-info">
                                        <h5 class="mb-0" id="detailName"></h5>
                                        <small class="text-muted" id="detailEmail"></small>
                                        <small class="text-muted" id="detailPhone"></small>
                                    </div>

                                </div>


                                <div class="text-md-end">

                                    <small class="text-muted d-block mb-2" id="detailDate"></small>

                                    <button type="button" class="btn btn-sm btn-primary" id="toggleReadBtn" disabled>
                                        <i class="bi bi-check2-circle"></i>
                                        Already Read
                                    </button>

                                </div>

                            </div>

                        </div>


                        {{-- Detail Body --}}
                        <div class="detail-body p-4">

                            <h5 class="mb-3" id="detailSubject"></h5>

                            <div class="message-content" id="detailMessage"></div>

                        </div>


                        {{-- Footer / Read Audit --}}
                        <div class="border-top p-3">

                            <div class="d-flex justify-content-between flex-wrap gap-2">

                                <div id="detailStatus" class="text-muted small"></div>

                                <div id="readAudit" class="text-muted small" style="display:none;">

                                    <span>
                                        <i class="bi bi-person-check"></i>
                                        Read by: <strong id="readBy"></strong>
                                    </span>

                                    <span class="ms-2">
                                        <i class="bi bi-clock"></i>
                                        <span id="readAt"></span>
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const filterUrl = @json(route('dashboard.messages.filter'));

            const csrfToken = document.querySelector('meta[name="csrf-token"]')
                ?.getAttribute('content');

            const messageList = document.getElementById('messageList');
            const pagination = document.getElementById('messagePagination');
            const searchInput = document.getElementById('messageSearch');

            const totalCount = document.getElementById('totalCount');
            const unreadCount = document.getElementById('unreadCount');

            const detailEmpty = document.getElementById('detailEmpty');
            const detailContent = document.getElementById('detailContent');

            const readButton = document.getElementById('toggleReadBtn');

            let selectedMessage = null;
            let currentFilter = 'all';
            let currentPage = 1;
            let searchTimer = null;
            let isUpdating = false;


            // AJAX Request
            async function ajaxRequest(url, options = {}) {

                const response = await fetch(url, {
                    ...options,

                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken,
                        ...(options.headers || {})
                    }
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Something went wrong.');
                }

                return data;
            }


            // Update Counters
            function updateCounters(data) {

                totalCount.textContent = data.total_count;
                unreadCount.textContent = data.unread_count;

            }


            // Load Messages
            async function loadMessages(page = 1) {

                const selectedId = selectedMessage?.dataset.id || null;

                const params = new URLSearchParams({
                    search: searchInput.value,
                    status: currentFilter,
                    page: page
                });

                try {

                    const data = await ajaxRequest(`${filterUrl}?${params.toString()}`);

                    messageList.innerHTML = data.html;
                    pagination.innerHTML = data.pagination;

                    currentPage = page;

                    updateCounters(data);

                    // Restore selected message after AJAX refresh
                    if (selectedId) {

                        const restored = messageList.querySelector(
                            `.message-item[data-id="${selectedId}"]`
                        );

                        if (restored) {

                            selectMessage(restored, false);

                        } else {

                            clearDetails();

                        }

                    }

                } catch (error) {

                    console.error(error);
                    alert(error.message);

                }

            }


            // Clear Details
            function clearDetails() {

                selectedMessage = null;

                detailContent.style.display = 'none';
                detailEmpty.style.display = 'flex';

            }


            // Select Message
            function selectMessage(item, autoRead = true) {

                selectedMessage = item;

                document.querySelectorAll('.message-item').forEach(function(element) {
                    element.classList.remove('active');
                });

                item.classList.add('active');

                detailEmpty.style.display = 'none';
                detailContent.style.display = 'block';


                // Customer Information
                document.getElementById('detailName').textContent =
                    item.dataset.name || 'Name Not Found';

                document.getElementById('detailEmail').textContent =
                    item.dataset.email || 'Email Not Found';

                document.getElementById('detailPhone').textContent =
                    item.dataset.phone || 'Phone not provided';

                document.getElementById('detailDate').textContent =
                    item.dataset.date;


                // Avatar
                const avatar = document.getElementById('detailAvatar');

                if (item.dataset.avatar) {

                    const img = document.createElement('img');
                    img.src = item.dataset.avatar;
                    img.alt = item.dataset.name;

                    avatar.replaceChildren(img);

                } else {

                    const placeholder = document.createElement('div');

                    placeholder.className = 'avatar-placeholder';

                    placeholder.textContent =
                        item.dataset.name.charAt(0).toUpperCase();

                    avatar.replaceChildren(placeholder);

                }


                // Message Information
                document.getElementById('detailSubject').textContent =
                    item.dataset.subject;

                document.getElementById('detailMessage').textContent =
                    item.dataset.message;


                updateReadButton();
                updateAuditInfo();


                // Automatically Read when opening an Unread Message
                if (autoRead && item.dataset.isRead === '0') {

                    updateReadStatus();

                }

            }


            // Read Button State
            function updateReadButton() {

                if (!selectedMessage) return;

                const isRead = selectedMessage.dataset.isRead === '1';

                if (isRead) {

                    readButton.disabled = true;
                    readButton.className = 'btn btn-sm btn-success';
                    readButton.innerHTML =
                        '<i class="bi bi-check2-all"></i> Already Read';

                } else {

                    readButton.disabled = isUpdating;
                    readButton.className = 'btn btn-sm btn-primary';
                    readButton.innerHTML =
                        '<i class="bi bi-check2-circle"></i> Mark as Read';

                }

                document.getElementById('detailStatus').textContent =
                    isRead ? 'This message has been read.' : 'This message is unread.';

            }


            // Read Audit Information
            function updateAuditInfo() {

                if (!selectedMessage) return;

                const isRead = selectedMessage.dataset.isRead === '1';

                const audit = document.getElementById('readAudit');

                if (isRead) {

                    audit.style.display = 'block';

                    document.getElementById('readBy').textContent =
                        selectedMessage.dataset.readByName || 'Admin';

                    document.getElementById('readAt').textContent =
                        selectedMessage.dataset.readAt || '';

                } else {

                    audit.style.display = 'none';

                }

            }


            // Mark as Read - First Reader Only
            async function updateReadStatus() {

                if (!selectedMessage || isUpdating) return;

                if (selectedMessage.dataset.isRead === '1') return;

                isUpdating = true;

                updateReadButton();

                try {

                    const data = await ajaxRequest(
                        selectedMessage.dataset.readUrl, {
                            method: 'PATCH'
                        }
                    );

                    const result = data.data;

                    // Update selected item
                    selectedMessage.dataset.isRead = '1';

                    selectedMessage.dataset.readByName =
                        result.read_by_name || '';

                    selectedMessage.dataset.readAt =
                        result.read_at || '';

                    selectedMessage.classList.remove('is-unread');
                    selectedMessage.classList.add('is-read');

                    updateReadButton();
                    updateAuditInfo();

                    // Refresh list and counters
                    await loadMessages(currentPage);

                } catch (error) {

                    alert(error.message);

                } finally {

                    isUpdating = false;
                    updateReadButton();

                }

            }


            // Message Click
            messageList.addEventListener('click', function(event) {

                const item = event.target.closest('.message-item');

                if (!item) return;

                selectMessage(item);

            });


            // Mark as Read Button
            readButton.addEventListener('click', function() {

                updateReadStatus();

            });


            // Search
            searchInput.addEventListener('input', function() {

                clearTimeout(searchTimer);

                searchTimer = setTimeout(function() {

                    loadMessages(1);

                }, 350);

            });


            // Filter Buttons
            document.querySelectorAll('.filter-btn').forEach(function(button) {

                button.addEventListener('click', function() {

                    document.querySelectorAll('.filter-btn').forEach(function(btn) {

                        btn.classList.remove('active', 'btn-primary');
                        btn.classList.add('btn-outline-primary');

                    });

                    this.classList.add('active', 'btn-primary');
                    this.classList.remove('btn-outline-primary');

                    currentFilter = this.dataset.filter;

                    loadMessages(1);

                });

            });


            // AJAX Pagination
            pagination.addEventListener('click', function(event) {

                const link = event.target.closest('a');

                if (!link) return;

                event.preventDefault();

                const url = new URL(link.href);

                const page = parseInt(url.searchParams.get('page')) || 1;

                loadMessages(page);

            });

        });
    </script>
@endpush
