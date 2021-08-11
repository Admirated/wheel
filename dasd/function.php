<?php
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    include('bd.php');
    $sql = mysqli_connect($host, $login, $password, $bd);
    if($_POST['function'] == "select" && $_POST['radio_level'] != ""){
        $select = mysqli_fetch_assoc(mysqli_query($sql, 'SELECT * FROM folders WHERE id = ' . $_POST['radio_level']));
        $result = ['status' => false, 'error' => 'Вы указали не правильный параметр'];
        if($select['id'] != ""){
            $table = [];
            $select = mysqli_query($sql, 'SELECT * FROM questions WHERE folder_id = ' . $_POST['radio_level']);
            while($result_question = mysqli_fetch_assoc($select)){
                $select_answers = mysqli_query($sql, 'SELECT * FROM answers WHERE question_id = '. $result_question['id']);
                $table_answers = [];
                while($result_answer = mysqli_fetch_assoc($select_answers)){
                    $table_answers[] = $result_answer;
                }
                $table[] = ['question' => ['type' => $result_question['type'], 'name' => $result_question['name'], 'id' => $result_question['id']], 'answer' => $table_answers];
            }
            $result = ['status' => true, 'data' => $table];
        }
        $result = json_encode($result, true);
        echo $result;
        exit;
    }
?>