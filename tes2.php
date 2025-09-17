<?php
$hash = password_hash('mike3103', PASSWORD_DEFAULT);

if (password_verify('mike3103', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>