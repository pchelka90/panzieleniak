<?php

    $connect = new PDO('mysql:host=localhost;dbname=panzieleniak', 'if0_39093778_panzieleniak', 'Callisto123.');

    $error = '';
    $comment_name = '';
    $comment_content = '';

        if(empty($_POST["comment_name"]))
        {
            $error .= '<p class="text-danger">Trzeba podać swoje imię lub nick!</p>';
        }
        else
        {
            $comment_name = $_POST["comment_name"];
        }

        if(empty($_POST["comment_content"]))
        {
            $error .= '<p class="text-danger">Trzeba też oczywiście coś napisać!</p>';
        }
        else
        {
            $comment_content = $_POST["comment_content"];
        }

        if($error == '')
        {
            $query = "INSERT INTO tbl_comment (parent_comment_id, comment, comment_sender_name) VALUES (:parent_comment_id, :comment, :comment_sender_name)";
            $statement = $connect->prepare($query);
            $statement->execute(
            array(
                ':parent_comment_id' => $_POST["comment_id"],
                ':comment'    => $comment_content,
                ':comment_sender_name' => $comment_name)
            );
            $error = '<label class="text-success">Comment Added</label>';
        }

        $data = array('error'  => $error);

        echo json_encode($data);

?>
