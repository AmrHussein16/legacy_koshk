<?php

$data = json_encode($_GET);
setcookie("fb_sig", $data, time() + 10, "/");
header('Location: https://koshkcomics.com/FB/comicbook.php?book=11&id=11');

/* End of file index.php */
/* Location: ./index.php */