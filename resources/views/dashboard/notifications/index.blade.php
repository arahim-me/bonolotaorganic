
@extends('layouts.dashboard')

@section('title', 'Notifications')

@section('content')
<div class="container-fluid py-3">

    {{-- Page Header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Notifications</h4>
            <p class="text-muted mb-0">
                Manage your notifications and updates
            </p>
        </div>

        <div class="d-flex gap-2 mt-2 mt-md-0">
            <span class="badge bg-primary p-2">
                Total: {{ $totalCount }}
            </span>

            <span class="badge bg-danger p-2">
                Unread: {{ $unreadCount }}
            </span>

            <span class="badge bg-success p-2">
                Read: {{ $readCount }}
            </span>
        </div>
    </div>

    {{-- Notification Inbox --}}
    <div class="notification-wrapper card border-0 shadow-sm">
        <div class="row g-0">

            {{-- LEFT SIDEBAR --}}
            <div class="col-md-4 col-lg-4 notification-sidebar">

                <div class="p-3 border-bottom">

                    {{-- Search Form --}}
                    <form action="{{ route('dashboard.notifications.index') }}"
                          method="GET">

                        <input type="hidden"
                               name="status"
                               value="{{ request('status', 'all') }}">

                        <div class="input-group mb-3">
                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Search notifications..."
                                   value="{{ request('search') }}">

                            <button type="submit"
                                    class="btn btn-primary">
                                <i class="bi bi-search"></i>
                                Search
                            </button>
                        </div>
                    </form>

                    {{-- Filter Buttons --}}
                    <div class="btn-group w-100">

                        <a href="{{ route('dashboard.notifications.index', [
                            'status' => 'all',
                            'search' => request('search')
                        ]) }}"
                           class="btn btn-sm {{ request('status', 'all') == 'all' ? 'btn-primary' : 'btn-outline-primary' }}">
                            All
                        </a>

                        <a href="{{ route('dashboard.notifications.index', [
                            'status' => 'unread',
                            'search' => request('search')
                        ]) }}"
                           class="btn btn-sm {{ request('status') == 'unread' ? 'btn-primary' : 'btn-outline-primary' }}">
                            Unread
                        </a>

                        <a href="{{ route('dashboard.notifications.index', [
                            'status' => 'read',
                            'search' => request('search')
                        ]) }}"
                           class="btn btn-sm {{ request('status') == 'read' ? 'btn-primary' : 'btn-outline-primary' }}">
                            Read
                        </a>

                    </div>

                    {{-- Reset Search --}}
                    @if(request('search'))
                        <div class="text-end mt-2">
                            <a href="{{ route('dashboard.notifications.index', [
                                'status' => request('status', 'all')
                            ]) }}"
                               class="text-danger small">
                                <i class="bi bi-x-circle"></i>
                                Clear Search
                            </a>
                        </div>
                    @endif

                </div>

                {{-- Notification List --}}
                <div class="notification-list">

                    @forelse($notifications as $notification)

                        @php
                            $icons = [
                                'order' => 'bi-cart',
                                'user' => 'bi-person-plus',
                                'message' => 'bi-chat-dots',
                                'product' => 'bi-box-seam',
                                'payment' => 'bi-cash',
                            ];

                            $icon = $icons[$notification->type]
                                ?? 'bi-bell';
                        @endphp

                        <a href="{{ route('dashboard.notifications.index', array_merge(
                            request()->query(),
                            ['notification' => $notification->id]
                        )) }}"
                           class="notification-item
                           {{ $selectedNotification?->id == $notification->id ? 'active' : '' }}
                           {{ $notification->read_at ? 'is-read' : 'is-unread' }}">

                            <div class="d-flex gap-3">

                                <div class="notification-icon">
                                    <i class="bi {{ $icon }}"></i>
                                </div>

                                <div class="flex-grow-1 overflow-hidden">

                                    <div class="d-flex justify-content-between gap-2">

                                        <h6 class="mb-1 text-truncate">
                                            {{ $notification->title }}
                                        </h6>

                                        @if(!$notification->read_at)
                                            <span class="unread-indicator"></span>
                                        @endif

                                    </div>

                                    <p class="text-muted small mb-1">
                                        {{ Str::limit($notification->content, 65) }}
                                    </p>

                                    <small class="text-muted">
                                        <i class="bi bi-clock"></i>
                                        {{ $notification->created_at->diffForHumans() }}
                                    </small>

                                </div>

                            </div>

                        </a>

                    @empty

                        <div class="text-center py-5 px-3">
                            <i class="bi bi-bell-slash fs-1 text-muted"></i>
                            <h6 class="mt-3">No Notifications Found</h6>
                            <p class="text-muted small mb-0">
                                There are no notifications to display.
                            </p>
                        </div>

                    @endforelse

                </div>
                {{-- @include('partials.notifications') --}}

                {{-- Pagination --}}
                <div class="p-3 border-top">
                    {{ $notifications->links('pagination::bootstrap-5') }}
                </div>

            </div>

            {{-- RIGHT DETAIL PANEL --}}
            <div class="col-md-8 col-lg-8 notification-detail">

                @if($selectedNotification)

                    {{-- Detail Header --}}
                    <div class="detail-header p-4 border-bottom">

                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                            <div>
                                <span class="badge bg-info mb-2">
                                    {{ ucfirst($selectedNotification->type) }}
                                </span>

                                <h5 class="mb-1">
                                    {{ $selectedNotification->title }}
                                </h5>

                                <small class="text-muted">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $selectedNotification->created_at->format('d M Y, h:i A') }}
                                </small>
                            </div>

                            <div class="d-flex gap-2">

                                @if(!$selectedNotification->read_at)

                                    <form action="{{ route('dashboard.notifications.read', $selectedNotification->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="btn btn-sm btn-primary">
                                            <i class="bi bi-check2-circle"></i>
                                            Mark as Read
                                        </button>
                                    </form>

                                @else

                                    <button type="button"
                                            class="btn btn-sm btn-success"
                                            disabled>
                                        <i class="bi bi-check2-all"></i>
                                        Already Read
                                    </button>

                                @endif

                                <form action="{{ route('dashboard.notifications.destroy', $selectedNotification->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this notification?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                    {{-- Detail Body --}}
                    <div class="detail-body p-4">

                        <div class="notification-content">

                            <div class="notification-content-icon mb-3">
                                <i class="bi bi-bell"></i>
                            </div>

                            <h5 class="mb-3">
                                {{ $selectedNotification->title }}
                            </h5>

                            <p class="mb-0">
                                {{ $selectedNotification->content }}
                            </p>

                        </div>

                        @if($selectedNotification->return_url)

                            <div class="mt-4">
                                <a href="{{ $selectedNotification->return_url }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                    View Related Page
                                </a>
                            </div>

                        @endif

                    </div>

                    {{-- Footer / Read Status --}}
                    <div class="border-top p-3">

                        <div class="d-flex justify-content-between flex-wrap gap-2">

                            <div class="text-muted small">

                                @if($selectedNotification->read_at)

                                    <span class="text-success">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Read
                                    </span>

                                    <span class="ms-2">
                                        {{ $selectedNotification->read_at->format('d M Y, h:i A') }}
                                    </span>

                                @else

                                    <span class="text-danger">
                                        <i class="bi bi-envelope"></i>
                                        Unread Notification
                                    </span>

                                @endif

                            </div>

                            <small class="text-muted">
                                ID: #{{ $selectedNotification->id }}
                            </small>

                        </div>

                    </div>

                @else

                    {{-- Empty Detail State --}}
                    <div class="empty-notification">

                        <i class="bi bi-bell"></i>

                        <h5 class="mt-3">Select a Notification</h5>

                        <p class="text-muted">
                            Select a notification from the list
                            to view its details.
                        </p>

                    </div>

                @endif

            </div>

        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
    .notification-wrapper {
        overflow: hidden;
        border-radius: 10px;
    }

    .notification-sidebar {
        border-right: 1px solid #e9ecef;
        background: #fff;
    }

    .notification-list {
        height: 520px;
        overflow-y: auto;
    }

    .notification-item {
        display: block;
        padding: 16px;
        text-decoration: none;
        color: #343a40;
        border-bottom: 1px solid #f0f0f0;
        transition: .2s;
    }

    .notification-item:hover {
        background: #f8f9fa;
    }

    .notification-item.active {
        background: #eef4ff;
        border-left: 3px solid #0d6efd;
    }

    .notification-item.is-unread {
        background: #fffaf5;
    }

    .notification-item.is-unread h6 {
        font-weight: 700;
    }

    .notification-item h6 {
        color: #343a40;
        font-size: 14px;
    }

    .notification-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 50%;
        background: #eaf1ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .notification-detail {
        background: #fff;
        min-height: 650px;
    }

    .detail-body {
        min-height: 400px;
    }

    .notification-content {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        line-height: 1.8;
    }

    .notification-content-icon {
        font-size: 30px;
        color: #0d6efd;
    }

    .empty-notification {
        min-height: 650px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 30px;
    }

    .empty-notification > i {
        font-size: 65px;
        color: #adb5bd;
    }

    .notification-list::-webkit-scrollbar {
        width: 5px;
    }

    .notification-list::-webkit-scrollbar-thumb {
        background: #ced4da;
        border-radius: 10px;
    }

    @media(max-width: 767px) {
        .notification-sidebar {
            border-right: 0;
        }

        .notification-list {
            height: 350px;
        }

        .notification-detail {
            min-height: 400px;
        }

        .empty-notification {
            min-height: 350px;
        }
    }
</style>
@endpush
