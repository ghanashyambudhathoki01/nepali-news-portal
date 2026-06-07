<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="row g-4">

                <!-- Update Profile Information -->
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5 mb-2">{{ __('Profile Information') }}</h3>
                            <p class="text-muted small mb-4">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>

                            <!-- Email Verification Resend (if needed) -->
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <span>{{ __('Your email address is unverified.') }}</span>
                                    <form id="send-verification" method="post"
                                        action="{{ route('verification.send') }}" class="d-inline ms-2">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-link p-0 border-0 text-decoration-underline">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </form>
                                </div>

                                @if (session('status') === 'verification-link-sent')
                                    <div class="alert alert-success small mt-2">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </div>
                                @endif
                            @endif

                            <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                                @csrf
                                @method('patch')

                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}" required autocomplete="username">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                    @if (session('status') === 'profile-updated')
                                        <span class="text-success fw-medium">{{ __('Saved.') }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Update Password -->
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5 mb-2">{{ __('Update Password') }}</h3>
                            <p class="text-muted small mb-4">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>

                            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                                @csrf
                                @method('put')

                                <div class="mb-3">
                                    <label for="update_password_current_password"
                                        class="form-label">{{ __('Current Password') }}</label>
                                    <input id="update_password_current_password" name="current_password" type="password"
                                        class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                        autocomplete="current-password">
                                    @error('current_password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="update_password_password"
                                        class="form-label">{{ __('New Password') }}</label>
                                    <input id="update_password_password" name="password" type="password"
                                        class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                        autocomplete="new-password">
                                    @error('password', 'updatePassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="update_password_password_confirmation"
                                        class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="update_password_password_confirmation" name="password_confirmation"
                                        type="password" class="form-control" autocomplete="new-password">
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                    @if (session('status') === 'password-updated')
                                        <span class="text-success fw-medium">{{ __('Saved.') }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="col-12">
                    <div class="card shadow-sm border-danger">
                        <div class="card-body">
                            <h3 class="card-title h5 mb-2 text-danger">{{ __('Delete Account') }}</h3>
                            <p class="text-muted small mb-4">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                            </p>

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#confirmUserDeletion">
                                {{ __('Delete Account') }}
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmUserDeletion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="confirmUserDeletionLabel">
                                {{ __('Are you sure you want to delete your account?') }}</h5>
                            <button type="button" class="btn-close" data-dismiss="modal"
                                aria-label="Close">x</button>
                        </div>

                        <div class="modal-body">
                            <p class="text-muted">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                            </p>
                            <div class="mt-4">
                                <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                    placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                @error('password', 'userDeletion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
