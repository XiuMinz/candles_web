<?php 
$no = '01412415125';
if (filter_var($no, FILTER_VALIDATE_INT, ['flags' => FILTER_FLAG_ALLOW_OCTAL]) === false) {
    echo "invalid";
} else {
    echo "valid";
}
?>