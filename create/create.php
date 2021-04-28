<?php
require "header2.php";
?>

<div class="wmd-panel">
    <form method="post" action="create/add.php"> 
    <textarea name="title" placeholder="title" id="title"></textarea>
    <div id="wmd-button-bar"></div> 
    <textarea name="wmd-input" class="wmd-input" id="wmd-input"></textarea> 
    <input id="submit" type="submit" value="finish">
    </form>
</div>
<script>
    var converter1 = Markdown.getSanitizingConverter();
    var editor1 = new Markdown.Editor(converter1);
    editor1.run();
</script>
<?php
require "../footer.php";
?>