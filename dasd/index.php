<?php
    include('bd.php');
    $sql = mysqli_connect($host, $login, $password, $bd);
    $select = mysqli_query($sql, 'SELECT * FROM folders');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="header">
        <input type="submit" onclick="stop()" id="stop" class="button_green" value="Завершить тест" disabled>
    </div>
    <div class="container" id="GetLevel">
        <p class="answer">Ваш уровень английского</p>
        <div style="display: flex; justify-content: space-between; padding: 0px 8%">
            <div class="hl"></div>
            <div class="hl"></div>
            <div class="hl"></div>
            <div class="hl"></div>
            <div class="hl"></div>
        </div>
        <div style="padding: 0px 8%; display: flex">
            <p class="number">0</p>
            <p style="height: 100%; margin: auto 0">Ваш уровень</p>
        </div>
        <div style="display: block; padding: 0px 8%;">
            <form id="SelectLevel">
                <?php while($result = mysqli_fetch_assoc($select)){ ?>
                    <div class="answers" onclick="SelectRadioLevel(<?= $result['id'] ?>)">
                        <p><input type="radio" value="<?= $result['id'] ?>" id="radio_level_<?= $result['id'] ?>" name="radio_level"><?= $result['name'] ?></p>
                    </div>
                <?php } ?>
                <input type="hidden" value="select" name="function">
                <div style="display: flex;">
                    <input type="submit" class="button" value="Вперед">
                </div>
            </form>
        </div>
    </div>

    <script>
        function SelectRadioLevel(id){
            let radio = document.getElementById('radio_level_' + id);
            radio.checked = true; 
        }

        let ArrayAnswer = [];
        let last = 0;
        let ArrayQuestions = [];
        let lenght = 0;
        
        $("#SelectLevel").on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url: 'function.php',
                method: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data){
                    if(data.status == true){
                        let GetLevel = document.getElementById('GetLevel');
                        GetLevel.remove();
                        let questions = document.getElementById('questions');
                        let i = 0;
                        lenght = data.data.length;
                        console.log(data.data);
                        data.data.forEach((element) => {
                            i = i + 1;
                            let type = "hidden";
                            if(i == 1){
                                type = "visible";
                                last = element.question.id;
                            }
                            let task = "";
                            task += "<div class='container' id='question_" + element.question.id + "' style='visibility: " + type + ";'><p class='answer'>Вопрос " + i + "/" + lenght + "</p><div style='display: flex; justify-content: space-between; padding: 0px 8%'>    <div class='hl'></div>    <div class='hl'></div>    <div class='hl'></div>    <div class='hl'></div>    <div class='hl'></div></div><div style='padding: 0px 8%; display: flex'><p class='number'>" + i + "</p><p style='height: 100%; margin: auto 0' id='question'>" + element.question.name + "</p></div><div style='display: block; padding: 0px 8%;'>";
                            element.answer.forEach((element_answer) => {
                                task += "<div class='answers' id='answers_" + element_answer.id + "' onclick='SelectRadio(" + element_answer.id + ", " + element.question.id + ")'><p><input type='radio' value='' id='radio_" + element_answer.id + "' name='radio'>" + element_answer.name + "</p></div>";
                                if(element_answer.correct == 1){
                                    task += "<input type='hidden' value='" + element_answer.id  + "' id='correct_" + element.question.id + "'>";
                                }
                            });
                            task += "<input type='hidden' id='answer_" + element.question.id + "'";
                            task += "<div style='display: flex;'>";
                            if(i > 1){
                                task += "<a onclick='Last(" + element.question.id + ")' style='color: #EB6250; text-decoration: none; margin: auto 0'>Назад</a>";
                            }
                            task += "<input type='submit' class='button' id='answer_button_" + element.question.id + "' value='Вперед'></div></div></div>";
                            questions.innerHTML += task;
                        
                            let answer_button = document.getElementById('answer_button_' + last);
                            answer_button.setAttribute('onclick', "Answer(" + last + ", " + element.question.id  + ", 1)");
                            last = element.question.id;
                            if(i == lenght){
                                let answer_button = document.getElementById('answer_button_' + last);
                                answer_button.setAttribute('onclick', "Answer(" + last + ", " + element.question.id  + ", 1)");
                            }
                            ArrayQuestions.push(element.question.id);
                        });
                        
                        let stop = document.getElementById('stop');
                        stop.disabled = false;
                    }
                }
            });
        });

    </script>

    <div id="questions">
        
    </div>
    <script>
        function SelectRadio(id, question_id){
            let radio = document.getElementById('radio_' + id);
            radio.checked = true; 
            let answer = document.getElementById('answer_' + question_id);
            answer.value = id;
        }
        function Answer(question_id, next, type){
            if(type == 1){
                let correct = document.getElementById('correct_' + question_id).value;
                let answer = document.getElementById('answer_' + question_id).value;
                var result = false;
                let answers = document.getElementById('answers_' + answer);
                if(correct == answer){
                    result = true;
                    answers.style.borderColor = "#1fdcae";
                } else {
                    answers.style.borderColor = "#EB6250";cd
                }
                ArrayAnswer.push(result);
                console.log(ArrayAnswer);
                let button = document.getElementById('answer_button_' + question_id);
                button.setAttribute('onclick', "Answer(" + question_id + ", " + next  + ", 0)");
            }
            let next_div = document.getElementById('question_' + next);
            next_div.style.visibility = "visible";
            if(last == question_id){
                let stop = document.getElementById('stop');
                stop.click();
            }
            
        }
        function Last(question_id){
            let div = document.getElementById('question_' + question_id);
            div.style.visibility = "hidden";
        }
        function stop(){
            let dont = 0;
            ArrayAnswer.forEach((element) => {
                if(element == true){
                    dont = dont + 1;
                }
            });
            let task = "<div class='container'  style='visibility: visible; margin: 0 auto;'><p>Ваш резульатат: " + dont + "/" + lenght + "</p></div>";
            let questions = document.getElementById('questions');
            questions.innerHTML += task;
            ArrayQuestions.forEach((element) => {
                let div = document.getElementById('question_' + element);
                div.style.visibility = "hidden";
            });
        }
    </script>
</body>
</html>
