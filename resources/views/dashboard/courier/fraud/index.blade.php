@extends('layouts.dashboard')

@section('title', 'Courier Fraud Check')

@section('content')
    <div class="container-fluid py-3">

        <div class="card mb-4">
            <div class="card-body">
                <h4>Courier Fraud Checker</h4>
                <p class="text-muted">
                    Check customer delivery history from courier providers.
                </p>

                <form id="fraudForm">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="phone" class="form-control" placeholder="017XXXXXXXX" required>
                        </div>

                        <div class="col-md-4">
                            <button class="btn btn-primary w-100" id="checkBtn">
                                Check Fraud
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="fraudResult"></div>

        <div class="card">
            <div class="card-header">
                <h5>Previous Checks</h5>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Phone</th>
                            <th>Provider</th>
                            <th>Risk</th>
                            <th>Checked At</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($checks as $check)
                            <tr>
                                <td>{{ $check->phone }}</td>
                                <td>{{ $check->provider }}</td>
                                <td>{{ ucfirst($check->risk_level) }}</td>
                                <td>{{ $check->checked_at?->format('d M Y h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    No records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $checks->links() }}
            </div>
        </div>
    </div>

    <script>
        document.getElementById('fraudForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const btn = document.getElementById('checkBtn');
            const result = document.getElementById('fraudResult');

            btn.disabled = true;
            btn.innerText = 'Checking...';

            try {
                const response = await fetch(
                    '{{ route('dashboard.courier.fraud.check') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            phone: this.phone.value
                        })
                    }
                );

                const json = await response.json();

                if (!response.ok || !json.success) {
                    throw new Error(json.message || 'Request failed');
                }

                const couriers = json.data.couriers;

                let html = `
            <div class="row g-3 mb-4">
        `;

                Object.entries(couriers).forEach(([name, item]) => {
                    html += `
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5>${name.toUpperCase()}</h5>
                            <span class="badge ${item.available ? 'bg-success' : 'bg-warning'}">
                                ${item.available ? 'Data Available' : 'Unavailable'}
                            </span>
                            <pre class="mt-3 small text-wrap">${escapeHtml(JSON.stringify(item.data ?? item.message, null, 2))}</pre>
                        </div>
                    </div>
                </div>
            `;
                });

                html += '</div>';

                result.innerHTML = html;

            } catch (error) {
                result.innerHTML = `
            <div class="alert alert-danger">
                ${escapeHtml(error.message)}
            </div>
        `;
            } finally {
                btn.disabled = false;
                btn.innerText = 'Check Fraud';
            }
        });

        function escapeHtml(value) {
            return String(value).replace(/[&<>"']/g, function(char) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                } [char];
            });
        }
    </script>
@endsection
