<x-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\profile.css') }}">
    <title>Account information</title>
  
    <main>
        <div class="profile-info">
            <div>
            <b>Profile information</b>
            <p>Update your account's profile information and email address</p>
            </div>

            <div class="center">
                <form action="">
                    <div class="text_field">
                        <input type="text" value="{{ __('Name') }}">
                        <label for="name" value="{{_('Name')}}">Name</label>
                        
                    </div>
                    <div class="text_field">
                        <input type="text" required>
                        <label for="">Email</label>
                        
                    </div>
                    <div class="submit_button">
                        <input type="submit" value="SAVE">
                        </div>
                </form>
            </div>

        </div>
        <hr class="profile-line">

        <div class="profile-info">
            <div>
            <b>Update information</b>
            <p>Ensure your account in using a long  password to stay secure</p>
            </div>

            <div class="center">
                <form action="">
                    <div class="text_field">
                        <input type="text" required>
                        <label for="">Current password</label>
                        
                    </div>
                    <div class="text_field">
                        <input type="text" required>
                        <label for="">New password</label>
                        
                    </div>
                    <div class="text_field">
                        <input type="text" required>
                        <label for="">Confirm New password</label>
                        
                    </div>
                    <div class="submit_button">
                        <input type="submit" value="SAVE">
                        </div>
                </form>
            </div>

        </div>
        <hr class="profile-line">
        <div class="profile-info">
            <div>
            <b>Two factor authentication</b>
            <p>Add additional security to your account using two factor auth    </p>
            </div>

            <div class="content">
                <p>You have not enabled two factor authentication</p>
                <p class="exp">When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.</p>
                <div class="submit_button">
                    <input type="submit" value="Enable">
                </div>
            </div>

        </div>
        <hr class="profile-line">
        <div class="profile-info">
            <div>
            <b>Manage browser sessions</b>
            <p>Manage your sessions and logout of other devices </p>
            </div>

            <div class="content1">
                
                <p class="exp">If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.</p>
                <div class="submit_button1">
                   <button>LOG OUT OTHER BROWSER SESSIONS</button>
                </div>
            </div>

        </div>

        <hr class="profile-line">
        <div class="profile-info">
            <div>
            <b>Delete your account</b>
            <p>Permanently delete your account</p>
            </div>

            <div class="content1">
                
                <p class="exp">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                </p>
                <div class="submit_button">
                   <button class="button1">DELETE ACCOUNT</button>
                </div>
            </div>

        </div>
    </main>
</x-layout>