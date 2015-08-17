# magic_cookies
A simple helper for generating cookie header to test for broken authentication based on existence of predictably-named cookies.

Feel free to add some more words to the list, then run the tool, e.g.:
php generate_cookie_headers.php 
Cookie: auth=1; login=1; authenticated=1; admin=1; valid_user=1; valid-user=1; validuser=1; authenticated-user=1; authenticated_user=1; authenticateduser=1; valid=1; user=1; logged=1; loggedin=1; logged-in=1; logged_in=1; login=1; administrator=1; adminuser=1; admin-user=1; admin_user=1
Cookie: auth=true; login=true; authenticated=true; admin=true; valid_user=true; valid-user=true; validuser=true; authenticated-user=true; authenticated_user=true; authenticateduser=true; valid=true; user=true; logged=true; loggedin=true; logged-in=true; logged_in=true; login=true; administrator=true; adminuser=true; admin-user=true; admin_user=true


Then use the value (or rather append the string after 'Cookie: ') for testing, e.g. with AuthZ plugin.
