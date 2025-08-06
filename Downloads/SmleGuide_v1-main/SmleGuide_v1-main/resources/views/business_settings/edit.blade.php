@extends('layouts.vertical', ['title' => 'Business Settings'])
@section('content')
<form class="container mt-3 mb-3" action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">Business Details </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="business_name">Business Name</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name', $settings?->business_name) }}">
                        @error('business_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="business_email">Business Email</label>
                        <input type="email" class="form-control" id="business_email" name="business_email" value="{{ old('business_email', $settings?->business_email) }}" required>
                        @error('business_email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="business_phone">Business Phone</label>
                        <input type="text" class="form-control" id="business_phone" name="business_phone" value="{{ old('business_phone', $settings?->business_phone) }}" required>
                        @error('business_phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="business_address">Business Address</label>
                        <input type="text" class="form-control" id="business_address" name="business_address" value="{{ old('business_address', $settings?->business_address) }}" required>
                        @error('business_address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">Business Logo </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="business_logo">Business Logo</label>
                        <input type="file" class="form-control" id="business_logo" name="business_logo" accept="image/*">
                        @error('business_logo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @if($settings?->business_logo)
                        <div class="image-container position-relative mt-2">
                            <img src="{{ asset($settings?->business_logo) }}" alt="Business Logo" class="img-thumbnail" style="max-width: 200px;">
                            {{-- <img src="{{ asset($settings->business_logo) }}" class="img-thumbnail" alt="Your Image"> --}}
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-danger" class="text-white bg-danger rounded position-absolute top-0 start-0 m-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                        

                        <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                     <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>  
                                    <div class="modal-status bg-danger"></div>
                                    <div class="modal-body text-center py-4">
                                        <!-- Download SVG icon from http://tabler.io/icons/icon/alert-triangle -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon mb-2 text-danger icon-lg">
                                            <path d="M12 9v4" />
                                            <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                                            <path d="M12 16h.01" />
                                        </svg>
                                        <h3>Are you sure?</h3>
                                        <div class="text-secondary">
                                            Do you really want to remove Logo? What you've done
                                            cannot be undone.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="w-100">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-3 w-100" data-bs-dismiss="modal">
                                                        Cancel
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('business_settings.delete_logo') }}" class="btn btn-danger btn-4 w-100">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">Dashboard Customization </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="primary_color">Primary Color</label>
                        <input type="color" class="form-control" id="primary_color" value="{{ old('primary_color', $settings?->primary_color) }}" name="primary_color">
                        @error('primary_color')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="secondary_color">Secondary Color</label>
                        <input type="color" class="form-control" id="secondary_color" name="secondary_color" value="{{ old('secondary_color', $settings?->secondary_color) }}">
                        @error('secondary_color')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">Payment Settings </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="payment_currency">Currency</label>
                        <input type="text" class="form-control" id="payment_currency" name="payment_currency" value="{{ old('payment_currency', $settings?->payment_currency) }}">
                        @error('payment_currency')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">Social Login </h3>
                </div>
                <div class="card-body">
                    <div class=" d-flex align-items-center justify-content-between">
                        <div class="form-label">Login with Facebook</div>
                        <label class="form-check form-switch form-switch-3 ">
                            <input class="form-check-input" type="checkbox" name="facebook_login" id="facebook_login" {{ $settings?->facebook_login ? 'checked' : '' }}>
                            {{-- <span class="form-check-label">Option 1</span> --}}
                        </label>
                    </div>
                    @error('facebook_login')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mt-3 d-flex align-items-center justify-content-between">
                        <div class="form-label">Login with Google</div>
                        <label class="form-check form-switch form-switch-3 ">
                            <input class="form-check-input" type="checkbox" name="google_login" id="google_login" {{ $settings?->google_login ? 'checked' : '' }}>
                            {{-- <span class="form-check-label">Option 1</span> --}}
                        </label>
                    </div>
                    @error('google_login')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">Maintenance Mode </h3>
                </div>
                <div class="card-body">
                    <div class=" d-flex align-items-center justify-content-between">
                        <div class="form-label">Enable Maintenance Mode</div>
                        <label class="form-check form-switch form-switch-3 ">
                            <input class="form-check-input" type="checkbox" name="maintenance_mode" id="maintenance_mode" {{ $settings?->maintenance_mode ? 'checked' : '' }}>
                            {{-- <span class="form-check-label">Option 1</span> --}}
                        </label>
                    </div>
                    @error('maintenance_mode')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="my-3">
                        <label for="maintenance_message">Maintenance Message</label>
                        <input type="text" class="form-control" id="maintenance_message" name="maintenance_message" value="{{ old('maintenance_message', $settings?->maintenance_message) }}">
                        @error('maintenance_message')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>


            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">Social Links </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $settings?->facebook_link) }}">
                        @error('facebook_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ old('twitter_link', $settings?->twitter_link) }}">
                        @error('twitter_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="google_analytics_id">Google Analytics ID</label>
                        <input type="url" class="form-control" id="google_analytics_id" name="google_analytics_id" value="{{ old('google_analytics_id', $settings?->google_analytics_id) }}">
                        @error('google_analytics_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="copyright_text">Copyright Text</label>
                        <input type="text" class="form-control" id="copyright_text" name="copyright_text" value="{{ old('copyright_text', $settings?->copyright_text) }}">
                        @error('copyright_text')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card rounded-3">
                <div class="card-header">
                    <h3 class="card-title">App Configuration </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="version_android">App Minimum Version Android</label>
                        <input type="text" class="form-control" id="version_android" name="version_android" value="{{ old('version_android', $settings?->version_android) }}">
                        @error('version_android')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="version_ios">App Minimum Version IOS</label>
                        <input type="text" class="form-control" id="version_ios" name="version_ios" value="{{ old('version_ios', $settings?->version_ios) }}">
                        @error('version_ios')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ios_url">App URL IOS</label>
                        <input type="url" class="form-control" id="ios_url" name="ios_url" value="{{ old('ios_url', $settings?->ios_url) }}">
                        @error('ios_url')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="android_url">App URL Android</label>
                        <input type="url" class="form-control" id="android_url" name="android_url" value="{{ old('android_url', $settings?->android_url) }}">
                        @error('android_url')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1 d-flex align-items-center justify-content-between">
                        <div class="form-label">Force Update</div>
                        <label class="form-check form-switch form-switch-3 ">
                            <input class="form-check-input" type="checkbox" name="force_update" id="force_update" {{ $settings?->force_update ? 'checked' : '' }}>
                            {{-- <span class="form-check-label">Option 1</span> --}}
                            @error('force_update')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </label>
                    </div>
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div class="form-label">Update within seven days</div>
                        <label class="form-check form-switch form-switch-3 ">
                            <input class="form-check-input" type="checkbox" name="update_in_seven_days" id="update_in_seven_days" {{ $settings?->update_in_seven_days ? 'checked' : '' }}>
                            {{-- <span class="form-check-label">Option 1</span> --}}
                            @error('update_in_seven_days')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-end">
                    <button type="submit" class="btn btn-primary">Update Settings</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
