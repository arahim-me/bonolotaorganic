@forelse($messages as $message)
    @php
        $sender = $message->sender;

        $senderName = $sender?->name ?? ($message->name ?? 'Unknown');
        $senderEmail = $sender?->email ?? ($message->email ?? '');
        $senderPhone = $sender?->phone ?? ($message->phone ?? '');

        $avatar = $sender?->avatar ?: 'user.png';
    @endphp

    <div class="message-item {{ $message->is_read ? 'is-read' : 'is-unread' }}" data-id="{{ $message->id }}"
        data-name="{{ $senderName }}" data-email="{{ $senderEmail }}" data-phone="{{ $senderPhone }}"
        data-subject="{{ $message->title }}" data-message="{{ $message->message }}"
        data-avatar="{{ asset('uploads/users/avatars/' . $avatar) }}"
        data-date="{{ $message->created_at->format('d M Y, h:i A') }}" data-is-read="{{ $message->is_read ? '1' : '0' }}"
        data-read-by-name="{{ $message->reader?->name ?? '' }}" data-read-at="{{ $message->read_at }}"
        data-read-url="{{ route('dashboard.messages.read', $message->id) }}">

        <div class="d-flex align-items-start gap-3">

            {{-- Avatar --}}
            <div class="message-avatar">
                <img src="{{ asset('uploads/users/avatars/' . $avatar) }}" alt="{{ $senderName }}">
            </div>

            {{-- Message Information --}}
            <div class="flex-grow-1 overflow-hidden">

                <div class="d-flex justify-content-between align-items-center">

                    <h6 class="sender-name mb-1">
                        {{ $senderName }}
                    </h6>

                    <small class="text-muted">
                        {{ $message->created_at->format('d M') }}
                    </small>

                </div>

                <div class="d-flex align-items-center justify-content-between">

                    <div class="overflow-hidden">

                        <div class="message-subject">
                            {{ Str::limit($message->title, 30) }}
                        </div>

                        <small class="text-muted">
                            {{ Str::limit($message->message, 45) }}
                        </small>

                    </div>

                    <span class="unread-indicator"></span>

                </div>

            </div>

        </div>

    </div>

@empty

    <div class="text-center py-5">

        <i class="bi bi-envelope-open text-muted fs-1"></i>

        <p class="text-muted mt-2 mb-0">
            No messages found
        </p>

    </div>
@endforelse
