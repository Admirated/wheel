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
                <div style="visibility: hidden">
                    <input type="submit" class="button" value="Вперед" id="SubmitLevel">
                </div>
            </form>
        </div>
    </div>

    <script>
        function SelectRadioLevel(id){
            let radio = document.getElementById('radio_level_' + id);
            radio.checked = true; 
            let SubmitLevel = document.getElementById('SubmitLevel');
            SubmitLevel.click();
        }

        let ArrayAnswer = [];
        let last = 0;
        let ArrayQuestions = [];
        let lenght = 0;
        let count = 0;
        let next_count = 1;
        let now_quest = 0;
        let last_type = 0;
        
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
                        data.data.forEach((element) => {
                            i = i + 1;
                            let type = "hidden";
                            if(i == 1){
                                type = "visible";
                                last = element.question.id;
                                last_type = element.question.type_answer;
                            }
                            let task = "";
                            task += "<div class='container' id='question_" + element.question.id + "' style='visibility: " + type + ";'><p class='answer'>Вопрос " + i + "/" + lenght + "</p><div style='display: flex; justify-content: space-between; padding: 0px 8%'>    <div class='hl' name='h1'></div>    <div class='hl' name='h2'></div>    <div class='hl' name='h3'></div>    <div class='hl' name='h4'></div>    <div class='hl' name='h5'></div></div><div style='padding: 0px 8%; display: flex'><p class='number'>" + i + "</p>";
                            if(element.question.type == 1){
                                task += "<p style='height: 100%; margin: auto 0' id='question'>" + element.question.name + "</p>";
                            } else if(element.question.type == 2) {
                                task += "<p style='height: 100%; margin: auto 0' id='question'><audio controls><source src='" + element.question.name + "' type='audio/ogg; codecs=vorbis'></audio></p>";
                            }
                            task += "</div><div style='display: block; padding: 0px 8%;'>";
                            if(element.question.type_answer != 2){
                                element.answer.forEach((element_answer) => {
                                    if(element_answer.type == 1){
                                        task += "<div class='answers' id='answers_" + element_answer.id + "' onclick='SelectRadio(" + element_answer.id + ", " + element.question.id + ")'><p><input type='radio' value='' id='radio_" + element_answer.id + "' name='radio'>" + element_answer.name + "</p></div>";
                                    } else if(element_answer.type == 2) {
                                        task += "<div class='answers' id='answers_" + element_answer.id + "' onclick='SelectRadio(" + element_answer.id + ", " + element.question.id + ")'><p><input type='radio' value='' id='radio_" + element_answer.id + "' name='radio'><img src='" + element_answer.name + "' style='max-width: 100px'></p></div>";
                                    }
                                    if(element_answer.correct == 1){
                                        task += "<input type='hidden' value='" + element_answer.id  + "' id='correct_" + element.question.id + "'>";
                                    }
                                });
                            } else {
                                task += "<div class='answers' id='answers_" + element.question.id + "'><p><input type='text' id='type3_input_" + element.question.id + "' style='width: 100%; padding: 0px 0px; height: 100%'></p></div>";
                                task += "<input type='hidden' value='" + element.question.answer  + "' id='correct_" + element.question.id + "'>";
                            }
                            task += "<input type='hidden' id='answer_" + element.question.id + "'";
                            task += "<div style='display: flex;'>";
                            if(i > 1){
                                task += "<a onclick='Last(" + element.question.id + ", " + last + ")' style='color: #EB6250; text-decoration: none; margin: auto 0'>Назад</a>";
                            }
                            task += "<input type='submit' class='button' id='answer_button_" + element.question.id + "' value='Вперед'></div></div></div>";
                            questions.innerHTML += task;
                        
                            let answer_button = document.getElementById('answer_button_' + last);
                            answer_button.setAttribute('onclick', "Answer(" + last + ", " + element.question.id  + ", 1, " + last_type + ")");
                            last = element.question.id;
                            last_type = element.question.type_answer;
                            if(i == lenght){
                                let answer_button = document.getElementById('answer_button_' + last);
                                answer_button.setAttribute('onclick', "Answer(" + last + ", " + element.question.id  + ", 1, " + last_type + ")");
                            }
                            ArrayQuestions.push(element.question.id);
                        });
                        
                        let stop = document.getElementById('stop');
                        stop.disabled = false;
                        count = (i * 20) / 100;
                    } else {
                        alert(data.error);
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
        function Answer(question_id, next, type, type_question){
            if(type == 1){
                let correct = document.getElementById('correct_' + question_id).value;
                let answer = document.getElementById('answer_' + question_id).value;
                var result = false;
                let answers = document.getElementById('answers_' + answer);
                if(type_question == 2){
                    let input = document.getElementById('type3_input_' + question_id);
                    if(correct == input.value){
                        result = true;
                        
                    }
                    input.setAttribute('readonly', true);
                } else {
                    if(correct == answer){
                        result = true;
                        answers.style.borderColor = "#1fdcae";
                    } else {
                        answers.style.borderColor = "#EB6250";
                    }
                }

                ArrayAnswer.push(result);
                let button = document.getElementById('answer_button_' + question_id);
                button.setAttribute('onclick', "Answer(" + question_id + ", " + next  + ", 0)");
                if(count >= now_quest){
                    let h = document.getElementsByName('h' + next_count);
                    h.forEach((element) => {
                        element.style.border = "2px solid #EB6250";
                    });

                    now_quest = 0;
                    next_count = next_count + 1;
                }
                now_quest = now_quest + 1;
            }
            ArrayQuestions.forEach((element) => {
                let div = document.getElementById('question_' + element);
                div.style.visibility = "hidden";
            });
            let next_div = document.getElementById('question_' + next);
            next_div.style.visibility = "visible";
            if(last == question_id){
                let stop = document.getElementById('stop');
                stop.click();
            }
            
        }
        function Last(question_id, last){
            let div = document.getElementById('question_' + question_id);
            div.style.visibility = "hidden";
            div = document.getElementById('question_' + last);
            div.style.visibility = "visible";
        }
        function stop(){
            let dont = 0;
            ArrayAnswer.forEach((element) => {
                if(element == true){
                    dont = dont + 1;
                }
            });

            location = "result.php?agree=" + dont + "&all=" + lenght;
        }

    </script>
</body>
</html>
