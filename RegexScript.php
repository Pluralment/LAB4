<?php
echo "<div style=\"font-size:1.5em;padding: 5px;font-family: 'Arial Black';
    display: flex;justify-content: center;align-items: center;height: 100vh;margin: 0 auto\">";
if(isset($_POST['first-name']) and isset($_POST['email']))
{
    $name = $_POST['first-name'];
    $email = $_POST['email'];
    if(CheckEmail($email))
    {
        echo "Email is CORRECT";
        $data = $name.":".$email."\n";
        file_put_contents("data.txt", $data, FILE_APPEND);
    }
    else
    {
        echo "Email is INCORRECT";
    }
}
else
{
    echo "Fields are empty or incorrect data entered";
}
echo '</div>';


function CheckEmail($email)
{
    if(preg_match("/^((?!\.)[\w\-_\.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/", $email))
        return true;
}