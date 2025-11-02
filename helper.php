<?php
function input_test($data){

$data = trim ($data);
$data = stripcslashes ($data);
$data = htmlspecialchars ($data);

return $data;
}

?>