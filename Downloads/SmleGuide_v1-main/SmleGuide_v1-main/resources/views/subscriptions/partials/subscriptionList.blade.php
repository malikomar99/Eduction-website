@isset($subscriptions)
    @forelse ($subscriptions as $subscription)
        <tr>
            <td>{{ $subscription->id }}</td>
            <td>{{ $subscription->user->name }}</td>
            <td>{{ $subscription->file->course->category->name ?? '' }}</td>
            <td>{{ $subscription->file->course->title ?? '' }}</td>
            <td><a
                    href="{{ route('courseFiles.show', $subscription->course_file_id) }}">{{ $subscription->file->file_type ?? '' }}</a>
            </td>
            <td>{{ $subscription->purchase_date }}</td>
            <td>{{ $subscription->expiry_date }}</td>
            <td>
                @php
                    $expiry = \Carbon\Carbon::parse($subscription->expiry_date);
                    $now = now();
                @endphp
                <span
                    class="badge bg-{{ $expiry >= $now ? 'success' : 'danger' }} text-white fs-12 fw-normal">{{ $expiry >= $now ? 'Active' : 'In Active' }}</span>
            </td>
            <td>
                <button
                    class="btn badge {{ $subscription->status === 'approved' ? 'bg-success text-white' : ($subscription->status === 'pending' ? 'bg-info-subtle text-info' : 'bg-secondary text-white') }} fs-12 fw-normal"
                    data-bs-target="#changeStatus{{ $subscription->id }}" data-bs-toggle="modal">
                    {{ $subscription->status }}
                </button>
                <div class="modal fade" id="changeStatus{{ $subscription->id }}" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('userSubscription.changeStatus', $subscription->id) }}" method="POST">

                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                                        Change Status</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <select name="status" id="" class="form-select">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approve</option>
                                        <option value="denied">Deny</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <button onclick="window.location.href='{{ route('userSubscription.show', $subscription->id) }}'"
                    class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                    <i class="mdi mdi-eye"></i>
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="10" class="text-center">No results found.</td>
        </tr>
    @endforelse
@endisset

@isset($user)
    @forelse ($user->subscriptions as $subscription)
        <tr>
            <td>{{ $subscription->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $subscription->file->course->category->name ?? '' }}</td>
            <td>{{ $subscription->file->course->title ?? '' }}</td>
            <td><a
                    href="{{ route('courseFiles.show', $subscription->course_file_id) }}">{{ $subscription->file->file_type ?? '' }}</a>
            </td>
            <td>{{ $subscription->purchase_date }}</td>
            <td>{{ $subscription->expiry_date }}</td>
            <td>
                @php
                    $expiry = \Carbon\Carbon::parse($subscription->expiry_date);
                    $now = now();
                @endphp
                <span
                    class="badge bg-{{ $expiry >= $now ? 'success' : 'danger' }} text-white fs-12 fw-normal">{{ $expiry >= $now ? 'Active' : 'In Active' }}</span>
            </td>
            <td>
                <button
                    class="btn badge {{ $subscription->status === 'approved' ? 'bg-success text-white' : ($subscription->status === 'pending' ? 'bg-info-subtle text-info' : 'bg-secondary text-white') }} fs-12 fw-normal"
                    data-bs-target="#changeStatus{{ $subscription->id }}" data-bs-toggle="modal">
                    {{ $subscription->status }}
                </button>
                <div class="modal fade" id="changeStatus{{ $subscription->id }}" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('userSubscription.changeStatus', $subscription->id) }}" method="POST">

                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                                        Change Status</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <select name="status" id="" class="form-select">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approve</option>
                                        <option value="denied">Deny</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <button onclick="window.location.href='{{ route('userSubscription.show', $subscription->id) }}'"
                    class="btn btn-icon btn-sm bg-success-subtle text-success me-1">
                    <i class="mdi mdi-eye"></i>
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="10" class="text-center">No results found.</td>
        </tr>
    @endforelse
@endisset
