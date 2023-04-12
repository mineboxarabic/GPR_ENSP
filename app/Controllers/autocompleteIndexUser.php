<?php
$keyword = $_POST['keyword'];


$user = User::find('all', array(
    'conditions' => array('name LIKE ?', "%$keyword%")
));

foreach ($user as $user) {
    echo $user->name;
}
