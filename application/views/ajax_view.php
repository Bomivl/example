<div class="ajax">
    <div id='box'>    
        <?php foreach ($res as $val): ?>
            <p class="con"><?= $val ?></p>
        <?php endforeach ?>
        <p id="click" class="button">Редактировать</p>
    </div>
    <div id='form'>   
        <textarea id='text' rows='10' cols='100'></textarea>
        <p id='submit' class="button">Редактировать</p>
    </div>
</div>
<script>
    $("#click").on("click", function () {
        $('#box').css('display', 'none');
        $('#form').css('display', 'block');
        $('#form>textarea').val(function () {
            var text = $('#box>p').html();
            return text;
        });
    });
    $('#submit').on('click', function () {
        var text = $('#form>textarea').val();
        $.ajax({
            url: "components/Ajax.php",
            type: "POST",
            data: {param: text},
            success: function (result) {
                console.log(result);
                var res = JSON.parse(result);
                console.log(res);
                $("#box>p.con").text(res.content);
                $('#box').css('display', 'block');
                $('#form').css('display', 'none');
            },
            error: function () {
                alert("Ошибка");
            }
        });
    });
</script>