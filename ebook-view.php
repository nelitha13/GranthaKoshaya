<?php session_start();
    if (!isset($_SESSION['user_email'])) {
        header('location: account.php');
    } 
?>
<script src="resources\jquery-3.6.0.js"></script>
<a class="unableClick" href="ebooks/ගම්පෙරළිය-.pdf">Test</a>
<hr />
<div id="dvEmbedPdfviewer">
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('a.unableClick').click(function (e) {
            e.preventDefault();
            var div = document.getElementById('dvEmbedPdfviewer');
            //var URl = $(this).attr('href') + "#view=FitH&toolbar=0";
            var URl = $(this).attr('href') +"#toolbar=0&navpanes=0&scrollbar=0";
            var EmbedHtml ="<embed id='embed' src='" + URl +"' height='400' width='800' />"
            div.innerHTML = EmbedHtml;
        });
    });
</script>