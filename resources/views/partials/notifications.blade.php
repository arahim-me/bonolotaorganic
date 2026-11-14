<li class="dropdown notification-list">

    {{-- Notification Bell --}}
    <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#"
        role="button" aria-expanded="true">

        <i class="mdi mdi-bell font-size-24"></i>

        @if ($unreadNotifyCount)
            <span class="badge bg-danger rounded-circle noti-icon-badge">
                {{ $unreadNotifyCount }}
            </span>
        @endif

    </a>

    {{-- Dropdown --}}
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">

        {{-- Header --}}
        <div class="p-2 border-bottom">
            <div class="row align-items-center">

                <div class="col">
                    <h6 class="m-0 font-size-16 fw-semibold">
                        Notifications
                    </h6>
                </div>

                <div class="col">
                    @if ($unreadNotifyCount)
                        <form action="{{ route('dashboard.notifications.readAll') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-link text-dark p-0">
                                <small>Mark All Read</small>
                            </button>
                        </form>
                    @endif
                </div>

            </div>
        </div>

        {{-- Notification List --}}
        <div class="px-1" style="max-height: 300px; overflow-y: auto;">

            @forelse($headerNotifications as $notification)
                @php
                    $icons = [
                        'order' => 'mdi-cart-outline',
                        'user' => 'mdi-account-plus',
                        'message' => 'mdi-comment-account-outline',
                        'product' => 'mdi-package-variant',
                        'payment' => 'mdi-cash',
                    ];

                    $icon = $icons[$notification->type] ?? 'mdi-bell-outline';
                @endphp

                <i class="mdi {{ $icon }}"></i>
                <a href="{{ route('dashboard.notifications.open', $notification->id) }}"
                    class="dropdown-item p-0 notify-item card shadow-none mb-1
                     {{ $notification->read_at ? 'read-noti' : 'unread-noti' }}">

                    <div class="card-body">

                        <div class="d-flex align-items-center">

                            {{-- Icon --}}
                            <div class="flex-shrink-0">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-bell-outline"></i>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="flex-grow-1 text-truncate ms-2">

                                <h5 class="noti-item-title fw-semibold font-size-14">

                                    {{ $notification->title }}

                                    @if (!$notification->read_at)
                                        <span class="badge bg-danger">unread</span>
                                    @endif

                                    <small class="fw-normal text-muted ms-1">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </small>

                                </h5>

                                <small class="noti-item-subtitle text-muted">
                                    {{ $notification->content }}
                                </small>

                            </div>

                        </div>

                    </div>

                </a>

            @empty

                <div class="text-center p-3">
                    <i class="mdi mdi-bell-off-outline font-size-24 text-muted"></i>
                    <p class="text-muted mb-0">No notifications found.</p>
                </div>
            @endforelse

        </div>

        {{-- Footer --}}
        <a href="{{ route('dashboard.notifications.index') }}"
            class="dropdown-item text-center text-primary border-top py-2">

            View All

        </a>

    </div>

</li>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const badge = document.getElementById('notification-count');

        async function updateNotificationCount() {

            try {
                const response = await fetch(
                    "{{ route('dashboard.notifications.count') }}", {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                );

                if (!response.ok) return;

                const data = await response.json();

                if (data.count > 0) {
                    badge.textContent = data.count;
                    badge.style.display = 'inline-block';
                } else {
                    badge.textContent = '';
                    badge.style.display = 'none';
                }

            } catch (error) {
                console.error('Notification error:', error);
            }
        }

        // প্রতি ১৫ সেকেন্ডে Notification Check
        updateNotificationCount();

        setInterval(updateNotificationCount, 60000);

    });
</script>
