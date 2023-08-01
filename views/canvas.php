<?php require_once('inc/header.php'); ?>
    
<div class="w-100 vh-100 canvas">
    <div class="canvas_container">
        <input type="file" name="images" id="images" accept=".png">
    </div>
</div>

<input type="hidden" id="page" name="page" value="1">
<input type="hidden" id="id_av" name="id_av" value="36">
<input type="hidden" id="slug" name="slug" value="av-lurazic-10-25">
<input type="hidden" id="term" name="term" value="lurazic">

<div class="sidebar_bg active"></div>
<div class="sidebar active">
    <div class="sidebar_button toOpen">
        <svg width="212" height="328" viewBox="0 0 212 328" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M39.62 321.822L202.74 182.042C205.368 179.789 207.477 176.994 208.923 173.849C210.37 170.704 211.118 167.284 211.118 163.822C211.118 160.36 210.37 156.94 208.923 153.795C207.477 150.65 205.368 147.855 202.74 145.602L39.62 5.822C24.05 -7.518 0 3.542 0 24.042V303.642C0 324.142 24.05 335.202 39.62 321.822Z" fill="black"/>
        </svg>
    </div>
    <div class="sidebar_content external_images">
        <div class="drag_drop">
            <p>Subir imagen de fondo</p>
            <input type="file" name="background" accept=".png, .jpg, .jpeg" />
        </div>
        <div class="drag_drop">
            <p>Subir miniatura thumb</p>
            <input type="file" name="thumb" accept=".png, .jpg, .jpeg" />
        </div>
        <div class="drag_drop">
            <p>Subir miniatura full</p>
            <input type="file" name="full" accept=".png, .jpg, .jpeg" />
        </div>
    </div>
</div>

<script defer src="../js/functions/editPage.js"></script>

</body>
</html>